<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ADM-1',
            'username' => 'admin1',
            'password' => bcrypt('admin1'),
            'email' => 'admin@admin',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'cust',
            'username' => 'cust',
            'password' => bcrypt('cust'),
            'email' => 'cust@cust',
            'role' => 'cust'
        ]);

        
    }
}
