<?php

use Illuminate\Database\Seeder;

class CatPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create Category dummy data
         */
        $category = [
        	[ 'category' => 'News', 'created_at' => new DateTime(), 'updated_at' => new DateTime() ],
          [ 'category' => 'Popular', 'created_at' => new DateTime(), 'updated_at' => new DateTime() ],
          [	'category' => 'Breaking News', 'created_at' => new DateTime(), 'updated_at' => new DateTime() ]
        ];
        DB::table('categories')->insert($category);

        /**
         * Create Post dummy data
         * 10 Rows
         */
        $post = [];
        foreach (range(1,10) as $index) {
          $post[] = [
            'user_id' => rand(1,2),
            'category_id' => rand(1,3),
            'date' => new DateTime(),
            'title' => 'Title of Post ' . rand(1,10),
            'body' => 'Lorem ipsum dolor sit amet,
                       consectetuer adipiscing elit.
                       Aenean commodo ligula eget dolor.
                       Aenean massa.
                       Cum sociis natoque penatibus et magnis dis parturient montes,
                       nascetur ridiculus mus.',
            'image' => 'image/featured_image/900x300.png',
            'status' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
          ];
        }
        DB::table('posts')->insert($post);

    }
}
