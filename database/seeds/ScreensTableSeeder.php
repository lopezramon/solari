<?php

use Illuminate\Database\Seeder;

class ScreensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('screens')->insert([
            [
                'id' => 1,
                'code' => 'home',
                'name' => 'Home'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 2,
                'code' => 'menu',
                'name' => 'Menu'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 3,
                'code' => 'chiSiamo',
                'name' => 'Chi Siamo'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 4,
                'code' => 'services',
                'name' => 'Servizi'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 5,
                'code' => 'contact',
                'name' => 'Contattaci'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 6,
                'code' => 'orders',
                'name' => 'Orders'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 7,
                'code' => 'gene',
                'name' => 'Tag generali'
            ]
        ]);
    }
}
