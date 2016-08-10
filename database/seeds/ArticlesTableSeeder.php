<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            [ 'title' => str_random(10),
                'body' => str_random(30),


            ],
            [ 'title' => str_random(10),
                'body' => str_random(30),

            ],
            [ 'title' => str_random(10),
                'body' => str_random(30),

            ],
            ['title' => str_random(10),
                'body' => str_random(30),
            ]

        ]);
    }
}
