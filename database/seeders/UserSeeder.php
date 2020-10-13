<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('users')->truncate();


        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => '2019-07-02 00:00:00',
            'isAdmin' => 1,
            'avatar' => 'default.jpg'
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'email_verified_at' => '2019-07-02 00:00:00',
            'isAdmin' => 0,
            'avatar' => 'default.jpg'
        ]);

    }
}
