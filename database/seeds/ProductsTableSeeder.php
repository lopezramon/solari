<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  ____                               _
        // | __ )   _ __    __ _   _ __     __| |  ___
        // |  _ \  | '__|  / _` | | '_ \   / _` | / __|
        // | |_) | | |    | (_| | | | | | | (_| | \__ \
        // |____/  |_|     \__,_| |_| |_|  \__,_| |___/
        //
            DB::table('brands')->insert(['slug'  => 'PEP']); //brands.id => 1
            DB::table('brand_translations')->insert(
                [
                    'brand_id'      => 1, //incremental
                    'language_id'   => 1,
                    'name'          => 'Single',
                    'description'   => 'Single'
                ]
            );

        //   ____           _                                   _
        //  / ___|   __ _  | |_    ___    __ _    ___    _ __  (_)   ___   ___
        // | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | |  / _ \ / __|
        // | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | | |  __/ \__ \
        //  \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|    |_|  \___| |___/
        //                               |___/
            DB::table('product_categories')->insert(['status_id'  => 1]); //product_categories.id => 1
            DB::table('product_category_translations')->insert(
                [
                    'product_category_id'   => 1,
                    'language_id'           => 1,
                    'name'                  => 'Pizza',
                    'description'           => 'Pizza'
                ]
            );

            DB::table('product_categories')->insert(['status_id'  => 1]); //product_categories.id => 2
            DB::table('product_category_translations')->insert(
                [
                    'product_category_id'   => 2,
                    'language_id'           => 1,
                    'name'                  => 'No Pizza',
                    'description'           => 'No Pizza'
                ]
            );

        //     _          _       _      ____           _
        //    / \      __| |   __| |    / ___|   __ _  | |_    ___    __ _    ___    _ __   _   _
        //   / _ \    / _` |  / _` |   | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | | | |
        //  / ___ \  | (_| | | (_| |   | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | |_| |
        // /_/   \_\  \__,_|  \__,_|    \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|     \__, |
        //                                                           |___/                  |___/
            DB::table('additional_categories')->insert(['status_id'  => 1]); //additional_categories.id => 1
            DB::table('additional_category_translations')->insert(
                [
                    'additional_category_id'    => 1, //incremental
                    'language_id'               => 1,
                    'name'                      => 'Additivi per Pizzas Especiales',
                    'description'               => 'Additivi per Pizzas Especiales'
                ]
            );

            DB::table('additional_categories')->insert(['status_id'  => 1]); //additional_categories.id => 2
            DB::table('additional_category_translations')->insert(
                [
                    'additional_category_id'    => 2, //incremental
                    'language_id'               => 1,
                    'name'                      => 'Additivi per Pizzas VIP',
                    'description'               => 'Additivi per Pizzas VIP'
                ]
            );

            DB::table('additional_categories')->insert(['status_id'  => 1]); //additional_categories.id => 3
            DB::table('additional_category_translations')->insert(
                [
                    'additional_category_id'    => 3, //incremental
                    'language_id'               => 1,
                    'name'                      => 'Additivi per No Pizzas Bebidas',
                    'description'               => 'Additivi per No Pizzas Bebidas'
                ]
            );

        //  ____            _                      _                                   _
        // / ___|   _   _  | |__     ___    __ _  | |_    ___    __ _    ___    _ __  (_)   ___   ___
        // \___ \  | | | | | '_ \   / __|  / _` | | __|  / _ \  / _` |  / _ \  | '__| | |  / _ \ / __|
        //  ___) | | |_| | | |_) | | (__  | (_| | | |_  |  __/ | (_| | | (_) | | |    | | |  __/ \__ \
        // |____/   \__,_| |_.__/   \___|  \__,_|  \__|  \___|  \__, |  \___/  |_|    |_|  \___| |___/
        //                                                      |___/
            DB::table('product_subcategories')->insert( //product_subcategories.id => 1
                [
                    'product_category_id'   => 1,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 1, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Pizze',
                    'description'              => 'Pizze'
                ]
            );

            DB::table('product_subcategories')->insert( //product_subcategories.id => 2
                [
                    'product_category_id'   => 1,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 2, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Pizze Speciali',
                    'description'              => 'Pizze Speciali'
                ]
            );

            DB::table('product_subcategories')->insert( //product_subcategories.id => 3
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 3, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Calzoni a Richiesta',
                    'description'              => 'Calzoni a Richiesta'
                ]
            );

            DB::table('product_subcategories')->insert( //product_subcategories.id => 4
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 4, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Le Foccace',
                    'description'              => 'Le Foccace'
                ]
            );
            DB::table('product_subcategories')->insert( //product_subcategories.id => 5
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 5, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Piatti Composti',
                    'description'              => 'Piatti Composti'
                ]
            );
            DB::table('product_subcategories')->insert( //product_subcategories.id => 6
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 6, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Fritture',
                    'description'              => 'Fritture'
                ]
            );
            DB::table('product_subcategories')->insert( //product_subcategories.id => 7
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 7, //incremental
                    'language_id'              => 1,
                    'name'                     => 'I Dessert',
                    'description'              => 'I Dessert'
                ]
            );
            DB::table('product_subcategories')->insert( //product_subcategories.id => 8
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 8, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Le Insalate',
                    'description'              => 'Le Insalate'
                ]
            );
            DB::table('product_subcategories')->insert( //product_subcategories.id => 9
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 9, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Patatine & C.',
                    'description'              => 'Patatine & C.'
                ]
            );
            DB::table('product_subcategories')->insert( //product_subcategories.id => 10
                [
                    'product_category_id'   => 2,
                    'image'                 => 'image_test.jpg'
                ]
            );
            DB::table('product_subcategory_translations')->insert(
                [
                    'product_subcategory_id'   => 10, //incremental
                    'language_id'              => 1,
                    'name'                     => 'Bevande',
                    'description'              => 'Bevande'
                ]
            );


        //  ____                                       _             _     _
        // |  _ \   _ __    ___   ___    ___   _ __   | |_    __ _  | |_  (_)   ___    _ __    ___
        // | |_) | | '__|  / _ \ / __|  / _ \ | '_ \  | __|  / _` | | __| | |  / _ \  | '_ \  / __|
        // |  __/  | |    |  __/ \__ \ |  __/ | | | | | |_  | (_| | | |_  | | | (_) | | | | | \__ \
        // |_|     |_|     \___| |___/  \___| |_| |_|  \__|  \__,_|  \__| |_|  \___/  |_| |_| |___/
        //
            DB::table('product_presentations')->insert(['status_id'  => 1]); //product_presentations.id => 1
            DB::table('product_presentation_translations')->insert(
                [
                    'product_presentation_id'   => 1, //incremental
                    'language_id'               => 1,
                    'name'                      => 'Normali',
                    'description'               => 'Pizze di dimensioni normali'
                ]
            );

            DB::table('product_presentations')->insert(['status_id'  => 1]); //product_presentations.id => 2
            DB::table('product_presentation_translations')->insert(
                [
                    'product_presentation_id'   => 2, //incremental
                    'language_id'               => 1,
                    'name'                      => 'Giganti',
                    'description'               => 'Pizze di dimensioni giganti'
                ]
            );
            DB::table('product_presentations')->insert(['status_id'  => 1]); //product_presentations.id => 3
            DB::table('product_presentation_translations')->insert(
                [
                    'product_presentation_id'   => 3, //incremental
                    'language_id'               => 1,
                    'name'                      => '2 Litros',
                    'description'               => 'Botella de 2 Litros'
                ]
            );

        //     _          _       _   _   _     _                           _
        //    / \      __| |   __| | (_) | |_  (_)   ___    _ __     __ _  | |  ___
        //   / _ \    / _` |  / _` | | | | __| | |  / _ \  | '_ \   / _` | | | / __|
        //  / ___ \  | (_| | | (_| | | | | |_  | | | (_) | | | | | | (_| | | | \__ \
        // /_/   \_\  \__,_|  \__,_| |_|  \__| |_|  \___/  |_| |_|  \__,_| |_| |___/
        //
            DB::table('additionals')->insert( //additionals.id => 1
                [
                    'additional_category_id'    => 1,
                    'price'                     => 5.0,
                    'iva'                       => 0.22
                ]
            );
            DB::table('additional_translations')->insert(
                [
                    'additional_id' => 1, //incremental
                    'language_id'   => 1,
                    'name'          => 'Maiz',
                    'description'   => 'Maiz'
                ]
            );

            DB::table('additionals')->insert( //additionals.id => 2
                [
                    'additional_category_id'    => 1,
                    'price'                     => 7.0,
                    'iva'                       => 0.22
                ]
            );
            DB::table('additional_translations')->insert(
                [
                    'additional_id' => 2, //incremental
                    'language_id'   => 1,
                    'name'          => 'Jamon',
                    'description'   => 'Jamon'
                ]
            );

            DB::table('additionals')->insert( //additionals.id => 3
                [
                    'additional_category_id'    => 2,
                    'price'                     => 11.0,
                    'iva'                       => 0.22
                ]);
            DB::table('additional_translations')->insert(
                [
                    'additional_id' => 3, //incremental
                    'language_id'   => 1,
                    'name'          => 'Peperini',
                    'description'   => 'Peperini'
                ]
            );

            DB::table('additionals')->insert( //additionals.id => 4
                [
                    'additional_category_id'    => 2,
                    'price'                     => 15.0,
                    'iva'                       => 0.22
                ]
            );
            DB::table('additional_translations')->insert(
                [
                    'additional_id' => 4, //incremental
                    'language_id'   => 1,
                    'name'          => 'Mariscos',
                    'description'   => 'Mariscos'
                ]
            );

            DB::table('additionals')->insert( //additionals.id => 5
                [
                    'additional_category_id'    => 3,
                    'price'                     => 1.0,
                    'iva'                       => 0.22
                ]
            );
            DB::table('additional_translations')->insert(
                [
                    'additional_id' => 5, //incremental
                    'language_id'   => 1,
                    'name'          => 'Sobrecito de azucar',
                    'description'   => 'Sobrecito de azucar'
                ]
            );

            DB::table('additionals')->insert( //additionals.id => 6
                [
                    'additional_category_id'    => 3,
                    'price'                     => 1.5,
                    'iva'                       => 0.22
                ]
            );
            DB::table('additional_translations')->insert(
                [
                    'additional_id' => 6, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pitillos',
                    'description'   => 'Pitillos'
                ]
            );

        //  _____                  _        ____           _
        // |  ___|   ___    __ _  | |_     / ___|   __ _  | |_    ___    __ _    ___    _ __   _   _
        // | |_     / _ \  / _` | | __|   | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | | | |
        // |  _|   |  __/ | (_| | | |_    | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | |_| |
        // |_|      \___|  \__,_|  \__|    \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|     \__, |
        //                                                              |___/                  |___/
            DB::table('product_feature_categories')->insert(['status_id'  => 1]); //product_feature_categories.id => 1
            DB::table('product_feature_category_translations')->insert(
                [
                    'product_feature_category_id'   => 1, //incremental
                    'language_id'                   => 1,
                    'name'                          => 'Tipos de masa para Pizza Normal',
                    'description'                   => 'Tipos de masa para Pizza Normal'
                ]
            );

            DB::table('product_feature_categories')->insert(['status_id'  => 1]); //product_feature_categories.id => 2
            DB::table('product_feature_category_translations')->insert(
                [
                    'product_feature_category_id'   => 2, //incremental
                    'language_id'                   => 1,
                    'name'                          => 'Tipos de masa para Pizza VIP',
                    'description'                   => 'Tipos de masa para Pizza VIP'
                ]
            );

        //  _____                  _
        // |  ___|   ___    __ _  | |_   _   _   _ __    ___   ___
        // | |_     / _ \  / _` | | __| | | | | | '__|  / _ \ / __|
        // |  _|   |  __/ | (_| | | |_  | |_| | | |    |  __/ \__ \
        // |_|      \___|  \__,_|  \__|  \__,_| |_|     \___| |___/
        //
            DB::table('product_features')->insert( //product_features.id => 1
                [
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_feature_translations')->insert(
                [
                    'product_feature_id'    => 1, //incremental
                    'language_id'           => 1,
                    'name'                  => 'SCROCCHIARELLA',
                    'description'           => 'Fatta di Farina di grano tenero e tanto lievito naturale, è un prodotto 100% italiano, fonte naturale di fibre e ridotto contenuto di sale; ideale nelle diete per la prevenzione di disturbi legati alla tiroide.'
                ]
            );

            DB::table('product_features')->insert( //product_features.id => 2
                [
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_feature_translations')->insert(
                [
                    'product_feature_id'    => 2, //incremental
                    'language_id'           => 1,
                    'name'                  => 'INTEGRALE AI 10 CREALI',
                    'description'           => 'Costituita da una miscela di farine, semi e fiocchi. Da utilizzare per qualsiasi ricetta dolce o salata: pasta, pane, biscotti e piadine. Ideale per prodotti da forno in genere.'
                ]
            );
            DB::table('product_features')->insert( //product_features.id => 3
                [
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_feature_translations')->insert(
                [
                    'product_feature_id'    => 3, //incremental
                    'language_id'           => 1,
                    'name'                  => 'SENZA GLUTINE E SENZA LATTOSIO',
                    'description'           => 'I mix di impasti si stanno affinando sempre di più, per fare in modo che gli intolleranti sia al glutine che al lattosio possano gustare delle pietanze che una volta erano del tutto vietate, senza per questo rinunciare al gusto!'
                ]
            );

            DB::table('product_features')->insert( //product_features.id => 4
                [
                    'product_feature_category_id'   => 1
                ]);
            DB::table('product_feature_translations')->insert(
                [
                    'product_feature_id'    => 4, //incremental
                    'language_id'           => 1,
                    'name'                  => 'LA FARINA TIPO 1',
                    'description'           => 'La farina Tipo 1 rappresenta il giusto equilibrio tra l’attitudine panificatoria tipica delle farine raffinate e il maggiore apporto di nutrienti garantiti dalla farina integrale di frumento tenero.'
                ]
            );

        //  ____                       _                  _
        // |  _ \   _ __    ___     __| |  _   _    ___  | |_   ___
        // | |_) | | '__|  / _ \   / _` | | | | |  / __| | __| / __|
        // |  __/  | |    | (_) | | (_| | | |_| | | (__  | |_  \__ \
        // |_|     |_|     \___/   \__,_|  \__,_|  \___|  \__| |___/
        //

        //  ____    _
        // |  _ \  (_)  ____  ____   __ _   ___
        // | |_) | | | |_  / |_  /  / _` | / __|
        // |  __/  | |  / /   / /  | (_| | \__ \
        // |_|     |_| /___| /___|  \__,_| |___/


            //products.id => 1
            DB::table('products')->insert(
                [
                    'slug'                          => 'margarita',
                    'code'                          => 'MAR',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 1, //incremental
                    'language_id'   => 1,
                    'name'          => 'Margarita',
                    'description'   => 'Pomodoro y Mozzarella'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 1, // incremental
                    'slug'                      => 'margarita-Normali',
                    'price'                     => 4.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 1, // incremental
                    'slug'                      => 'margarita-Giganti',
                    'price'                     => 8.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

            //products.id => 2
            DB::table('products')->insert(
                [
                    'slug'                          => 'napoli',
                    'code'                          => 'NAP',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 2, //incremental
                    'language_id'   => 1,
                    'name'          => 'Napoli',
                    'description'   => 'Pomodoro, Mozzarella, Capperi y Alici'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 2, // incremental
                    'slug'                      => 'napoli-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 2, // incremental
                    'slug'                      => 'napoli-Giganti',
                    'price'                     => 9.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);
            //products.id => 3
            DB::table('products')->insert(
                [
                    'slug'                          => 'marinara',
                    'code'                          => 'MARI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 3, //incremental
                    'language_id'   => 1,
                    'name'          => 'Marinara',
                    'description'   => 'Pomodoro, Aglio, Capperi, Alici, Olive y Origano'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 3, // incremental
                    'slug'                      => 'marinara-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 3, // incremental
                    'slug'                      => 'marinara-Giganti',
                    'price'                     => 9.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);
            //products.id => 4
            DB::table('products')->insert(
                [
                    'slug'                          => 'greca',
                    'code'                          => 'GRE',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 4, //incremental
                    'language_id'   => 1,
                    'name'          => 'Greca',
                    'description'   => 'Pomodoro, Mozzarella, Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 4, // incremental
                    'slug'                      => 'greca-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 4, // incremental
                    'slug'                      => 'greca-Giganti',
                    'price'                     => 9.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);
            //products.id => 5
            DB::table('products')->insert(
                [
                    'slug'                          => 'prosciutto_funghi',
                    'code'                          => 'PROF',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 5, //incremental
                    'language_id'   => 1,
                    'name'          => 'Prosciutto e Funghi',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto y Funghi'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 5, // incremental
                    'slug'                      => 'prosciutto_funghi-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 5, // incremental
                    'slug'                      => 'prosciutto_funghi-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);
            //products.id => 6
            DB::table('products')->insert(
                [
                    'slug'                          => 'canadese',
                    'code'                          => 'CAND',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 6, //incremental
                    'language_id'   => 1,
                    'name'          => 'Canadese',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto y Funghi'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 6, // incremental
                    'slug'                      => 'canadese-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 6, // incremental
                    'slug'                      => 'canadese-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);
            //products.id => 7
            DB::table('products')->insert(
                [
                    'slug'                          => 'americana',
                    'code'                          => 'AMER',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 7, //incremental
                    'language_id'   => 1,
                    'name'          => 'Americana',
                    'description'   => 'Pomodoro, Mozzarella, Patatite y fritte'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 7, // incremental
                    'slug'                      => 'americana-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 7, // incremental
                    'slug'                      => 'americana-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);
            //products.id => 8
            DB::table('products')->insert(
                [
                    'slug'                          => 'cotto_olive',
                    'code'                          => 'AMER',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 8, //incremental
                    'language_id'   => 1,
                    'name'          => 'Cotto e Olive',
                    'description'   => '(Pomodoro, Mozzarella, Cotto y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 8, // incremental
                    'slug'                      => 'cotto_olive-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 8, // incremental
                    'slug'                      => 'cotto_olive-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);
            //products.id => 9
            DB::table('products')->insert(
                [
                    'slug'                          => 'wurstel_funghi',
                    'code'                          => 'WUFU',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 9, //incremental
                    'language_id'   => 1,
                    'name'          => 'Wurstel e Funghi',
                    'description'   => 'Pomodoro, Mozzarella, Wurstel y Funghi'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 9, // incremental
                    'slug'                      => 'cotto_olive-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 9, // incremental
                    'slug'                      => 'cotto_olive-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 10
            DB::table('products')->insert(
                [
                    'slug'                          => 'napoleone',
                    'code'                          => 'NAPO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 10, //incremental
                    'language_id'   => 1,
                    'name'          => 'Napoleone',
                    'description'   => 'Pomodoro, Mozzarella, Cipolle, Peperoni y Salsiccia piccante'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 10, // incremental
                    'slug'                      => 'napoleone-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 10, // incremental
                    'slug'                      => 'napoleone-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 11
            DB::table('products')->insert(
                [
                    'slug'                          => 'cotto_wurstel_panna',
                    'code'                          => 'COWP',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 11, //incremental
                    'language_id'   => 1,
                    'name'          => 'Cotto, Wurstel e Panna',
                    'description'   => 'Pomodoro, Mozzarella, Cotto y Wurstel e Panna'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 11, // incremental
                    'slug'                      => 'cotto_wurstel_panna-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 11, // incremental
                    'slug'                      => 'cotto_wurstel_panna-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 12
            DB::table('products')->insert(
                [
                    'slug'                          => 'quattro_formaggi',
                    'code'                          => '4FORM',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 12, //incremental
                    'language_id'   => 1,
                    'name'          => 'Quattro Formaggi',
                    'description'   => 'Pomodoro, Mozzarella, Emmental, Gorgonzola y Peretta'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 12, // incremental
                    'slug'                      => 'quattro_formaggi-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 12, // incremental
                    'slug'                      => 'quattro_formaggi-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 13
            DB::table('products')->insert(
                [
                    'slug'                          => 'quattro_stagioni',
                    'code'                          => '4STA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 13, //incremental
                    'language_id'   => 1,
                    'name'          => 'Quattro Stagioni',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto, Carciofi, Funghi y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 13, // incremental
                    'slug'                      => 'quattro_stagioni-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 13, // incremental
                    'slug'                      => 'quattro_stagioni-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 14
            DB::table('products')->insert(
                [
                    'slug'                          => 'della_casa',
                    'code'                          => 'DECA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 14, //incremental
                    'language_id'   => 1,
                    'name'          => 'Della Casa',
                    'description'   => 'Pomodoro, Mozzarella, Gorgonzola, Salsiccia y Pancetta'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 14, // incremental
                    'slug'                      => 'della_casa-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 14, // incremental
                    'slug'                      => 'della_casa-Giganti',
                    'price'                     => 15.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 15
            DB::table('products')->insert(
                [
                    'slug'                          => 'sarda',
                    'code'                          => 'SAR',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 15, //incremental
                    'language_id'   => 1,
                    'name'          => 'Sarda',
                    'description'   => 'Pomodoro, Mozzarella, Salsiccia, Olive y Pecorino grattugiato'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 15, // incremental
                    'slug'                      => 'sarda-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 15, // incremental
                    'slug'                      => 'sarda-Giganti',
                    'price'                     => 15.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 16
            DB::table('products')->insert(
                [
                    'slug'                          => 'boscaiola',
                    'code'                          => 'BOS',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 16, //incremental
                    'language_id'   => 1,
                    'name'          => 'Boscaiola',
                    'description'   => 'Pomodoro, Mozzarella, Salsiccia, Olive y Funghi'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 16, // incremental
                    'slug'                      => 'boscaiola-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 16, // incremental
                    'slug'                      => 'boscaiola-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 17
            DB::table('products')->insert(
                [
                    'slug'                          => 'capricciosa',
                    'code'                          => 'CAPR',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 17, //incremental
                    'language_id'   => 1,
                    'name'          => 'Capricciosa',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto, Funghi, Olive, Carciofi, Capperi y Alici'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 17, // incremental
                    'slug'                      => 'capricciosa-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 17, // incremental
                    'slug'                      => 'capricciosa-Giganti',
                    'price'                     => 11.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 18
            DB::table('products')->insert(
                [
                    'slug'                          => 'rustica',
                    'code'                          => 'RUST',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 18, //incremental
                    'language_id'   => 1,
                    'name'          => 'Rustica',
                    'description'   => 'Pomodoro, Mozzarella, Salsiccia fresca, Funghi y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 18, // incremental
                    'slug'                      => 'rustica-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 18, // incremental
                    'slug'                      => 'rustica-Giganti',
                    'price'                     => 11.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 19
            DB::table('products')->insert(
                [
                    'slug'                          => 'completa',
                    'code'                          => 'COMP',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 19, //incremental
                    'language_id'   => 1,
                    'name'          => 'Completa',
                    'description'   => 'Pomodoro, Mozzarella, Salsiccia fresca, Funghi y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 19, // incremental
                    'slug'                      => 'completa-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 19, // incremental
                    'slug'                      => 'completa-Giganti',
                    'price'                     => 11.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 20
            DB::table('products')->insert(
                [
                    'slug'                          => 'norvegese',
                    'code'                          => 'NORV',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 20, //incremental
                    'language_id'   => 1,
                    'name'          => 'Norvegese',
                    'description'   => 'Pomodoro, Mozzarella, Salmone, Panna y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 20, // incremental
                    'slug'                      => 'norvegese-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 20, // incremental
                    'slug'                      => 'norvegese-Giganti',
                    'price'                     => 11.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 21
            DB::table('products')->insert(
                [
                    'slug'                          => 'vegetariana',
                    'code'                          => 'VEGE',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 21, //incremental
                    'language_id'   => 1,
                    'name'          => 'Vegetariana',
                    'description'   => 'Pomodoro, Mozzarella, Melanzane, Peperoni, Zucchine y Carciofi'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 21, // incremental
                    'slug'                      => 'vegetariana-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 21, // incremental
                    'slug'                      => 'vegetariana-Giganti',
                    'price'                     => 11.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 22
            DB::table('products')->insert(
                [
                    'slug'                          => 'tonnara',
                    'code'                          => 'TONN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 22, //incremental
                    'language_id'   => 1,
                    'name'          => 'Tonnara',
                    'description'   => 'Pomodoro, Mozzarella, Tonno y Cipolla'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 22, // incremental
                    'slug'                      => 'tonnara-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 22, // incremental
                    'slug'                      => 'tonnara-Giganti',
                    'price'                     => 11.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 23
            DB::table('products')->insert(
                [
                    'slug'                          => 'parigina',
                    'code'                          => 'PARI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 23, //incremental
                    'language_id'   => 1,
                    'name'          => 'Parigina',
                    'description'   => 'Pomodoro, Mozzarella, Panna y prosciutto crudo'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 23, // incremental
                    'slug'                      => 'parigina-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 23, // incremental
                    'slug'                      => 'parigina-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 24
            DB::table('products')->insert(
                [
                    'slug'                          => 'padana',
                    'code'                          => 'PAD',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 24, //incremental
                    'language_id'   => 1,
                    'name'          => 'Padana',
                    'description'   => 'Pomodoro, Mozzarella, Cotto, Zucchine y Gorgonzola'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 24, // incremental
                    'slug'                      => 'padana-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 24, // incremental
                    'slug'                      => 'padana-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 25
            DB::table('products')->insert(
                [
                    'slug'                          => 'bianca_menù',
                    'code'                          => 'BIME',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 25, //incremental
                    'language_id'   => 1,
                    'name'          => 'Bianca Menù',
                    'description'   => 'Mozzarella, Prosciutto crudo, Rucola, Pomodori y Grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 25, // incremental
                    'slug'                      => 'bianca_menù-Normali',
                    'price'                     => 6.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1, // boolean
                    'suggestion'                => 0  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 25, // incremental
                    'slug'                      => 'bianca_menù-Giganti',
                    'price'                     => 12.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1, // boolean
                    'suggestion'                => 1  // boolean
                ]
            ]);//products.id => 26
            DB::table('products')->insert(
                [
                    'slug'                          => 'fabio',
                    'code'                          => 'FABI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 26, //incremental
                    'language_id'   => 1,
                    'name'          => 'Fabio',
                    'description'   => 'Sfoglia olio e sale, Mozzarella di Bufala, Pomodoro Fresco y Origano'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 26, // incremental
                    'slug'                      => 'fabio-Normali',
                    'price'                     => 6.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1, // boolean
                    'suggestion'                => 0  // boolean
                ],

                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 26, // incremental
                    'slug'                      => 'fabio-Giganti',
                    'price'                     => 12.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1, // boolean
                    'suggestion'                => 1  // boolean
                ]
            ]);//products.id => 27
            DB::table('products')->insert(
                [
                    'slug'                          => 'Diavola',
                    'code'                          => 'DIAV',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 27, //incremental
                    'language_id'   => 1,
                    'name'          => 'Diavola',
                    'description'   => 'Pomodoro, Mozzarella, Salsiccia Piccante y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 27, // incremental
                    'slug'                      => 'fabio-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 27, // incremental
                    'slug'                      => 'fabio-Giganti',
                    'price'                     => 10.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 28
            DB::table('products')->insert(
                [
                    'slug'                          => 'umbra',
                    'code'                          => 'UMBR',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 28, //incremental
                    'language_id'   => 1,
                    'name'          => 'Umbra',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Scamorza, Speck y Grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 28, // incremental
                    'slug'                      => 'umbra-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1, // boolean
                    'suggestion'                => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 28, // incremental
                    'slug'                      => 'umbra-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1, // boolean
                    'suggestion'                => 1  // boolean
                ]
            ]);//products.id => 29
            DB::table('products')->insert(
                [
                    'slug'                          => 'mare_monti',
                    'code'                          => 'MAMO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 29, //incremental
                    'language_id'   => 1,
                    'name'          => 'Mare e Monti',
                    'description'   => 'Pomodoro, Mozzarella, Funghi Porcini, Olive y Frutti di Mare'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 29, // incremental
                    'slug'                      => 'mare_monti-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 29, // incremental
                    'slug'                      => 'mare_monti-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 30
            DB::table('products')->insert(
                [
                    'slug'                          => 'caliente',
                    'code'                          => 'CALI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 30, //incremental
                    'language_id'   => 1,
                    'name'          => 'Caliente',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Salsiccia y Peperoni freschi piccanti'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 30, // incremental
                    'slug'                      => 'caliente-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 30, // incremental
                    'slug'                      => 'caliente-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 31
            DB::table('products')->insert(
                [
                    'slug'                          => 'genovese',
                    'code'                          => 'GEN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 1,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 31, //incremental
                    'language_id'   => 1,
                    'name'          => 'Genovese',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Pesto, Funghi y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 31, // incremental
                    'slug'                      => 'genovese-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 31, // incremental
                    'slug'                      => 'genovese-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  ____    _                        ____                          _           _   _
        // |  _ \  (_)  ____  ____   ___    / ___|   _ __     ___    ___  (_)   __ _  | | (_)
        // | |_) | | | |_  / |_  /  / _ \   \___ \  | '_ \   / _ \  / __| | |  / _` | | | | |
        // |  __/  | |  / /   / /  |  __/    ___) | | |_) | |  __/ | (__  | | | (_| | | | | |
        // |_|     |_| /___| /___|  \___|   |____/  | .__/   \___|  \___| |_|  \__,_| |_| |_|
        //                                          |_|
            //products.id => 32
            DB::table('products')->insert(
                [
                    'slug'                          => 'brontolona',
                    'code'                          => 'BRON',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 32, //incremental
                    'language_id'   => 1,
                    'name'          => 'Brontolona',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Peperoni, Uova y Pancetta'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 32, // incremental
                    'slug'                      => 'brontolona-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 32, // incremental
                    'slug'                      => 'brontolona-Giganti',
                    'price'                     => 15.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 33
            DB::table('products')->insert(
                [
                    'slug'                          => 'sorpresa',
                    'code'                          => 'SORP',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 33, //incremental
                    'language_id'   => 1,
                    'name'          => 'Sorpresa',
                    'description'   => '???'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 33, // incremental
                    'slug'                      => 'sorpresa-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 33, // incremental
                    'slug'                      => 'sorpresa-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 34
            DB::table('products')->insert(
                [
                    'slug'                          => 'delicata',
                    'code'                          => 'DELI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 34, //incremental
                    'language_id'   => 1,
                    'name'          => 'Delicata',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Melanzane, Asparagi y Radicchio o Rucola'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 34, // incremental
                    'slug'                      => 'sorpresa-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 34, // incremental
                    'slug'                      => 'sorpresa-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 35
            DB::table('products')->insert(
                [
                    'slug'                          => 'Abanerojjj',
                    'code'                          => 'JJJ',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 35, //incremental
                    'language_id'   => 1,
                    'name'          => 'Abanero JJJ',
                    'description'   => 'informazioni mancanti'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 35, // incremental
                    'slug'                      => 'Abanerojjj-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 35, // incremental
                    'slug'                      => 'Abanerojjj-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 36
            DB::table('products')->insert(
                [
                    'slug'                          => 'tirolese',
                    'code'                          => 'TIRO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 36, //incremental
                    'language_id'   => 1,
                    'name'          => 'Tirolese',
                    'description'   => 'Pomodoro, Mozzarella, Uova, Speck y Funghi Porcini'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 36, // incremental
                    'slug'                      => 'tirolese-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 36, // incremental
                    'slug'                      => 'tirolese-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 37
            DB::table('products')->insert(
                [
                    'slug'                          => 'cocode',
                    'code'                          => 'COCO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 37, //incremental
                    'language_id'   => 1,
                    'name'          => 'Cò Cò Dè',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Mais, Cipolle, Uova y Salsiccia fresca'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 37, // incremental
                    'slug'                      => 'cocode-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 37, // incremental
                    'slug'                      => 'cocode-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 38
            DB::table('products')->insert(
                [
                    'slug'                          => 'pugliese',
                    'code'                          => 'PUGL',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 38, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pugliese',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Cipolle, Olive y Funghi'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 38, // incremental
                    'slug'                      => 'pugliese-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 38, // incremental
                    'slug'                      => 'pugliese-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 39
            DB::table('products')->insert(
                [
                    'slug'                          => 'barbaricina',
                    'code'                          => 'BARB',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 39, //incremental
                    'language_id'   => 1,
                    'name'          => 'Barbaricina',
                    'description'   => 'Pomodoro, Mozzarella, Salsiccia Fresca, Asparagi y Grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 39, // incremental
                    'slug'                      => 'barbaricina-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 39, // incremental
                    'slug'                      => 'barbaricina-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 40
            DB::table('products')->insert(
                [
                    'slug'                          => 'montanara',
                    'code'                          => 'MONT',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 40, //incremental
                    'language_id'   => 1,
                    'name'          => 'Montanara',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Speck, Asparagi y Grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 40, // incremental
                    'slug'                      => 'montanara-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 40, // incremental
                    'slug'                      => 'montanara-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 41
            DB::table('products')->insert(
                [
                    'slug'                          => 'valtellinese',
                    'code'                          => 'VALT',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 41, //incremental
                    'language_id'   => 1,
                    'name'          => 'Valtellinese',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Pomodori, Rucola, Stracchino y Bresaola'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 41, // incremental
                    'slug'                      => 'valtellinese-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 41, // incremental
                    'slug'                      => 'valtellinese-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 42
            DB::table('products')->insert(
                [
                    'slug'                          => 'bufala_menu',
                    'code'                          => 'BUME',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 42, //incremental
                    'language_id'   => 1,
                    'name'          => 'Bufala Menù',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Pomodoro Fresco y Rucola'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 42, // incremental
                    'slug'                      => 'bufala_menu-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 42, // incremental
                    'slug'                      => 'bufala_menu-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 43
            DB::table('products')->insert(
                [
                    'slug'                          => 'estate',
                    'code'                          => 'ESTA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 43, //incremental
                    'language_id'   => 1,
                    'name'          => 'Estate',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Spinaci, Grana, Prosciutto crudo y Basilico'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 43, // incremental
                    'slug'                      => 'estate-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 43, // incremental
                    'slug'                      => 'estate-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 44
            DB::table('products')->insert(
                [
                    'slug'                          => 'adamo',
                    'code'                          => 'ADMA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 44, //incremental
                    'language_id'   => 1,
                    'name'          => 'Adamo',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Pomodori, Prosciutto, Mais y Basilico'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 44, // incremental
                    'slug'                      => 'adamo-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 44, // incremental
                    'slug'                      => 'adamo-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 45
            DB::table('products')->insert(
                [
                    'slug'                          => 'pannocchia',
                    'code'                          => 'PANN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 45, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pannocchia',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Bresaola, Pomodori y Mais'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 45, // incremental
                    'slug'                      => 'pannocchia-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 45, // incremental
                    'slug'                      => 'pannocchia-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 46
            DB::table('products')->insert(
                [
                    'slug'                          => 'ippodromo',
                    'code'                          => 'IPPO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 46, //incremental
                    'language_id'   => 1,
                    'name'          => 'Ippodromo',
                    'description'   => 'Pomodoro, Mozzarella, Carne di Cavallo y Patatine'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 46, // incremental
                    'slug'                      => 'ippodromo-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 46, // incremental
                    'slug'                      => 'ippodromo-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 47
            DB::table('products')->insert(
                [
                    'slug'                          => 'furia',
                    'code'                          => 'FURI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 47, //incremental
                    'language_id'   => 1,
                    'name'          => 'Furia',
                    'description'   => 'Pomodoro, Mozzarella, Carne di Cavallo y Patatine'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 47, // incremental
                    'slug'                      => 'furia-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 47, // incremental
                    'slug'                      => 'furia-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 48
            DB::table('products')->insert(
                [
                    'slug'                          => 'frutti_di_mare',
                    'code'                          => 'FRUT',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 48, //incremental
                    'language_id'   => 1,
                    'name'          => 'Frutti di Mare',
                    'description'   => 'Pomodoro, Mozzarella y Frutti di mare'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 48, // incremental
                    'slug'                      => 'frutti_di_mare-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 48, // incremental
                    'slug'                      => 'frutti_di_mare-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 49
            DB::table('products')->insert(
                [
                    'slug'                          => 'gallurese',
                    'code'                          => 'GALL',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 49, //incremental
                    'language_id'   => 1,
                    'name'          => 'Gallurese',
                    'description'   => 'Pomodoro, Mozzarella, Gamberoni, Carciofi y Pomodori'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 49, // incremental
                    'slug'                      => 'gallurese-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 49, // incremental
                    'slug'                      => 'gallurese-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 50
            DB::table('products')->insert(
                [
                    'slug'                          => 'oasi',
                    'code'                          => 'OASI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 50, //incremental
                    'language_id'   => 1,
                    'name'          => 'Oasi',
                    'description'   => 'Pomodoro, Mozzarella, Salmone, Gamberetti, Panna y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 50, // incremental
                    'slug'                      => 'oasi-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 50, // incremental
                    'slug'                      => 'oasi-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 51
            DB::table('products')->insert(
                [
                    'slug'                          => 'pittulongu',
                    'code'                          => 'PITT',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 51, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pittulongu',
                    'description'   => 'Pomodoro, Mozzarella, Polpo locale e Cozze di Olbia'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 51, // incremental
                    'slug'                      => 'pittulongu-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 51, // incremental
                    'slug'                      => 'pittulongu-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 52
            DB::table('products')->insert(
                [
                    'slug'                          => 'capitano_nemo',
                    'code'                          => 'CANE',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 52, //incremental
                    'language_id'   => 1,
                    'name'          => 'Capitano Nemo',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Tonno, Cipolle, Uova'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 52, // incremental
                    'slug'                      => 'capitano_nemo-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 52, // incremental
                    'slug'                      => 'capitano_nemo-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 53
            DB::table('products')->insert(
                [
                    'slug'                          => 'cabras',
                    'code'                          => 'CABR',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 53, //incremental
                    'language_id'   => 1,
                    'name'          => 'Cabras',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Tonno y Cipolle, Uova'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 53, // incremental
                    'slug'                      => 'cabras-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 53, // incremental
                    'slug'                      => 'cabras-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 54
            DB::table('products')->insert(
                [
                    'slug'                          => 'pineta',
                    'code'                          => 'PINE',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 54, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pineta',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Pinoli e Gamberetti'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 54, // incremental
                    'slug'                      => 'pineta-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 54, // incremental
                    'slug'                      => 'pineta-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 55
            DB::table('products')->insert(
                [
                    'slug'                          => 'carbonara',
                    'code'                          => 'CARB',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 55, //incremental
                    'language_id'   => 1,
                    'name'          => 'Carbonara',
                    'description'   => 'Mozzarella di Bufala, Pancetta, Uova, Panna y Pepe nere'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 55, // incremental
                    'slug'                      => 'carbonara-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 55, // incremental
                    'slug'                      => 'carbonara-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 56
            DB::table('products')->insert(
                [
                    'slug'                          => 'ratatouille',
                    'code'                          => 'RATA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 56, //incremental
                    'language_id'   => 1,
                    'name'          => 'Ratatouille',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Gorgonzola, Prosciutto, Noce Moscata y Panna'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 56, // incremental
                    'slug'                      => 'ratatouille-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 56, // incremental
                    'slug'                      => 'ratatouille-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 57
            DB::table('products')->insert(
                [
                    'slug'                          => 'porchetta',
                    'code'                          => 'PORC',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 57, //incremental
                    'language_id'   => 1,
                    'name'          => 'Porchetta',
                    'description'   => 'Pomodoro, Mozzarella, Porchetta y Patate'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 57, // incremental
                    'slug'                      => 'porchetta-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 57, // incremental
                    'slug'                      => 'porchetta-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 58
            DB::table('products')->insert(
                [
                    'slug'                          => 'sfiziosa',
                    'code'                          => 'SFIZ',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 58, //incremental
                    'language_id'   => 1,
                    'name'          => 'Sfiziosa',
                    'description'   => 'Mozzarella di Bufala, Gorgonzola, Speck y Noci'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 58, // incremental
                    'slug'                      => 'sfiziosa-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 58, // incremental
                    'slug'                      => 'sfiziosa-Giganti',
                    'price'                     => 13.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 59
            DB::table('products')->insert(
                [
                    'slug'                          => 'pizza_fritta',
                    'code'                          => 'PIFI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 59, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pizza Fritta',
                    'description'   => 'Mozzarella di Bufala y Salsa di Pomodoro'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 59, // incremental
                    'slug'                      => 'pizza_fritta-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 59, // incremental
                    'slug'                      => 'pizza_fritta-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 60
            DB::table('products')->insert(
                [
                    'slug'                          => 'tris_di_funghi',
                    'code'                          => 'TRIF',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 60, //incremental
                    'language_id'   => 1,
                    'name'          => 'Tris di Funghi',
                    'description'   => 'Pomodoro, Mozzarella, Antunne, Porcini, Champignon y Grana Padano'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 60, // incremental
                    'slug'                      => 'tris_di_funghi-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 60, // incremental
                    'slug'                      => 'tris_di_funghi-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 61
            DB::table('products')->insert(
                [
                    'slug'                          => 'limbara',
                    'code'                          => 'LIMB',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 61, //incremental
                    'language_id'   => 1,
                    'name'          => 'Limbara',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Salsiccia fresca, Antunne y Grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 61, // incremental
                    'slug'                      => 'limbara-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 61, // incremental
                    'slug'                      => 'limbara-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 62
            DB::table('products')->insert(
                [
                    'slug'                          => 'big_food',
                    'code'                          => 'BIGF',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 62, //incremental
                    'language_id'   => 1,
                    'name'          => 'Big Food',
                    'description'   => 'Doppia pasta, Doppia mozzarella, Doppia porchetta, Cipolla, Patate, Uova, Pomodorini e Origano'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 62, // incremental
                    'slug'                      => 'big_food-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 62, // incremental
                    'slug'                      => 'big_food-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 63
            DB::table('products')->insert(
                [
                    'slug'                          => 'luke',
                    'code'                          => 'LUKE',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 63, //incremental
                    'language_id'   => 1,
                    'name'          => 'Luke',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Carciofi, Gamberetti y Bottarga'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 63, // incremental
                    'slug'                      => 'luke-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 63, // incremental
                    'slug'                      => 'luke-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 64
            DB::table('products')->insert(
                [
                    'slug'                          => 'alessandra',
                    'code'                          => 'ALES',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 64, //incremental
                    'language_id'   => 1,
                    'name'          => 'Alessandra',
                    'description'   => 'Mozzarella di Bufala, bresaola, Rucola y Pomodorini ed aceto balsamico di modena'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 64, // incremental
                    'slug'                      => 'alessandra-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 64, // incremental
                    'slug'                      => 'alessandra-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 65
            DB::table('products')->insert(
                [
                    'slug'                          => 'gennargentu',
                    'code'                          => 'GENN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 65, //incremental
                    'language_id'   => 1,
                    'name'          => 'Gennargentu',
                    'description'   => 'Pomodoro, Mozzarella, Salsiccia, Scamorza, Crema di Formaggio y Pecorino grattugiato'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 65, // incremental
                    'slug'                      => 'gennargentu-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 65, // incremental
                    'slug'                      => 'gennargentu-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 66
            DB::table('products')->insert(
                [
                    'slug'                          => 'braccio_di_ferro',
                    'code'                          => 'BRAC',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 66, //incremental
                    'language_id'   => 1,
                    'name'          => 'Braccio di Ferro',
                    'description'   => 'Pomodoro, Mozzarella, Ricotta, Spinaci, Uovo y Grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 66, // incremental
                    'slug'                      => 'braccio_di_ferro-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 66, // incremental
                    'slug'                      => 'braccio_di_ferro-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 67
            DB::table('products')->insert(
                [
                    'slug'                          => 'parmigiana',
                    'code'                          => 'PARM',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 2,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => 1
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 67, //incremental
                    'language_id'   => 1,
                    'name'          => 'Parmigiana',
                    'description'   => 'Pomodoro, Mozzarella, Ricotta, Spinaci, Uovo y Grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 67, // incremental
                    'slug'                      => 'parmigiana-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 67, // incremental
                    'slug'                      => 'parmigiana-Giganti',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //   ____           _                         _               ____    _          _       _                _
        //  / ___|   __ _  | |  ____   ___    _ __   (_)     __ _    |  _ \  (_)   ___  | |__   (_)   ___   ___  | |_    __ _
        // | |      / _` | | | |_  /  / _ \  | '_ \  | |    / _` |   | |_) | | |  / __| | '_ \  | |  / _ \ / __| | __|  / _` |
        // | |___  | (_| | | |  / /  | (_) | | | | | | |   | (_| |   |  _ <  | | | (__  | | | | | | |  __/ \__ \ | |_  | (_| |
        //  \____|  \__,_| |_| /___|  \___/  |_| |_| |_|    \__,_|   |_| \_\ |_|  \___| |_| |_| |_|  \___| |___/  \__|  \__,_|

            //products.id => 68
            DB::table('products')->insert(
                [
                    'slug'                          => 'calzone_margherita',
                    'code'                          => 'CAME',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 3,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 68, //incremental
                    'language_id'   => 1,
                    'name'          => 'Calzone Margherita',
                    'description'   => 'Pomodoro y Mozzarella'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 68, // incremental
                    'slug'                      => 'calzone_margherita-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 68, // incremental
                    'slug'                      => 'calzone_margherita-Giganti',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 69
            DB::table('products')->insert(
                [
                    'slug'                          => 'calzone_prosciutto_funghi',
                    'code'                          => 'CAPF',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 3,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 69, //incremental
                    'language_id'   => 1,
                    'name'          => 'Calzone Prosciutto e Funghi',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto y Funghi'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 69, // incremental
                    'slug'                      => 'calzone_prosciutto_funghi-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 69, // incremental
                    'slug'                      => 'calzone_prosciutto_funghi-Giganti',
                    'price'                     => 11.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 70
            DB::table('products')->insert(
                [
                    'slug'                          => 'calzone_bufala',
                    'code'                          => 'CABU',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 3,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 70, //incremental
                    'language_id'   => 1,
                    'name'          => 'Calzone Bufala',
                    'description'   => 'Pomodoro y Mozzarella di Bufala'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 70, // incremental
                    'slug'                      => 'calzone_bufala-Normali',
                    'price'                     => 6.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 70, // incremental
                    'slug'                      => 'calzone_bufala-Giganti',
                    'price'                     => 13.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 71
            DB::table('products')->insert(
                [
                    'slug'                          => 'calzone_sorpresa',
                    'code'                          => 'CASO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 3,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 71, //incremental
                    'language_id'   => 1,
                    'name'          => 'Calzone Sorpresa',
                    'description'   => 'Pomodoro y Mozzarella di Bufala'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 71, // incremental
                    'slug'                      => 'calzone_sorpresa-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 71, // incremental
                    'slug'                      => 'calzone_sorpresa-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 72
            DB::table('products')->insert(
                [
                    'slug'                          => 'calzone_completo',
                    'code'                          => 'CACO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 3,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 72, //incremental
                    'language_id'   => 1,
                    'name'          => 'Calzone Completo',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto, Funghi, Olive, Wurstel y Salsiccia'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 72, // incremental
                    'slug'                      => 'calzone_completo-Normali',
                    'price'                     => 6.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 72, // incremental
                    'slug'                      => 'calzone_completo-Giganti',
                    'price'                     => 12.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 73
            DB::table('products')->insert(
                [
                    'slug'                          => 'calzone_bomba',
                    'code'                          => 'CABO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 3,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 73, //incremental
                    'language_id'   => 1,
                    'name'          => 'Calzone Bomba',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Gorgonzola, Prosciutto Cotto, Capperi y Origanoa'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 73, // incremental
                    'slug'                      => 'calzone_bomba-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 73, // incremental
                    'slug'                      => 'calzone_bomba-Giganti',
                    'price'                     => 14.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  _                _____
        // | |       ___    |  ___|   ___     ___    ___    __ _    ___    ___
        // | |      / _ \   | |_     / _ \   / __|  / __|  / _` |  / __|  / _ \
        // | |___  |  __/   |  _|   | (_) | | (__  | (__  | (_| | | (__  |  __/
        // |_____|  \___|   |_|      \___/   \___|  \___|  \__,_|  \___|  \___|

            //products.id => 74
            DB::table('products')->insert(
                [
                    'slug'                          => 'solita',
                    'code'                          => 'SOLI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 74, //incremental
                    'language_id'   => 1,
                    'name'          => 'Solita',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto crudo y Basilico a richiesta'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 74, // incremental
                    'slug'                      => 'solita-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 74, // incremental
                    'slug'                      => 'solita-Giganti',
                    'price'                     => 9.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 75
            DB::table('products')->insert(
                [
                    'slug'                          => 'pinne_gialle',
                    'code'                          => 'PIGI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 75, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pinne Gialle',
                    'description'   => 'Pomodoro, Mozzarella, Tonno y Maionese'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 75, // incremental
                    'slug'                      => 'pinne_gialle-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 75, // incremental
                    'slug'                      => 'pinne_gialle-Giganti',
                    'price'                     => 9.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 76
            DB::table('products')->insert(
                [
                    'slug'                          => 'tedesca',
                    'code'                          => 'TEDE',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 76, //incremental
                    'language_id'   => 1,
                    'name'          => 'Tedesca',
                    'description'   => 'Pomodoro, Mozzarella y Wurstel'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 76, // incremental
                    'slug'                      => 'tedesca-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 76, // incremental
                    'slug'                      => 'tedesca-Giganti',
                    'price'                     => 9.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 77
            DB::table('products')->insert(
                [
                    'slug'                          => 'gonzaga',
                    'code'                          => 'GONZ',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 77, //incremental
                    'language_id'   => 1,
                    'name'          => 'Gonzaga',
                    'description'   => 'Pomodoro, Mozzarella, Prosciutto cotto y Gorgonzola'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 77, // incremental
                    'slug'                      => 'gonzaga-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 77, // incremental
                    'slug'                      => 'gonzaga-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 78
            DB::table('products')->insert(
                [
                    'slug'                          => 'bufalina',
                    'code'                          => 'BUFL',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 78, //incremental
                    'language_id'   => 1,
                    'name'          => 'Bufalina',
                    'description'   => 'Pomodoro, Prosciutto crudo, Rucola y Mozzarella di Bufala'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 78, // incremental
                    'slug'                      => 'bufalina-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 78, // incremental
                    'slug'                      => 'bufalina-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 79
            DB::table('products')->insert(
                [
                    'slug'                          => 'irgolese',
                    'code'                          => 'IRGL',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 79, //incremental
                    'language_id'   => 1,
                    'name'          => 'Irgolese',
                    'description'   => 'Salsiccia, Insalata y Peretta e salse a scelta'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 79, // incremental
                    'slug'                      => 'irgolese-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 79, // incremental
                    'slug'                      => 'irgolese-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 80
            DB::table('products')->insert(
                [
                    'slug'                          => 'light',
                    'code'                          => 'LIGH',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 80, //incremental
                    'language_id'   => 1,
                    'name'          => 'Light',
                    'description'   => 'Mozzarella, Prosciutto cotto y Insalata'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 80, // incremental
                    'slug'                      => 'light-Normali',
                    'price'                     => 4.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 80, // incremental
                    'slug'                      => 'light-Giganti',
                    'price'                     => 8.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 81
            DB::table('products')->insert(
                [
                    'slug'                          => 'san_simplicio',
                    'code'                          => 'SASI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 4,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 81, //incremental
                    'language_id'   => 1,
                    'name'          => 'San Simplicio',
                    'description'   => 'Salsiccia fresca y Cipolle e salse a scelta'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Normali
                    'product_id'                => 81, // incremental
                    'slug'                      => 'san_simplicio-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ],
                [
                    'product_presentation_id'   => 2, // Giganti
                    'product_id'                => 81, // incremental
                    'slug'                      => 'san_simplicio-Giganti',
                    'price'                     => 10.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  ____    _           _     _     _      ____                                             _     _
        // |  _ \  (_)   __ _  | |_  | |_  (_)    / ___|   ___    _ __ ___    _ __     ___    ___  | |_  (_)
        // | |_) | | |  / _` | | __| | __| | |   | |      / _ \  | '_ ` _ \  | '_ \   / _ \  / __| | __| | |
        // |  __/  | | | (_| | | |_  | |_  | |   | |___  | (_) | | | | | | | | |_) | | (_) | \__ \ | |_  | |
        // |_|     |_|  \__,_|  \__|  \__| |_|    \____|  \___/  |_| |_| |_| | .__/   \___/  |___/  \__| |_|
        //                                                                   |_|

            //products.id => 82
            DB::table('products')->insert(
                [
                    'slug'                          => 'costata_di_manzo',
                    'code'                          => 'CMAF',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 5,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 82, //incremental
                    'language_id'   => 1,
                    'name'          => 'Costata di Manzo + Focaccia',
                    'description'   => 'Con contorno di patate o insalate'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 82, // incremental
                    'slug'                      => 'costata_di_manzo-Normali',
                    'price'                     => 13.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 83
            DB::table('products')->insert(
                [
                    'slug'                          => 'costata_di_carne',
                    'code'                          => 'CCAF',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 5,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 83, //incremental
                    'language_id'   => 1,
                    'name'          => 'Tris di Carne + Focaccia',
                    'description'   => 'Con Pancetta, Braciola, Salsiccia con contorno di patate o insalata'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 83, // incremental
                    'slug'                      => 'costata_di_carne-Normali',
                    'price'                     => 13.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 84
            DB::table('products')->insert(
                [
                    'slug'                          => 'tagliata_di_manzo',
                    'code'                          => 'TDMF',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 5,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 84, //incremental
                    'language_id'   => 1,
                    'name'          => 'Tagliata di Manzo + Focaccia',
                    'description'   => 'Con rucola e grana'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 84, // incremental
                    'slug'                      => 'tagliata_di_manzo-Normali',
                    'price'                     => 13.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 85
            DB::table('products')->insert(
                [
                    'slug'                          => 'braciola_di_maiale',
                    'code'                          => 'BRAM',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 5,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 85, //incremental
                    'language_id'   => 1,
                    'name'          => 'Braciola di Maiale',
                    'description'   => 'Con contorno di patate o insalata'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 85, // incremental
                    'slug'                      => 'braciola_di_maiale-Normali',
                    'price'                     => 13.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  _____          _   _     _
        // |  ___|  _ __  (_) | |_  | |_   _   _   _ __    ___
        // | |_    | '__| | | | __| | __| | | | | | '__|  / _ \
        // |  _|   | |    | | | |_  | |_  | |_| | | |    |  __/
        // |_|     |_|    |_|  \__|  \__|  \__,_| |_|     \___|

            //products.id => 86
            DB::table('products')->insert(
                [
                    'slug'                          => 'patate_fritte',
                    'code'                          => 'PATA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 6,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 86, //incremental
                    'language_id'   => 1,
                    'name'          => 'Patate fritte',
                    'description'   => 'Patate fritte'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 86, // incremental
                    'slug'                      => 'patate_fritte-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 87
            DB::table('products')->insert(
                [
                    'slug'                          => 'patate_wurstel_fritte',
                    'code'                          => 'PAWU',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 6,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 87, //incremental
                    'language_id'   => 1,
                    'name'          => 'Patate e wurstel fritti',
                    'description'   => 'Patate e wurstel fritti'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 87, // incremental
                    'slug'                      => 'patate_wurstel_fritte-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 88
            DB::table('products')->insert(
                [
                    'slug'                          => 'supli_di_riso',
                    'code'                          => 'SURI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 6,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 88, //incremental
                    'language_id'   => 1,
                    'name'          => 'Suplì di riso',
                    'description'   => 'Suplì di riso'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 88, // incremental
                    'slug'                      => 'supli_di_riso-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 89
            DB::table('products')->insert(
                [
                    'slug'                          => 'crocchette_di_patate',
                    'code'                          => 'COTA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 6,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 89, //incremental
                    'language_id'   => 1,
                    'name'          => 'Crocchette di patate',
                    'description'   => 'Crocchette di patate'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 89, // incremental
                    'slug'                      => 'crocchette_di_patate-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 90
            DB::table('products')->insert(
                [
                    'slug'                          => 'verdure_fritte_pastella',
                    'code'                          => 'VFPA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 6,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 90, //incremental
                    'language_id'   => 1,
                    'name'          => 'Verdure fritte in pastella',
                    'description'   => 'Verdure fritte in pastella'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 90, // incremental
                    'slug'                      => 'verdure_fritte_pastella-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  ___     ____                                     _
        // |_ _|   |  _ \    ___   ___   ___    ___   _ __  | |_
        //  | |    | | | |  / _ \ / __| / __|  / _ \ | '__| | __|
        //  | |    | |_| | |  __/ \__ \ \__ \ |  __/ | |    | |_
        // |___|   |____/   \___| |___/ |___/  \___| |_|     \__|

            //products.id => 91
            DB::table('products')->insert(
                [
                    'slug'                          => 'seadas',
                    'code'                          => 'SEAD',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 7,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 91, //incremental
                    'language_id'   => 1,
                    'name'          => 'Seadas',
                    'description'   => 'dolce tipico sardo servito con miele e zucchero'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 91, // incremental
                    'slug'                      => 'seadas-Normali',
                    'price'                     => 4.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 92
            DB::table('products')->insert(
                [
                    'slug'                          => 'tiramisu',
                    'code'                          => 'TIRA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 7,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 92, //incremental
                    'language_id'   => 1,
                    'name'          => 'Tiramisù',
                    'description'   => 'dolce della casa'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 92, // incremental
                    'slug'                      => 'tiramisu-Normali',
                    'price'                     => 3.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 93
            DB::table('products')->insert(
                [
                    'slug'                          => 'panna_cotta',
                    'code'                          => 'PANC',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 7,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 93, //incremental
                    'language_id'   => 1,
                    'name'          => 'Panna cotta',
                    'description'   => 'dolce della casa'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 93, // incremental
                    'slug'                      => 'panna_cotta-Normali',
                    'price'                     => 3.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 94
            DB::table('products')->insert(
                [
                    'slug'                          => 'pizza_morena',
                    'code'                          => 'MORE',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 7,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 94, //incremental
                    'language_id'   => 1,
                    'name'          => 'Pizza Morena',
                    'description'   => 'Nutella y Mozzarella'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 94, // incremental
                    'slug'                      => 'pizza_morena-Normali',
                    'price'                     => 5.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  _                ___                         _           _
        // | |       ___    |_ _|  _ __    ___    __ _  | |   __ _  | |_    ___
        // | |      / _ \    | |  | '_ \  / __|  / _` | | |  / _` | | __|  / _ \
        // | |___  |  __/    | |  | | | | \__ \ | (_| | | | | (_| | | |_  |  __/
        // |_____|  \___|   |___| |_| |_| |___/  \__,_| |_|  \__,_|  \__|  \___|

            //products.id => 95
            DB::table('products')->insert(
                [
                    'slug'                          => 'primavera',
                    'code'                          => 'PRIM',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 8,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 95, //incremental
                    'language_id'   => 1,
                    'name'          => 'Primavera',
                    'description'   => 'Insalata verde, Pomodoro, Mozzarella, Mais, Tonno y Olive'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 95, // incremental
                    'slug'                      => 'primavera-Normali',
                    'price'                     => 5.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 96
            DB::table('products')->insert(
                [
                    'slug'                          => 'caprese',
                    'code'                          => 'CAPR',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 8,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 96, //incremental
                    'language_id'   => 1,
                    'name'          => 'Caprese',
                    'description'   => 'Pomodoro, Mozzarella di Bufala, Basilico e focaccia olio, sale y origano'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 96, // incremental
                    'slug'                      => 'caprese-Normali',
                    'price'                     => 7.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 97
            DB::table('products')->insert(
                [
                    'slug'                          => 'fiore',
                    'code'                          => 'FIAO',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 8,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 97, //incremental
                    'language_id'   => 1,
                    'name'          => 'Fiore',
                    'description'   => 'Pomodoro, Mozzarella fior di latte, Basilico e focaccia olio, sale y origano'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 97, // incremental
                    'slug'                      => 'fiore-Normali',
                    'price'                     => 6.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  ____            _             _     _                     ___        ____
        // |  _ \    __ _  | |_    __ _  | |_  (_)  _ __     ___     ( _ )      / ___|
        // | |_) |  / _` | | __|  / _` | | __| | | | '_ \   / _ \    / _ \/\   | |
        // |  __/  | (_| | | |_  | (_| | | |_  | | | | | | |  __/   | (_>  <   | |___   _
        // |_|      \__,_|  \__|  \__,_|  \__| |_| |_| |_|  \___|    \___/\/    \____| (_)

            //products.id => 98
            DB::table('products')->insert(
                [
                    'slug'                          => 'porzione_patatine_fritte',
                    'code'                          => 'PPFR',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 9,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 98, //incremental
                    'language_id'   => 1,
                    'name'          => 'Porzione Patatine Fritte',
                    'description'   => 'Porzione Patatine Fritte'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 98, // incremental
                    'slug'                      => 'porzione_patatine_fritte-Normali',
                    'price'                     => 2.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 99
            DB::table('products')->insert(
                [
                    'slug'                          => 'porzione_patatine_fritte_wurstel',
                    'code'                          => 'PPFW',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 9,
                    'max_additionals'               => 4,
                    'additional_category_id'        => 1,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 99, //incremental
                    'language_id'   => 1,
                    'name'          => 'Porzione Patatine Fritte e Wurstel',
                    'description'   => 'Porzione Patatine Fritte e Wurstel'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 99, // incremental
                    'slug'                      => 'porzione_patatine_fritte_wurstel-Normali',
                    'price'                     => 3.50,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

        //  _                ____           _       _   _
        // | |       ___    | __ )    ___  | |__   (_) | |_    ___
        // | |      / _ \   |  _ \   / _ \ | '_ \  | | | __|  / _ \
        // | |___  |  __/   | |_) | |  __/ | |_) | | | | |_  |  __/
        // |_____|  \___|   |____/   \___| |_.__/  |_|  \__|  \___|

            //products.id => 100
            DB::table('products')->insert(
                [
                    'slug'                          => 'coca_cola',
                    'code'                          => 'COCA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 100, //incremental
                    'language_id'   => 1,
                    'name'          => 'Coca Cola',
                    'description'   => 'Coca Cola'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 100, // incremental
                    'slug'                      => 'coca_cola-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 101
            DB::table('products')->insert(
                [
                    'slug'                          => 'fanta',
                    'code'                          => 'FANT',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 101, //incremental
                    'language_id'   => 1,
                    'name'          => 'Fanta',
                    'description'   => 'Fanta'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 101, // incremental
                    'slug'                      => 'fanta-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 102
            DB::table('products')->insert(
                [
                    'slug'                          => 'sprite',
                    'code'                          => 'SPRI',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 102, //incremental
                    'language_id'   => 1,
                    'name'          => 'Sprite',
                    'description'   => 'Sprite'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 102, // incremental
                    'slug'                      => 'sprite-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 103
            DB::table('products')->insert(
                [
                    'slug'                          => 'chinotto',
                    'code'                          => 'CHIN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 103, //incremental
                    'language_id'   => 1,
                    'name'          => 'Chinotto',
                    'description'   => 'Chinotto'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 103, // incremental
                    'slug'                      => 'chinotto-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 104
            DB::table('products')->insert(
                [
                    'slug'                          => 'the_limone_ed_alla_pesca',
                    'code'                          => 'CHIN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 104, //incremental
                    'language_id'   => 1,
                    'name'          => 'The al limone ed alla pesca',
                    'description'   => 'The al limone ed alla pesca'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 104, // incremental
                    'slug'                      => 'the_limone_ed_alla_pesca-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 105
            DB::table('products')->insert(
                [
                    'slug'                          => 'red_bull',
                    'code'                          => 'REDB',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 105, //incremental
                    'language_id'   => 1,
                    'name'          => 'Red Bull',
                    'description'   => 'Red Bull'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 105, // incremental
                    'slug'                      => 'red_bull-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 106
            DB::table('products')->insert(
                [
                    'slug'                          => 'warsteiner_analcolica',
                    'code'                          => 'WANA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 106, //incremental
                    'language_id'   => 1,
                    'name'          => 'Warsteiner analcolica',
                    'description'   => 'Warsteiner analcolica'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 106, // incremental
                    'slug'                      => 'warsteiner_analcolica-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]

            ]);

        //  _                ____    _
        // | |       ___    | __ )  (_)  _ __   _ __    ___
        // | |      / _ \   |  _ \  | | | '__| | '__|  / _ \
        // | |___  |  __/   | |_) | | | | |    | |    |  __/
        // |_____|  \___|   |____/  |_| |_|    |_|     \___|

            //products.id => 107
            DB::table('products')->insert(
                [
                    'slug'                          => 'ichnusa',
                    'code'                          => 'ICHN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 107, //incremental
                    'language_id'   => 1,
                    'name'          => 'Ichnusa',
                    'description'   => 'Ichnusa'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 107, // incremental
                    'slug'                      => 'ichnusa-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]

            ]);//products.id => 108
            DB::table('products')->insert(
                [
                    'slug'                          => 'ichnusa_cruda',
                    'code'                          => 'ICHN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 108, //incremental
                    'language_id'   => 1,
                    'name'          => 'Ichnusa cruda',
                    'description'   => 'Ichnusa cruda'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 108, // incremental
                    'slug'                      => 'ichnusa_cruda-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 109
            DB::table('products')->insert(
                [
                    'slug'                          => 'becks',
                    'code'                          => 'ICHN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 109, //incremental
                    'language_id'   => 1,
                    'name'          => 'Beck’s',
                    'description'   => 'Beck’s'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 109, // incremental
                    'slug'                      => 'becks-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 110
            DB::table('products')->insert(
                [
                    'slug'                          => 'warsteiner',
                    'code'                          => 'ICHN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 110, //incremental
                    'language_id'   => 1,
                    'name'          => 'Warsteiner',
                    'description'   => 'Warsteiner'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 110, // incremental
                    'slug'                      => 'warsteiner-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 111
            DB::table('products')->insert(
                [
                    'slug'                          => 'heineken',
                    'code'                          => 'HEIN',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 111, //incremental
                    'language_id'   => 1,
                    'name'          => 'Heineken',
                    'description'   => 'Heineken'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 111, // incremental
                    'slug'                      => 'heineken-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 112
            DB::table('products')->insert(
                [
                    'slug'                          => 'forst',
                    'code'                          => 'FORS',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 112, //incremental
                    'language_id'   => 1,
                    'name'          => 'Forst',
                    'description'   => 'Forst'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 112, // incremental
                    'slug'                      => 'forst-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 113
            DB::table('products')->insert(
                [
                    'slug'                          => 'menabrea',
                    'code'                          => 'MENA',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 113, //incremental
                    'language_id'   => 1,
                    'name'          => 'Menabrea',
                    'description'   => 'Menabrea'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 113, // incremental
                    'slug'                      => 'menabrea-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 114
            DB::table('products')->insert(
                [
                    'slug'                          => 'forst_alla_spina',
                    'code'                          => 'FALS',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 114, //incremental
                    'language_id'   => 1,
                    'name'          => 'Forst alla Spina',
                    'description'   => 'Forst alla Spina'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 114, // incremental
                    'slug'                      => 'Forst alla Spina-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 115
            DB::table('products')->insert(
                [
                    'slug'                          => 'abaia_da_75ml',
                    'code'                          => 'FALS',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 115, //incremental
                    'language_id'   => 1,
                    'name'          => 'Abaia da 75ml',
                    'description'   => 'Abaia da 75ml'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 115, // incremental
                    'slug'                      => 'abaia_da_75ml-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);//products.id => 116
            DB::table('products')->insert(
                [
                    'slug'                          => 'grotta_rossa_da_75ml',
                    'code'                          => 'FALS',
                    'image'                         => '/storage/multimedia/menu_categorias_1.jpg',
                    'brand_id'                      => 1,
                    'product_subcategory_id'        => 10,
                    'max_additionals'               => 4,
                    'additional_category_id'        => null,
                    'product_feature_category_id'   => null
                ]
            );
            DB::table('product_translations')->insert(
                [
                    'product_id'    => 116, //incremental
                    'language_id'   => 1,
                    'description'   => 'Grotta Rossa da 75ml',
                    'name'          => 'Grotta Rossa da 75ml'
                ]
            );
            DB::table('product_presentations_products')->insert([
                [
                    'product_presentation_id'   => 1, // Giganti
                    'product_id'                => 116, // incremental
                    'slug'                      => 'grotta_rossa_da_75ml-Normali',
                    'price'                     => 0.00,
                    'iva'                       => 0.22,
                    'delivery'                  => 1  // boolean
                ]
            ]);

    }
}
