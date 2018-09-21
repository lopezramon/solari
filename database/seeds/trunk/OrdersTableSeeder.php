<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tag_translations')->insert([
            [
                'tag'              => 'back_orders_title',
                'value'            => 'Ordini',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_order_title',
                'value'            => 'Ordine',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_orders_user_exists',
                'value'            => 'Utente registrato?',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_orders_user_info',
                'value'            => 'Informazioni utente',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ]
        ]);
        DB::table('orders')->insert([
            [
                'code'              => '0001',
                'user_id'            => '1',
                'user_name' => 'fhernandez',
                'user_email' => 'francisco.hernandez@jumperr.com',
                'user_phone' => '04147979906',
                'fiscal_code' => '04147979906',
                'shipping_date' => '2018/08/23',
                'shipping_address' => 'Roma',
                'shipping_state' => '1',
                'shipping_city' => 'Roma',
                'shipping_zip' => '002',
                'shipping_lat' => '1',
                'shipping_lng' => '2',
                'total' => '60',
                'subtotal' => '46.8',
                'iva' => '13.2',
                'status_id' => '1',
                'show_to_user' => '1',
                'created_at' => '2018-08-16 03:10:00.000000'
            ]
        ]);
        DB::table('orders')->insert([
            [
                'code'              => '0002',
                'user_id'            => '1',
                'user_name' => 'fhernandez',
                'user_email' => 'francisco.hernandez@jumperr.com',
                'user_phone' => '04147979906',
                'fiscal_code' => '04147979906',
                'shipping_date' => '2018/08/23',
                'shipping_address' => 'Roma',
                'shipping_state' => '1',
                'shipping_city' => 'Roma',
                'shipping_zip' => '002',
                'shipping_lat' => '1',
                'shipping_lng' => '2',
                'total' => '60',
                'subtotal' => '46.8',
                'iva' => '13.2',
                'status_id' => '1',
                'show_to_user' => '1',
                'created_at' => '2018-08-16 03:10:00.000000'
            ]
        ]);
        DB::table('order_details')->insert([
            [
                'order_id'              => 1,
                'product_id'            => 1,
                'products_quantity' => 2,
                'comment' => 'ffffffffffffff',
                'belongs_to_order_detail_id' => 1
            ],
            [
                'order_id'              => 1,
                'product_id'            => 2,
                'products_quantity' => 2,
                'comment' => 'ffffffffffffff',
                'belongs_to_order_detail_id' => 1
            ],
            [
                'order_id'              => 2,
                'product_id'            => 2,
                'products_quantity' => 1,
                'comment' => 'ffffffffffffff',
                'belongs_to_order_detail_id' => 1
            ],
            [
                'order_id'              => 2,
                'product_id'            => 32,
                'products_quantity' => 1,
                'comment' => 'ffffffffffffff',
                'belongs_to_order_detail_id' => 1
            ]
        ]);
    }
}
