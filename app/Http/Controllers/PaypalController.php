<?php
namespace App\Http\Controllers;
use App\Http\Controllers\API\Admin\OrderAPIController;
use App\Http\Controllers\MailController;
use App\Mail\OrderMailable;
use App\Models\Admin\Order;
use App\Repositories\Admin\BookingRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaypalController extends Controller
{
    /** @var  BookingRepository */
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepo)
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->bookingRepository = $bookingRepo;
    }




    public function payWithpaypal(Request $request)
    {
        $data = $request->all();
        $request->session()->put('data_order',$data);
        // $booking = $this->bookingRepository->createCustomized($data);
        // dd("aqui");
        $total = $data["cart"]["total"];
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
                    ->setCurrency('EUR')
                    ->setQuantity(1)
                    ->setPrice($total); /** unit price **/

        $item_list = new ItemList();
                $item_list->setItems(array($item_1));

        $amount = new Amount();
                $amount->setCurrency('EUR')
                    ->setTotal($total);

        $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');

         $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
                ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                /** dd($payment->create($this->_api_context));exit; **/
                try {
                $payment->create($this->_api_context);
                    } catch (\PayPal\Exception\PPConnectionException $ex) {
                        if (\Config::get('app.debug')) {
                        return response()->json( ['ex'=>$ex->getMessage(),'msj' => 'Connection timeout' , 'status' => 'error' ],500);
                    } else {
                        return response()->json( ['ex'=>$ex->getMessage(),'msj' => 'Some error occur, sorry for inconvenient' , 'status' => 'error' ],500);
                    }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
        /** redirect to paypal **/
             return response()->json( ['url'=>$redirect_url,'msj' => 'satisfactorio' , 'status' => 'success' ],200);
        }
        return response()->json( ['msj' => 'Some error occur, sorry for inconvenient' , 'status' => 'error' ],500);
    }

    public function getPaymentStatus(){
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::to('/booking/step-2?error=true');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            $data=Session::get('data_order');
            Session::forget('data_order');

            // GUARDAR EL BOOKING!!!!!
            $booking = $this->bookingRepository->createCustomized($data);

            // ENVIAR CORREOOO
            // Get BookingWithRelations
            $bookingWithRelations = $this->bookingRepository->findCustomized($booking->id);

            // Enviar Correo
            $sended = $this->sendMail($bookingWithRelations, 'order'); #PENDIENTE

            if( $sended == 'OK' ){
                $message = 'Payment success, Booking saved successfully, email sended';
            }
            else{
                $message = 'Payment success, Booking saved successfully, email not sended';
            }


            \Session::put('success', $message);
            return Redirect::to('/booking/step-3/'.$booking->code);
        }
    }

    /**
     * Send the mail of the invoice and the purchase BOOKING
     * @param array $bookingWithRelations
     * @param string $template
     * @return void
     */
    public function sendMail( $bookingWithRelations, $template )
    {
        $request = [
            'subject'   => 'Subject TEST',
            'msg'       => json_encode($bookingWithRelations),
            'email'     => $bookingWithRelations['responsable']['email'],
            'data'      => (array)$bookingWithRelations
        ];

        // dd($bookingWithRelations['responsable']);

        return MailController::sendMail($request, $template);
    }
}
