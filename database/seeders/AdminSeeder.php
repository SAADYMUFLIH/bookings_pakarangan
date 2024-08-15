<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin Role if not exists
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
            'guard_name' => 'web',
        ]);

        // Create Super Admin User
        User::updateOrCreate(
            ['email' => 'admin@pakarangan.com'],
            [
                'name' => 'AdminPakarangan',
                'email' => 'admin@pakarangan.com',
                'password' => Hash::make('pakarangan123'), // Ganti dengan password yang diinginkan
            ]
        )->roles()->sync([$superAdminRole->id]);
    }
}
