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
       $users =[
        [
            'name' => 'John Smith',
            'email' => 'johnsmith@gmail.com',
            'address' => 'Kyaukse',
             'phone' => '09-917-323-435',
             'gender' => 'Male',
             'password' => 'password',
             'status' => ' 1',
        ],
         [
            'name' => 'Michael Johnson',
            'email' => 'michaeljohnson@gmail.com',
            'address' => 'USA',
             'phone' => '09-917-323-435',
             'gender' => 'Male',
             'password' => 'password',
             'status' => ' 1',
        ],
         [
            'name' => 'Emily Davis',
            'email' => 'emilydavis@gmail.com',
            'address' => 'USA',
             'phone' => '09-917-323-435',
             'gender' => 'Female',
             'password' => 'password',
             'status' => ' 1',
        ],
         [
            'name' => 'David Wilson',
            'email' => 'davidwilson@gmail.com',
            'address' => 'Mandalay',
             'phone' => '09-917-323-435',
             'gender' => 'Male',
             'password' => 'password',
             'status' => ' 1',
        ],
         [
            'name' => 'Sarah Martinez',
            'email' => 'sarahmartinez@gmail.com',
            'address' => 'Yangon',
             'phone' => '09-917-323-435',
             'gender' => 'Female',
             'password' => 'password',
             'status' => ' 1',
        ],
        ];
        
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
