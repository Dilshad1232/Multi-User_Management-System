<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $userRole  = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Create Admin User
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // ye email se search karega
            [
                'full_name'     => 'Dilshad Alam (Admin)',
                'father_name'   => 'Mohd Ansari',
                'mobile_no'     => '9793145874',
                'password'      => Hash::make('admin123'),
                'show_password' => 'admin123',
                'email'         => 'admin@gmail.com',  // SAME EMAIL
                'address'       => 'Kushinagar, Uttar Pradesh',
                'district'      => 'Kushinagar',
                'pin_code'      => '274305',
                'profile_photo' => 'admin.jpg',
            ]
        );

        $admin->assignRole('admin');


        // Assign admin role
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        echo "✔ Admin Created Successfully\n";
        echo "Email: admin@gmail.com\nPassword: admin123\n";
    }
}
