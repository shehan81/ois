<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create(array(
            'username' => 'admin',
            'email' => 'shehan.fdo.lk@gmail.com',
            'password' => Hash::make('qwe123')
        ));
    }
}
