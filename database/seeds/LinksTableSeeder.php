<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
            // $this->call(UsersTableSeeder::class);

    {
        $data=[
        [
                'link_name' => '雅虎',
                'link_title' => '台灣最小入口網站',
                'link_url' => 'http://www.yahoo.com.tw',
                'link_order' => 1,

        ],
        [
            'link_name' => '估狗',
            'link_title' => '台灣第二小入口網站',
            'link_url' => 'http://www.google.com',
            'link_order' => 2,

        ]
        ];
        DB::table('links')->insert($data);
    }
}
