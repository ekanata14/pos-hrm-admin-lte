<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name_role' => 'admin'
        ]);
        
        DB::table('roles')->insert([
            'name_role' => 'user'
        ]);

        DB::table('categories')->insert([
            'name_category' => 'Makanan',
        ]);

        DB::table('categories')->insert([
            'name_category' => 'Minuman',
        ]);

        DB::table('categories')->insert([
            'name_category' => 'Pakaian',
        ]);

        DB::table('categories')->insert([
            'name_category' => 'Alat Sholat',
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@hrmsanur.my.id',
            'id_role' => 1,
            'password' => bcrypt('admin'),
            'address' => "Denpasar",
            'phone_number' => '081236573953'
        ]);
        
        // DB::table('users')->insert([
        //     'username' => 'ekanata',
        //     'name' => 'Eka Nata',
        //     'email' => 'ekanata@gmail.com',
        //     'id_role' => 1,
        //     'password' => bcrypt('ekanata'),
        //     'address' => "Denpasar",
        //     'phone_number' => '081236573953'
        // ]);
    }
}
