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
                'code' => 'delivery',
                'name' => 'Delivery'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 3,
                'code' => 'store',
                'name' => 'Store'
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
                'code' => 'about',
                'name' => 'Chi Siamo'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 6,
                'code' => 'contattaci',
                'name' => 'Contattaci'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 7,
                'code' => 'gene',
                'name' => 'Tag generali'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 8,
                'code' => 'myOrder',
                'name' => 'My Order'
            ]
        ]);
        DB::table('screens')->insert([
            [
                'id' => 9,
                'code' => 'blog',
                'name' => 'Blog'
            ]
        ]);
    }
}
