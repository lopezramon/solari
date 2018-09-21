<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusesTableSeeder::class,
            LanguagesTableSeeder::class,
            ScreensTableSeeder::class,
            StatusTranslationsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            FrontSectionsTableSeeder::class,
            ScreensFrontSectionsTableSeeder::class,
            TagTranslationsTableSeeder::class,
            RequestsTableSeeder::class,

            // Product
            // ProductsTableSeeder::class,

            // Room
            RoomsTableSeeder::class,
        ]);
    }
}
