<?php

use Illuminate\Database\Seeder;

class StatusTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_translations')->insert([
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
        ]);

        //  ____                                                _
        // |  _ \    __ _   _ __    __ _      ___    _ __    __| |   ___   _ __     ___   ___
        // | |_) |  / _` | | '__|  / _` |    / _ \  | '__|  / _` |  / _ \ | '_ \   / _ \ / __|
        // |  __/  | (_| | | |    | (_| |   | (_) | | |    | (_| | |  __/ | | | | |  __/ \__ \
        // |_|      \__,_| |_|     \__,_|    \___/  |_|     \__,_|  \___| |_| |_|  \___| |___/
        //
        DB::table('status_translations')->insert([
            [
                'name'          => 'In attesa di Pagamento',
                'description'   => 'In attesa di Pagamento',
                'status_id'     => 3,
                'language_id'   => 1
            ],
            [
                'name'          => 'Consegnato',
                'description'   => 'Pagamento fatto',
                'status_id'     => 4,
                'language_id'   => 1
            ],
            [
                'name'          => 'Ordine annullato',
                'description'   => 'Ordine annullato',
                'status_id'     => 5,
                'language_id'   => 1
            ]
        ]);
    }
}
