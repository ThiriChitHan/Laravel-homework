<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function userdata(){
        $userdata =[
            [
                'id' => 1,
                'name' => 'John-',
                'email' => 'john@gmail.com',
            ],
            [
                'id' => 2,
                'name' => 'Zaw-',
                'email' => 'zaw@gmail.com',
            ],
            [
                'id' => 3,
                'name' => 'Thiri-',
                'email' => 'thiri@gmail.com',
            ],
            [
                'id' => '4',
                'name' => 'Mya-',
                'email' => 'mya@gmail.com',
            ],
            [
                'id' => 5 ,
                'name' => 'Myint-',
                'email' => 'myint@gmail.com',
            ],
        ];
        return view('categories.article', compact('userdata'));
    }
}
