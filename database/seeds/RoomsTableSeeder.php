<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  ____                             ____           _                                   _
        // / ___|    ___   _ __  __   __    / ___|   __ _  | |_    ___    __ _    ___    _ __  (_)   ___   ___
        // \___ \   / _ \ | '__| \ \ / /   | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | |  / _ \ / __|
        //  ___) | |  __/ | |     \ V /    | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | | |  __/ \__ \
        // |____/   \___| |_|      \_/      \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|    |_|  \___| |___/
        //                                                               |___/
            DB::table('service_categories')->insert(['status_id'  => 1]); //service_categories.id => 1
            DB::table('service_category_translations')->insert(
                [
                    'service_category_id'   => 1,
                    'language_id'           => 1,
                    'name'                  => 'Servicios para habitaciones Luxury',
                    'description'           => 'Servicios para habitaciones Luxury'
                ]
            );

        //  ____                          _
        // / ___|    ___   _ __  __   __ (_)   ___    ___   ___
        // \___ \   / _ \ | '__| \ \ / / | |  / __|  / _ \ / __|
        //  ___) | |  __/ | |     \ V /  | | | (__  |  __/ \__ \
        // |____/   \___| |_|      \_/   |_|  \___|  \___| |___/
        //
            DB::table('services')->insert(['status_id'  => 1, 'service_category_id' => 1]); //services.id => 1
            DB::table('service_translations')->insert(
                [
                    'service_id'        => 1,
                    'language_id'       => 1,
                    'name'              => 'TV',
                    'description'       => 'TV'

                ]
            );

            DB::table('services')->insert(['status_id'  => 1, 'service_category_id' => 1]); //services.id => 2
            DB::table('service_translations')->insert(
                [
                    'service_id'        => 2,
                    'language_id'       => 1,
                    'name'              => 'WIFI',
                    'description'       => 'WIFI'

                ]
            );

            DB::table('services')->insert(['status_id'  => 1, 'service_category_id' => 1]); //services.id => 3
            DB::table('service_translations')->insert(
                [
                    'service_id'        => 3,
                    'language_id'       => 1,
                    'name'              => 'Freezer',
                    'description'       => 'Freezer'

                ]
            );

            DB::table('services')->insert(['status_id'  => 1, 'service_category_id' => 1]); //services.id => 4
            DB::table('service_translations')->insert(
                [
                    'service_id'        => 4,
                    'language_id'       => 1,
                    'name'              => 'BreakFast',
                    'description'       => 'BreakFast'

                ]
            );

        //  ____                                   ____           _                                   _
        // |  _ \    ___     ___    _ __ ___      / ___|   __ _  | |_    ___    __ _    ___    _ __  (_)   ___   ___
        // | |_) |  / _ \   / _ \  | '_ ` _ \    | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | |  / _ \ / __|
        // |  _ <  | (_) | | (_) | | | | | | |   | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | | |  __/ \__ \
        // |_| \_\  \___/   \___/  |_| |_| |_|    \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|    |_|  \___| |___/
        //                                                                     |___/
            DB::table('room_categories')->insert(['status_id'  => 1]); //room_categories.id => 1
            DB::table('room_category_translations')->insert(
                [
                    'room_category_id'  => 1,
                    'language_id'       => 1,
                    'name'              => 'Habitaciones Luxury',
                    'description'       => 'Habitaciones Luxury'
                ]
            );

        //  ____
        // |  _ \    ___     ___    _ __ ___    ___
        // | |_) |  / _ \   / _ \  | '_ ` _ \  / __|
        // |  _ <  | (_) | | (_) | | | | | | | \__ \
        // |_| \_\  \___/   \___/  |_| |_| |_| |___/
        //
            DB::table('rooms')->insert( //rooms.id => 1
                [
                    'slug'                  => 'room101',
                    'image'                 => '/storage/multimedia/menu_categorias_1.jpg',
                    'room_category_id'      => 1
                ]
            );
            DB::table('room_translations')->insert(
                [
                    'room_id'       => 1, //incremental
                    'language_id'   => 1,
                    'name'          => 'ROOM 101',
                    'subtitle1'     => 'Camera di Parlo',
                    'subtitle2'     => 'Camera de 13 M2',
                    'description'   => 'Lorem ipsum di parlo la camara do 13 M2 in Sardegnia.'
                ]
            );
            DB::table('rooms_services')->insert([
                [
                    'room_id'       => 1,
                    'service_id'    => 1,
                ],
                [
                    'room_id'       => 1,
                    'service_id'    => 2,
                ],
                [
                    'room_id'       => 1,
                    'service_id'    => 3,
                ]
            ]);
            DB::table('room_seasons')->insert([
                [
                    'room_id'           => 1,
                    'start_date'        => '2018/01/01',
                    'end_date'          => '2018/06/15',
                    'price'             => 29.99,
                    'additional_price'  => 8.44,
                    'pet_price'         => 6.00,
                    'iva'               => 0.22
                ],
                [
                    'room_id'           => 1,
                    'start_date'        => '2018/06/16',
                    'end_date'          => '2018/12/31',
                    'price'             => 59.99,
                    'additional_price'  => 10.44,
                    'pet_price'         => 9.00,
                    'iva'               => 0.22
                ]
            ]);
            DB::table('rows')->insert( //rows.id => 1
                [
                    'rowable_type' => 'App\Models\Admin\Room',
                    'rowable_id'   => 1 //incremental
                ]
            );
            DB::table('multimedias')->insert([
                [
                    'name'          => '/storage/galery/room101_1.jpg', //multimedias.id => 1
                    'description'   => 'Imagine 1 da ROOM 101' // title de la imagen
                ],
                [
                    'name'          => '/storage/galery/room101_2.jpg', //multimedias.id => 2
                    'description'   => 'Imagine 2 da ROOM 101' // title de la imagen
                ]
            ]);
            DB::table('rows_multimedias')->insert([
                [
                    'row_id'        => 1, //id del rows.id
                    'multimedia_id' => 1  //id del multimedias.id
                ],
                [
                    'row_id'        => 1, //id del rows.id
                    'multimedia_id' => 2  //id del multimedias.id
                ]
            ]);
            DB::table('rooms')->insert( //rooms.id => 2
                [
                    'slug'                  => 'room101',
                    'image'                 => '/storage/multimedia/menu_categorias_1.jpg',
                    'room_category_id'      => 1
                ]
            );
            DB::table('room_translations')->insert(
                [
                    'room_id'       => 2, //incremental
                    'language_id'   => 1,
                    'name'          => 'ROOM 102',
                    'subtitle1'     => 'Camera di Parlo',
                    'subtitle2'     => 'Camera de 13 M2',
                    'description'   => 'Lorem ipsum di parlo la camara do 13 M2 in Sardegnia.'
                ]
            );
            DB::table('rooms_services')->insert([
                [
                    'room_id'       => 2,
                    'service_id'    => 1,
                ],
                [
                    'room_id'       => 2,
                    'service_id'    => 2,
                ],
                [
                    'room_id'       => 2,
                    'service_id'    => 3,
                ]
            ]);
            DB::table('room_seasons')->insert([
                [
                    'room_id'           => 2,
                    'start_date'        => '2018/01/01',
                    'end_date'          => '2018/06/15',
                    'price'             => 29.99,
                    'additional_price'  => 8.44,
                    'pet_price'         => 6.00,
                    'iva'               => 0.22
                ],
                [
                    'room_id'           => 2,
                    'start_date'        => '2018/06/16',
                    'end_date'          => '2018/12/31',
                    'price'             => 59.99,
                    'additional_price'  => 10.44,
                    'pet_price'         => 9.00,
                    'iva'               => 0.22
                ]
            ]);
            DB::table('rows')->insert( //rows.id => 2
                [
                    'rowable_type' => 'App\Models\Admin\Room',
                    'rowable_id'   => 2 //incremental
                ]
            );
            DB::table('multimedias')->insert([
                [
                    'name'          => '/storage/galery/room101_1.jpg', //multimedias.id => 3
                    'description'   => 'Imagine 1 da ROOM 101' // title de la imagen
                ],
                [
                    'name'          => '/storage/galery/room101_2.jpg', //multimedias.id => 4
                    'description'   => 'Imagine 2 da ROOM 101' // title de la imagen
                ]

            ]);
            DB::table('rows_multimedias')->insert([
                [
                    'row_id'        => 2, //id del rows.id
                    'multimedia_id' => 3  //id del multimedias.id
                ],
                [
                    'row_id'        => 2, //id del rows.id
                    'multimedia_id' => 4  //id del multimedias.id
                ]
            ]);
            DB::table('rooms')->insert( //rooms.id => 3
                [
                    'slug'                  => 'room103',
                    'image'                 => '/storage/multimedia/menu_categorias_1.jpg',
                    'room_category_id'      => 1
                ]
            );
            DB::table('room_translations')->insert(
                [
                    'room_id'       => 3, //incremental
                    'language_id'   => 1,
                    'name'          => 'ROOM 103',
                    'subtitle1'     => 'Camera di Parlo',
                    'subtitle2'     => 'Camera de 13 M2',
                    'description'   => 'Lorem ipsum di parlo la camara do 13 M2 in Sardegnia.'
                ]
            );
            DB::table('rooms_services')->insert([
                [
                    'room_id'       => 3,
                    'service_id'    => 1,
                ],
                [
                    'room_id'       => 3,
                    'service_id'    => 2,
                ],
                [
                    'room_id'       => 3,
                    'service_id'    => 3,
                ]
            ]);
            DB::table('room_seasons')->insert([
                [
                    'room_id'           => 3,
                    'start_date'        => '2018/01/01',
                    'end_date'          => '2018/06/15',
                    'price'             => 29.99,
                    'additional_price'  => 8.44,
                    'pet_price'         => 6.00,
                    'iva'               => 0.22
                ],
                [
                    'room_id'           => 3,
                    'start_date'        => '2018/06/16',
                    'end_date'          => '2018/12/31',
                    'price'             => 59.99,
                    'additional_price'  => 10.44,
                    'pet_price'         => 9.00,
                    'iva'               => 0.22
                ]
            ]);
            DB::table('rows')->insert( //rows.id => 3
                [
                    'rowable_type' => 'App\Models\Admin\Room',
                    'rowable_id'   => 3 //incremental
                ]
            );
            DB::table('multimedias')->insert([
                [
                    'name'          => '/storage/galery/room103_1.jpg', //multimedias.id => 5
                    'description'   => 'Imagine 1 da ROOM 103' // title de la imagen
                ],
                [
                    'name'          => '/storage/galery/room103_2.jpg', //multimedias.id => 6
                    'description'   => 'Imagine 2 da ROOM 103' // title de la imagen
                ]
            ]);
            DB::table('rows_multimedias')->insert([
                [
                    'row_id'        => 3, //id del rows.id
                    'multimedia_id' => 5  //id del multimedias.id
                ],
                [
                    'row_id'        => 3, //id del rows.id
                    'multimedia_id' => 6  //id del multimedias.id
                ]
            ]);
            DB::table('rooms')->insert( //rooms.id => 4
                [
                    'slug'                  => 'room104',
                    'image'                 => '/storage/multimedia/menu_categorias_1.jpg',
                    'room_category_id'      => 1
                ]
            );
            DB::table('room_translations')->insert(
                [
                    'room_id'       => 4, //incremental
                    'language_id'   => 1,
                    'name'          => 'ROOM 104',
                    'subtitle1'     => 'Camera di Parlo',
                    'subtitle2'     => 'Camera de 13 M2',
                    'description'   => 'Lorem ipsum di parlo la camara do 13 M2 in Sardegnia.'
                ]
            );
            DB::table('rooms_services')->insert([
                [
                    'room_id'       => 4,
                    'service_id'    => 1,
                ],
                [
                    'room_id'       => 4,
                    'service_id'    => 2,
                ],
                [
                    'room_id'       => 4,
                    'service_id'    => 3,
                ]
            ]);
            DB::table('room_seasons')->insert([
                [
                    'room_id'           => 4,
                    'start_date'        => '2018/01/01',
                    'end_date'          => '2018/06/15',
                    'price'             => 29.99,
                    'additional_price'  => 8.44,
                    'pet_price'         => 6.00,
                    'iva'               => 0.22
                ],
                [
                    'room_id'           => 4,
                    'start_date'        => '2018/06/16',
                    'end_date'          => '2018/12/31',
                    'price'             => 59.99,
                    'additional_price'  => 10.44,
                    'pet_price'         => 9.00,
                    'iva'               => 0.22
                ]
            ]);
            DB::table('rows')->insert( //rows.id => 4
                [
                    'rowable_type' => 'App\Models\Admin\Room',
                    'rowable_id'   => 4 //incremental
                ]
            );
            DB::table('multimedias')->insert([
                [
                    'name'          => '/storage/galery/room104_1.jpg', //multimedias.id => 7
                    'description'   => 'Imagine 1 da ROOM 104' // title de la imagen
                ],
                [
                    'name'          => '/storage/galery/room104_2.jpg', //multimedias.id => 8
                    'description'   => 'Imagine 2 da ROOM 104' // title de la imagen
                ]
            ]);
            DB::table('rows_multimedias')->insert([
                [
                    'row_id'        => 4, //id del rows.id
                    'multimedia_id' => 7  //id del multimedias.id
                ],
                [
                    'row_id'        => 4, //id del rows.id
                    'multimedia_id' => 8  //id del multimedias.id
                ]
            ]);


            // imagenes extra para room 102
            DB::table('multimedias')->insert([
                [
                    'name'          => '/storage/galery/room101_3.jpg', //multimedias.id => 9
                    'description'   => 'Imagine 1 da ROOM 101' // title de la imagen
                ],
                [
                    'name'          => '/storage/galery/room101_4.jpg', //multimedias.id => 10
                    'description'   => 'Imagine 2 da ROOM 101' // title de la imagen
                ],
                [
                    'name'          => '/storage/galery/room101_5.jpg', //multimedias.id => 11
                    'description'   => 'Imagine 2 da ROOM 101' // title de la imagen
                ]

            ]);
            DB::table('rows_multimedias')->insert([
                [
                    'row_id'        => 2, //id del rows.id
                    'multimedia_id' => 9  //id del multimedias.id
                ],
                [
                    'row_id'        => 2, //id del rows.id
                    'multimedia_id' => 10  //id del multimedias.id
                ],
                [
                    'row_id'        => 2, //id del rows.id
                    'multimedia_id' => 11  //id del multimedias.id
                ]
            ]);


            // QUINTA HABITACIÓN DE PRUEBA
            DB::table('rooms')->insert( //rooms.id => 1
                [
                    'slug'                  => 'room105',
                    'image'                 => '/storage/multimedia/room_105.jpg',
                    'room_category_id'      => 1
                ]
            );
            DB::table('room_translations')->insert(
                [
                    'room_id'       => 5, //incremental
                    'language_id'   => 1,
                    'name'          => 'ROOM 105',
                    'subtitle1'     => 'Camera di Parlo 105',
                    'subtitle2'     => 'Camera de 13 M2 105',
                    'description'   => 'Lorem ipsum di parlo la camara 105 do 13 M2 in Sardegnia.'
                ]
            );
            DB::table('rooms_services')->insert([
                [
                    'room_id'       => 5,
                    'service_id'    => 1,
                ],
                [
                    'room_id'       => 5,
                    'service_id'    => 3,
                ]
            ]);
            DB::table('room_seasons')->insert([
                [
                    'room_id'           => 5,
                    'start_date'        => '2018/01/01',
                    'end_date'          => '2018/06/15',
                    'price'             => 29.99,
                    'additional_price'  => 8.44,
                    'pet_price'         => 6.00,
                    'iva'               => 0.22
                ],
                [
                    'room_id'           => 5,
                    'start_date'        => '2018/06/16',
                    'end_date'          => '2018/12/31',
                    'price'             => 59.99,
                    'additional_price'  => 10.44,
                    'pet_price'         => 9.00,
                    'iva'               => 0.22
                ]
            ]);
            DB::table('rows')->insert( //rows.id => 5
                [
                    'rowable_type' => 'App\Models\Admin\Room',
                    'rowable_id'   => 5 //incremental
                ]
            );
            DB::table('multimedias')->insert([
                [
                    'name'          => '/storage/galery/room105_1.jpg', //multimedias.id => 12
                    'description'   => 'Imagine 1 da ROOM 105' // title de la imagen
                ],
                [
                    'name'          => '/storage/galery/room105_2.jpg', //multimedias.id => 13
                    'description'   => 'Imagine 2 da ROOM 105' // title de la imagen
                ]
            ]);
            DB::table('rows_multimedias')->insert([
                [
                    'row_id'        => 5, //id del rows.id
                    'multimedia_id' => 12 //id del multimedias.id
                ],
                [
                    'row_id'        => 5, //id del rows.id
                    'multimedia_id' => 13 //id del multimedias.id
                ]
            ]);
    }
}
