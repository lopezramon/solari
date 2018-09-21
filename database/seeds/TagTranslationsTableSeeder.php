<?php

use Illuminate\Database\Seeder;

class TagTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * 88888888888                                 .d8888b.                                              888
         *     888                                    d88P  Y88b                                             888
         *     888                                    888    888                                             888
         *     888      8888b.   .d88b.  .d8888b      888         .d88b.  88888b.   .d88b.  888d888  8888b.  888 .d8888b
         *     888         "88b d88P"88b 88K          888  88888 d8P  Y8b 888 "88b d8P  Y8b 888P"       "88b 888 88K
         *     888     .d888888 888  888 "Y8888b.     888    888 88888888 888  888 88888888 888     .d888888 888 "Y8888b.
         *     888     888  888 Y88b 888      X88     Y88b  d88P Y8b.     888  888 Y8b.     888     888  888 888      X88
         *     888     "Y888888  "Y88888  88888P'      "Y8888P88  "Y8888  888  888  "Y8888  888     "Y888888 888  88888P'
         *                           888
         *                      Y8b d88P
         *                       "Y88P"
         */
        DB::table('tag_translations')->insert([
            [
                'tag'              => 'general_create',
                'value'            => 'Creare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_edit',
                'value'            => 'Modificare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_show',
                'value'            => 'Mostrare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_home',
                'value'            => 'Home',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_addnew',
                'value'            => 'Aggiungere nuova',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_continue',
                'value'            => 'Continua',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_save',
                'value'            => 'Salvare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_cancel',
                'value'            => 'Annulla',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_close',
                'value'            => 'Vicinoicino',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_back',
                'value'            => 'Indietro',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_reset',
                'value'            => 'Reset',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_language',
                'value'            => 'Linguaggio',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_name',
                'value'            => 'Nome',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_description',
                'value'            => 'Descrizione',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_title',
                'value'            => 'Titolo',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_subtitle',
                'value'            => 'Sottotitolo',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_code',
                'value'            => 'Cod',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_select',
                'value'            => 'Seleziona un\'opzione',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_status',
                'value'            => 'Stato',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_index',
                'value'            => 'Listato',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_id',
                'value'            => 'ID',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_action',
                'value'            => 'Azione',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'general_tax',
                'value'            => 'IVA',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'general_subtotal',
                'value'            => 'Totale Parziale',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_total',
                'value'            => 'Totale',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'general_datein',
                'value'            => 'Data di Inizio',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'general_dateout',
                'value'            => 'Data di Fine',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'general_search',
                'value'            => 'Ricerca',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_email',
                'value'            => 'e-mail',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_container',
                'value'            => 'Contenitore',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_yes',
                'value'            => 'Sì',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_no',
                'value'            => 'No',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'general_phone',
                'value'            => 'Telefono',
                'front_section_id' => 1,
                'language_id'      => 1
            ]
        ]);

        /*
         *  .d8888b.  888             888
         * d88P  Y88b 888             888
         * Y88b.      888             888
         *  "Y888b.   888888  8888b.  888888 888  888 .d8888b
         *     "Y88b. 888        "88b 888    888  888 88K
         *       "888 888    .d888888 888    888  888 "Y8888b.
         * Y88b  d88P Y88b.  888  888 Y88b.  Y88b 888      X88
         *  "Y8888P"   "Y888 "Y888888  "Y888  "Y88888  88888P'
         */
/*        DB::table('tag_translations')->insert([
            [
                'name'          => 'Attivo',
                'description'   => 'Elemento attivo',
                'status_id'     => 1,
                'language_id'   => 1
            ],
            [
                'name'          => 'Inattivo',
                'description'   => 'Elemento inattivo',
                'status_id'     => 2,
                'language_id'   => 1
            ]
        ]);*/

        /*
         * 888b     d888
         * 8888b   d8888
         * 88888b.d88888
         * 888Y88888P888  .d88b.  88888b.  888  888
         * 888 Y888P 888 d8P  Y8b 888 "88b 888  888
         * 888  Y8P  888 88888888 888  888 888  888
         * 888   "   888 Y8b.     888  888 Y88b 888
         * 888       888  "Y8888  888  888  "Y88888
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             */
            [
                'tag'              => 'back_menu_blogs',
                'value'            => 'Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_blogs_blog_category',
                'value'            => 'Categorie Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_blogs_blog',
                'value'            => 'Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_activities',
                'value'            => 'Attività',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_activities_activity_category',
                'value'            => 'Categorie di attività',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_activities_activity',
                'value'            => 'Attività',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products',
                'value'            => 'Prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product_category',
                'value'            => 'Categorie di Prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product_subcategory',
                'value'            => 'Sottocategorie di prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_brand',
                'value'            => 'Marche',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product',
                'value'            => 'Prodotti',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product_presentation',
                'value'            => 'Presentazioni di prodotti',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_order',
                'value'            => 'Ordini',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_order_detail',
                'value'            => 'Dettagli ordine',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_additional_category',
                'value'            => 'Altre categorie',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_rooms',
                'value'            => 'Camera',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_rooms_room_category',
                'value'            => 'Categorie di stanze',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_rooms_room',
                'value'            => 'Camere',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_room_room_season',
                'value'            => 'Stagione delle stanze',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_services',
                'value'            => 'Servizio',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_services_category',
                'value'            => 'Categorie di servizio',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_services_service',
                'value'            => 'Servizi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_events',
                'value'            => 'Evento',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_events_event_category',
                'value'            => 'Categorie di eventi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_events_event',
                'value'            => 'Eventi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_bookings',
                'value'            => 'Prenotazioni',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_bookings_booking',
                'value'            => 'Prenotazioni',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_bookings_booking_detail',
                'value'            => 'Dettagli della prenotazione',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils',
                'value'            => 'Utils',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_multimedia',
                'value'            => 'Multimedia',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_seo',
                'value'            => 'Seos',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_tag_translation',
                'value'            => 'Tag traduzioni',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_client_request',
                'value'            => 'Richieste client',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_newsletter',
                'value'            => 'Utenti della newsletter',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_role',
                'value'            => 'Ruoli',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * INGLES
             */
            [
                'tag'              => 'back_menu_blogs',
                'value'            => 'Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_blogs_blog_category',
                'value'            => 'Blog Categories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_blogs_blog',
                'value'            => 'Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_activities',
                'value'            => 'Activity',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_activities_activity_category',
                'value'            => 'Activity Categories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_activities_activity',
                'value'            => 'Activities',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products',
                'value'            => 'Product',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product_category',
                'value'            => 'Product Categories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product_subcategory',
                'value'            => 'Product Subcategories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_brand',
                'value'            => 'Brands',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product',
                'value'            => 'Products',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_product_presentation',
                'value'            => 'Product Presentations',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_order',
                'value'            => 'Orders',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_order_detail',
                'value'            => 'Order Details',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_products_additional_category',
                'value'            => 'Additional Categories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_rooms',
                'value'            => 'Room',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_rooms_room_category',
                'value'            => 'Room Categories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_rooms_room',
                'value'            => 'Rooms',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_room_room_season',
                'value'            => 'Room Seasons',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_services',
                'value'            => 'Service',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_services_category',
                'value'            => 'Service Categories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_services_service',
                'value'            => 'Services',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_events',
                'value'            => 'Event',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_events_event_category',
                'value'            => 'Event Categories',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_events_event',
                'value'            => 'Events',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_bookings',
                'value'            => 'Bookings',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_bookings_booking',
                'value'            => 'Bookings',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_bookings_booking_detail',
                'value'            => 'Booking Details',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils',
                'value'            => 'Utils',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_multimedia',
                'value'            => 'Multimedia',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_seo',
                'value'            => 'Seos',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_tag_translation',
                'value'            => 'Tag Translations',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_utils_client_request',
                'value'            => 'Client Requests',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_newsletter',
                'value'            => 'Newsletter Users',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            [
                'tag'              => 'back_menu_role',
                'value'            => 'Roles',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 2  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         *        d8888          888    d8b          d8b 888    d8b
         *       d88888          888    Y8P          Y8P 888    Y8P
         *      d88P888          888                     888
         *     d88P 888  .d8888b 888888 888 888  888 888 888888 888  .d88b.  .d8888b
         *    d88P  888 d88P"    888    888 888  888 888 888    888 d8P  Y8b 88K
         *   d88P   888 888      888    888 Y88  88P 888 888    888 88888888 "Y8888b.
         *  d8888888888 Y88b.    Y88b.  888  Y8bd8P  888 Y88b.  888 Y8b.          X88
         * d88P     888  "Y8888P  "Y888 888   Y88P   888  "Y888 888  "Y8888   88888P'
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Activities
             */
            [
                'tag'              => 'back_module_activities_activity_title',
                'value'            => 'Attività',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Activity Categories
             */
            [
                'tag'              => 'back_module_activities_activity_category_title',
                'value'            => 'Categorie di attività',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         * 888888b.   888
         * 888  "88b  888
         * 888  .88P  888
         * 8888888K.  888  .d88b.   .d88b.  .d8888b
         * 888  "Y88b 888 d88""88b d88P"88b 88K
         * 888    888 888 888  888 888  888 "Y8888b.
         * 888   d88P 888 Y88..88P Y88b 888      X88
         * 8888888P"  888  "Y88P"   "Y88888  88888P'
         *                              888
         *                         Y8b d88P
         *                          "Y88P"
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Blog Categories
             */
            [
                'tag'              => 'back_module_blogs_blog_category_title',
                'value'            => 'Categoria blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Blog Comments
             */
            [
                'tag'              => 'back_module_blogs_blog_comment_title',
                'value'            => 'Commento del blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Blogs
             */
            [
                'tag'              => 'back_module_blogs_blog_title',
                'value'            => 'Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         * 888888b.                     888      d8b
         * 888  "88b                    888      Y8P
         * 888  .88P                    888
         * 8888888K.   .d88b.   .d88b.  888  888 888 88888b.   .d88b.  .d8888b
         * 888  "Y88b d88""88b d88""88b 888 .88P 888 888 "88b d88P"88b 88K
         * 888    888 888  888 888  888 888888K  888 888  888 888  888 "Y8888b.
         * 888   d88P Y88..88P Y88..88P 888 "88b 888 888  888 Y88b 888      X88
         * 8888888P"   "Y88P"   "Y88P"  888  888 888 888  888  "Y88888  88888P'
         *                                                         888
         *                                                    Y8b d88P
         *                                                     "Y88P"
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Booking Details
             */
            [
                'tag'              => 'back_module_bookings_boking_detail_title',
                'value'            => 'Dettagli della prenotazione',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Bookings
             */
            [
                'tag'              => 'back_module_bookings_boking_title',
                'value'            => 'Prenotazioni',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         * 888     888 888    d8b 888
         * 888     888 888    Y8P 888
         * 888     888 888        888
         * 888     888 888888 888 888 .d8888b
         * 888     888 888    888 888 88K
         * 888     888 888    888 888 "Y8888b.
         * Y88b. .d88P Y88b.  888 888      X88
         *  "Y88888P"   "Y888 888 888  88888P'
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Client Requests
             */
            [
                'tag'              => 'back_module_utils_client_request_title',
                'value'            => 'Richieste client',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * ITALIANO
             *
             * Requests Category
             */
            [
                'tag'              => 'back_module_utils_request_category_title',
                'value'            => 'Categorie di richieste',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Multimedia
             */
            [
                'tag'              => 'back_module_utils_multimedia_title',
                'value'            => 'Multimedia',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Seo
             */
            [
                'tag'              => 'back_module_utils_seo_title',
                'value'            => 'Seos',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Tag Translation
             */
            [
                'tag'              => 'back_module_utils_tag_translation_title',
                'value'            => 'Tag traduzione',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Newsletter Users
             */
            [
                'tag'              => 'back_module_utils_newsletter_title',
                'value'            => 'Newsletter',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         * 8888888888                            888
         * 888                                   888
         * 888                                   888
         * 8888888    888  888  .d88b.  88888b.  888888 .d8888b
         * 888        888  888 d8P  Y8b 888 "88b 888    88K
         * 888        Y88  88P 88888888 888  888 888    "Y8888b.
         * 888         Y8bd8P  Y8b.     888  888 Y88b.       X88
         * 8888888888   Y88P    "Y8888  888  888  "Y888  88888P'
        */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Event Categories
             */
            [
                'tag'              => 'back_module_events_event_category_title',
                'value'            => 'Categorie di eventi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Events
             */
            [
                'tag'              => 'back_module_events_event_title',
                'value'            => 'Eventi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         * 8888888b.                        888                   888
         * 888   Y88b                       888                   888
         * 888    888                       888                   888
         * 888   d88P 888d888  .d88b.   .d88888 888  888  .d8888b 888888 .d8888b
         * 8888888P"  888P"   d88""88b d88" 888 888  888 d88P"    888    88K
         * 888        888     888  888 888  888 888  888 888      888    "Y8888b.
         * 888        888     Y88..88P Y88b 888 Y88b 888 Y88b.    Y88b.       X88
         * 888        888      "Y88P"   "Y88888  "Y88888  "Y8888P  "Y888  88888P'
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Additional Categories
             */
            [
                'tag'              => 'back_module_products_additional_category_title',
                'value'            => 'Categoria aggiuntiva',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Brands
             */
            [
                'tag'              => 'back_module_products_brand_title',
                'value'            => 'Marche',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Order Details
             */
            [
                'tag'              => 'back_module_products_order_detail_title',
                'value'            => 'Dettagli ordine',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Orders
             */
            [
                'tag'              => 'back_module_products_order_title',
                'value'            => 'Ordini',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Product Categories
             */
            [
                'tag'              => 'back_module_products_product_category_title',
                'value'            => 'Categorie di Prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Product Presentation Products
             */
            [
                'tag'              => 'back_module_products_product_presentation_product_title',
                'value'            => 'Prodotti di presentazione del prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Product Presentation
             */
            [
                'tag'              => 'back_module_products_product_presentation_title',
                'value'            => 'Presentazione del prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Product Subcategories
             */
            [
                'tag'              => 'back_module_products_product_subcategory_title',
                'value'            => 'Sottocategorie di prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Products
             */
            [
                'tag'              => 'back_module_products_product_title',
                'value'            => 'Prodotti',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         * 8888888b.
         * 888   Y88b
         * 888    888
         * 888   d88P  .d88b.   .d88b.  88888b.d88b.  .d8888b
         * 8888888P"  d88""88b d88""88b 888 "888 "88b 88K
         * 888 T88b   888  888 888  888 888  888  888 "Y8888b.
         * 888  T88b  Y88..88P Y88..88P 888  888  888      X88
         * 888   T88b  "Y88P"   "Y88P"  888  888  888  88888P'
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Room Categories
             */
            [
                'tag'              => 'back_module_rooms_room_category_title',
                'value'            => 'Categorie di stanze',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Room Seasons
             */
            [
                'tag'              => 'back_module_rooms_room_season_title',
                'value'            => 'Stagione della stanza',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Rooms
             */
            [
                'tag'              => 'back_module_rooms_room_title',
                'value'            => 'Camere',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         *  .d8888b.                            d8b
         * d88P  Y88b                           Y8P
         * Y88b.
         *  "Y888b.    .d88b.  888d888 888  888 888  .d8888b  .d88b.  .d8888b
         *     "Y88b. d8P  Y8b 888P"   888  888 888 d88P"    d8P  Y8b 88K
         *       "888 88888888 888     Y88  88P 888 888      88888888 "Y8888b.
         * Y88b  d88P Y8b.     888      Y8bd8P  888 Y88b.    Y8b.          X88
         *  "Y8888P"   "Y8888  888       Y88P   888  "Y8888P  "Y8888   88888P'
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Service Categories
             */
            [
                'tag'              => 'back_module_services_service_category_title',
                'value'            => 'Categorie di servizio',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Services
             */
            [
                'tag'              => 'back_module_services_service_title',
                'value'            => 'Servizi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);

        /*
         * 888     888
         * 888     888
         * 888     888
         * 888     888 .d8888b   .d88b.  888d888 .d8888b
         * 888     888 88K      d8P  Y8b 888P"   88K
         * 888     888 "Y8888b. 88888888 888     "Y8888b.
         * Y88b. .d88P      X88 Y8b.     888          X88
         *  "Y88888P"   88888P'  "Y8888  888      88888P'
         */
        DB::table('tag_translations')->insert([
            /**
             * ITALIANO
             *
             * Permission Roles
             */
            [
                'tag'              => 'back_module_users_permission_role_title',
                'value'            => 'Ruoli di autorizzazione',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Permission Users
             */
            [
                'tag'              => 'back_module_users_permission_user_title',
                'value'            => 'Utenti autorizzati',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Permissions
             */
            [
                'tag'              => 'back_module_users_permission_title',
                'value'            => 'Permessi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Role Users
             */
            [
                'tag'              => 'back_module_users_role_user_title',
                'value'            => 'Utenti di ruolo',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Roles
             */
            [
                'tag'              => 'back_module_users_role_title',
                'value'            => 'Ruoli',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * User Addresses
             */
            [
                'tag'              => 'back_module_users_user_addresses_title',
                'value'            => 'Indirizzi degli utenti',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ],
            /**
             * Users
             */
            [
                'tag'              => 'back_module_users_user_title',
                'value'            => 'Utenti',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles, 3=>Español
            ]
        ]);
    }
}
