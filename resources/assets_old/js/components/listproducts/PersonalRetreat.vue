<template>
    <div class="bg-dark-translucent p-4">
            <div class="container">
                <div class="text-white text-center ">
                    <h2 class="text-uppercase">Hai un Account?</h2>
                    <p class="text-danger font-weight-bold">Accedi subito all ´Informazione del tuo account</p>
                    <h3 class="text-uppercase text-left font-weight-bold">Inserrisci i tuoi dati</h3>
                    <br>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <form class="form-contact">

                            <input class="form-control form-material" :maxlength="30" name="name" v-model="name" v-validate="'required|alpha'" type="text" placeholder="Nome(*):">
                            <span v-show="errors.has('name')" class="text-danger">{{ errors.first('name') }}</span>
                            <br>

                            <input class="form-control form-material" :maxlength="30" name="lastName" v-model="lastName" v-validate="'required|alpha'" type="text" placeholder="Cognome(*):">
                            <span v-show="errors.has('lastName')" class="text-danger">{{ errors.first('lastName') }}</span>
                            <br>

                            <input class="form-control form-material" :maxlength="20" name="phone" v-model="phone" v-validate="'required|numeric'" type="text" placeholder="Telefono(*):">
                            <span v-show="errors.has('phone')" class="text-danger">{{ errors.first('phone') }}</span>
                            <br>

                            <input  class="form-control form-material" :maxlength="30" name="email" v-model="email" v-validate="'required|email'" type="text" placeholder="Mail(*):">
                            <span v-show="errors.has('email')" class="text-danger">{{ errors.first('email') }}</span>
                            <br>

                            <input  class="form-control form-material" :maxlength="15" name="delivery" v-model="delivery" v-validate="{ required: true, regex: /^[a-z\d\-_\s]+$/i }" type="text" placeholder="Orario di consegna(*):">
                            <span v-show="errors.has('delivery')" class="text-danger">{{ errors.first('delivery') }}</span>
                            <br>

                            <input  class="form-control form-material" :maxlength="15" name="hour" v-model="hour" v-validate="''" type="text" placeholder="Scegli la data(*):">
                            <span v-show="errors.has('hour')" class="text-danger">{{ errors.first('hour') }}</span>
                            <br>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <totalpayment/>
                    </div >
                    <div class="col-sm-12 col-md-7">
                        <h4 class="text-capitalize text-center font-weight-bold">Modalità di Pagamento</h4>
                            <div class="row justify-content-center mt-5">
                                <div class="col-4">
                                    <img src="images/payment/money.svg" alt="contanti" width="70%">
                                    <span class="box text-uppercase">Contanti</span>
                                </div>
                                <div class="col-4">
                                    <img src="images/payment/debit-card.svg" alt="debitCard" width="70%">
                                    <span class="box text-uppercase">Bancomat</span>
                                </div>
                                <div class="col-4">
                                    <img src="images/payment/credit-card.svg" alt="creditCard" width="70%">
                                    <span class="box text-uppercase">Carta di credito</span>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-12 col-md-5 top">
                        <div class="row flex-column text-center mt-sm-5 mt-md-0 font-weight-bold d-inline-block">
                            <div class="col-12">
                                <span class=" text-uppercase text-white">Termini e Condizioni </span>
                            </div>
                            <div class="col-12 mt-3">
                                <img src="images/payment/001-clock.svg" alt="clock" width="40%">
                            </div>
                            <div class="col-12 mt-3 font-weight-bold">
                                <span class=" text-uppercase text-white">Tiempo di concegna</span><br>
                                <span class="text-uppercase text-white">Da a 30:00 min</span><br>
                                <span class="text-uppercase text-white">a 45:00 min</span><br>
                            </div>
                            <div class="col-12 mt-3 ">
                                <img src="images/payment/002-route.svg" alt="route" width="40%">
                            </div>
                           <div class="col-12 mt-3 font-weight-bold">
                                <span class="mt-2 text-uppercase text-white">Tiempo di concegna</span><br>
                                <span class="text-uppercase text-white">Da a 30:00 min</span>
                            </div>                            
                        </div>                        
                    </div>
                </div>

                </div>
            </div>


        </div>
</template>
<script>
    export default {
        name: 'form-personal-retreat',
        data: () => ({
            email: '',
            name: '',
            lastName: '',
            phone: '',
            delivery: '',
            hour: '',
        }),
        methods: {}
    };
</script>

<style scoped>
.form-control.form-material {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #fff;
    background-color: transparent;
    background-clip: padding-box;
    border: 0 solid #ced4da;
    border-bottom: 1px solid #dc3545;
    border-radius: 0;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.form-control:focus {
    background-color: transparent;
    border-color: #dc3545;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
}
.form-control.v2:focus {
    background-color: #fff;
    border-color: #dc3545;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
}
h2 {
    text-align: center;
    font-weight: bold;
    font-size: 28px;
}
label {
        margin: 0 auto;
        display: block;
        text-align: center;
        margin-bottom: -15px;
}
button {
    background-color: #F31616;
    border: none;
    color: white;
    padding: 5px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}
.contact-wrapper {
    margin: 0 auto;
    display: block;
    color: #fff;
    font-weight: bold;
    border: 0px;
    font-size: 12px;
    padding: 4px 30px;
    margin-top: -10px;

    background: #f90105;
    background: -moz-linear-gradient(top, #f90105 0%, #9b0516 100%);
    background: -webkit-linear-gradient(top, #f90105 0%,#9b0516 100%);
    background: linear-gradient(to bottom, #f90105 0%,#9b0516 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f90105', endColorstr='#9b0516',GradientType=0 );
}
.contact-wrapper .send:hover {
    background: #fd383d;
    background: -moz-linear-gradient(top, #fd383d 1%, #ba182b 100%);
    background: -webkit-linear-gradient(top, #fd383d 1%,#ba182b 100%);
    background: linear-gradient(to bottom, #fd383d 1%,#ba182b 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fd383d', endColorstr='#ba182b',GradientType=0 );
}
.box {
    display: inline-block;
    font-weight: bold;
    margin-top: 5px;
}
.top {
    top: 0px;
}
@media (min-width: 768px) {
.top {
    top: -85px;
}    
}

</style>