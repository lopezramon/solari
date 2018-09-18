<?php

use Illuminate\Database\Seeder;

class BlogTagsSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_translations')->insert([
            [
                'tag'              => 'back_blogs_title',
                'value'            => 'Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_blog_categories_title',
                'value'            => 'Categorie Blog',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles
            ]
        ]);
    }
}
