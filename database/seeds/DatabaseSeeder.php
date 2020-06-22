<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);


        $vader = DB::table('users')->insert([
            'name'       => 'admin',
            'role'       => '1',
            'email'      => 'admin@mail.ru',
            'password'   => Hash::make('admin'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
        
    }





}
