<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'code'         => 'ACT' // 1
            ],
            [
                'code'         => 'INA' // 2
            ]
        ]);

        //  ____                                                _
        // |  _ \    __ _   _ __    __ _      ___    _ __    __| |   ___   _ __     ___   ___
        // | |_) |  / _` | | '__|  / _` |    / _ \  | '__|  / _` |  / _ \ | '_ \   / _ \ / __|
        // |  __/  | (_| | | |    | (_| |   | (_) | | |    | (_| | |  __/ | | | | |  __/ \__ \
        // |_|      \__,_| |_|     \__,_|    \___/  |_|     \__,_|  \___| |_| |_|  \___| |___/
        //
        DB::table('statuses')->insert([
            [ // In attesa di Pagamento
                'code'         => 'PPP' // 3
            ],
            [ // Consegnato
                'code'         => 'FAC' // 4
            ],
            [ // Ordine annullato
                'code'         => 'REV' // 5
            ]
        ]);
    }
}
