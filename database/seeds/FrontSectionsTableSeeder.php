<?php

use Illuminate\Database\Seeder;

class FrontSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('front_sections')->insert([
            [
                'id' => 1,
                'code' => 'BACK',
                'name' => 'Back Office'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 2,
                'code' => 'head',
                'name' => 'Header'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 3,
                'code' => 'foot',
                'name' => 'Footer'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 4,
                'code' => 'catalogo',
                'name' => 'Catalogo'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 5,
                'code' => 'news',
                'name' => 'Newsletter'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 6,
                'code' => 'proStore',
                'name' => 'Products in the store'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 7,
                'code' => 'nostra',
                'name' => 'La Nostra Galleria'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 8,
                'code' => 'nostra',
                'name' => 'La Nostra Galleria'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 9,
                'code' => 'canale',
                'name' => 'Canale'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 10,
                'code' => 'gene',
                'name' => 'General'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 11,
                'code' => 'catering',
                'name' => 'Catering'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 12,
                'code' => 'message',
                'name' => 'Massaggio'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 13,
                'code' => 'event',
                'name' => 'Eventi'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 14,
                'code' => 'deliServ',
                'name' => 'Servizi di consegna'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 15,
                'code' => 'nostraV',
                'name' => 'La Nostra Visione'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 16,
                'code' => 'lazienda',
                'name' => 'L Azienda'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 17,
                'code' => 'vieni',
                'name' => 'Vieni'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 18,
                'code' => 'contattaci',
                'name' => 'Contattaci'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 19,
                'code' => 'numCont',
                'name' => 'Numeri Di Contatto'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 20,
                'code' => 'inviaci',
                'name' => 'Inviaci una mail'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 21,
                'code' => 'nostraP',
                'name' => 'La Nostra Posizione'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 22,
                'code' => 'billAddres',
                'name' => 'Indirizzo di Fatturazione'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 23,
                'code' => 'order',
                'name' => 'Order'
            ]
        ]);
        DB::table('front_sections')->insert([
        [
                'id' => 24,
                'code' => 'blog',
                'name' => 'Blog'
        ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 25,
                'code' => 'traslate',
                'name' => 'Traslate'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 26,
                'code' => 'contatto',
                'name' => 'Contatto'
            ]
        ]);
        DB::table('front_sections')->insert([
            [
                'id' => 27,
                'code' => 'text',
                'name' => 'Testo'
            ]
        ]);
    }
}
