    <?php

use Illuminate\Database\Seeder;

class BlogsTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            //   ____           _                                   _
            //  / ___|   __ _  | |_    ___    __ _    ___    _ __  (_)   ___   ___
            // | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | |  / _ \ / __|
            // | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | | |  __/ \__ \
            //  \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|    |_|  \___| |___/
            //                               |___/
            DB::table('blog_categories')->insert(['status_id'  => 1]); //blog_categories.id => 1
            DB::table('blog_category_translations')->insert(
                [
                    'blog_category_id' => 1, //incremental
                    'language_id'      => 1,
                    'name'             => 'Sports',
                    'description'      => 'Sports descriptions'
                ]
            );

            //  ____    _
            // | __ )  | |   ___     __ _   ___
            // |  _ \  | |  / _ \   / _` | / __|
            // | |_) | | | | (_) | | (_| | \__ \
            // |____/  |_|  \___/   \__, | |___/
            //                      |___/
            DB::table('blogs')->insert(['blog_category_id'  => 1, 'slug' => 'novo-blog', 'user_id' => 1, 'created_at' => '2018-08-16 03:10:00.000000', 'image' => 'granita-limone-menta-2.jpg']); //blogs.id => 1
            DB::table('blog_translations')->insert(
                [
                    'blog_id'       => 1, //incremental
                    'language_id'   => 1,
                    'title'         => 'Novo blog',
                    'subtitle'      => 'Sottotiololo del novo blog',
                    'description'   => 'Description del novo blog, description del novo blog, description del novo blog'
                ]
            );
    }
}
