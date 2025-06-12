<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $admin = User::create([
        
            'name' => 'John Smith',
            'email' => 'johnsmith@gmail.com',
            'address' => 'Kyaukse',
             'phone' => '09-917-323-435',
             'gender' => 'Male',
             'password' => 'password',
             'status' => ' 1',

         ]);
         $client = User::create([

            'name' => 'Michael Johnson',
            'email' => 'michaeljohnson@gmail.com',
            'address' => 'USA',
             'phone' => '09-917-323-435',
             'gender' => 'Male',
             'password' => 'password',
             'status' => ' 1',  
    ]);
        
        
        // foreach ($users as $user) {
        //     User::create($user);
        // }

        $admin->assignRole('admin');
        $client->assignRole('client');
    }
}
