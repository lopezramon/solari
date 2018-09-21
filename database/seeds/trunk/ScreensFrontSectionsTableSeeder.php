<?php

use Illuminate\Database\Seeder;

class ScreensFrontSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Home / front_sections*/
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 1,
                'front_section_id' => 4
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 1,
                'front_section_id' => 5
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 1,
                'front_section_id' => 7
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 1,
                'front_section_id' => 8
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 1,
                'front_section_id' => 9
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 1,
                'front_section_id' => 10
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 1,
                'front_section_id' => 24
            ]
        ]);
        /*General*/
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 7,
                'front_section_id' => 2
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 7,
                'front_section_id' => 3
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 7,
                'front_section_id' => 11
            ]
        ]);

        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 2,
                'front_section_id' => 4
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 3,
                'front_section_id' => 4
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 3,
                'front_section_id' => 12
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 4,
                'front_section_id' => 11
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 4,
                'front_section_id' => 13
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 5,
                'front_section_id' => 15
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 5,
                'front_section_id' => 16
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 6,
                'front_section_id' => 18
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 6,
                'front_section_id' => 19
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 6,
                'front_section_id' => 20
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 6,
                'front_section_id' => 21
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 7,
                'front_section_id' => 22
            ]
        ]);
        DB::table('screens_front_sections')->insert([
            [
                'screen_id' => 6,
                'front_section_id' => 26
            ]
        ]);

    }
}
