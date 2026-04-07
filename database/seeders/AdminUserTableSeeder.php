<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'NIN Admin',
                'email' => 'admin@ninuk.com',
                'password' => bcrypt('nin@password'),
                'user_type' => User::USER_TYPE_SUPER_ADMIN,
                'created_by' => 1,
                'email_verified_at' => now()
            ],

        ];

        foreach ($admins as  $admin) {
            User::firstOrCreate([
                'email' => $admin['email'],
            ], $admin);
        }
    }
}
