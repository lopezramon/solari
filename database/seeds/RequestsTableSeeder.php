<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//id => 1
    	DB::table('request_categories')->insert([
        [
          'code' => 'Null',
          'status_id' => 1
        ],
     	]);
     	DB::table('request_category_translations')->insert([
        [
          'name' => 'Compleanno',
          'description' => 'Compleanno',
          'request_category_id' => 1, //Incremental
	        'language_id' => 1
        ],
     	]);//id => 2
    	DB::table('request_categories')->insert([
        [
          'code' => 'Null',
          'status_id' => 1
        ],
     	]);
     	DB::table('request_category_translations')->insert([
        [
          'name' => 'evento privato',
          'description' => 'evento privato',
          'request_category_id' => 2, //Incremental
	        'language_id' => 1
        ],
     	]);
    }
}
