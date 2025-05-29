<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $articledata =[
            [
                'name' => 'John-',
                'email' => 'john@gmail.com',
            ],
            [
                'name' => 'Zaw-',
                'email' => 'zaw@gmail.com',
            ],
            [
                'name' => 'Thiri-',
                'email' => 'thiri@gmail.com',
            ],
            [
                'name' => 'Mya-',
                'email' => 'mya@gmail.com',
            ],
            [
                'name' => 'Myint-',
                'email' => 'myint@gmail.com',
            ],
        ];

           foreach($articledata as $data)
      {
        Article::create($data);
      }
    }
}
