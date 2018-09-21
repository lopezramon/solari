<?php

use Illuminate\Database\Seeder;

class EventsTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_categories')->insert([
            [
                'code'             => 'CU',
                'status_id'        => 1
            ],
            [
                'code'             => 'EP',
                'status_id'        => 1
            ],
        ]);
        DB::table('event_category_translations')->insert([
            [
                'name'              => 'Compleanno',
                'description'       => 'festa di compleanno',
                'event_category_id' => 1, // 1=>backoffice
                'language_id'       => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'name'              => 'Eventi Speciali',
                'description'       => 'Riunioni di Famiglia',
                'event_category_id' => 2, // 1=>backoffice
                'language_id'       => 1 // 1=>italiano, 2=>ingles
            ],
        ]);
    }
}
