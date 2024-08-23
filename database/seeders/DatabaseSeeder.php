<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoadmapContentSeeder::class);
        $this->call(CompanySeeder::class);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'mentor']);
        Role::create(['name' => 'user']);



          User::factory(10)->create()->each(function ($user) {

             $user->assignRole('user');

        });

         User::factory(10)->create()->each(function ($user) {
             $user->assignRole('admin');

         });
        $user =User::create([

            'name' => 'Admin',
            'email' => 'a@a.a',
            'phone'=>'123456789',
            'password' => Hash::make('a'),
        ]);
        $user->assignRole('admin');

        $user->assignRole('mentor');
        $user->assignRole('user');

              $user =User::create([

            'name' => 'ihab',
            'email' => 'ihab@a.a',
            'phone'=>'111222333',
            'password' => Hash::make('a'),
        ]);
        $user->assignRole('admin');

        $user->assignRole('mentor');
        $user->assignRole('user');

              $user =User::create([

            'name' => 'nabil',
            'email' => 'nabil@a.a',
            'phone'=>'444555666',
            'password' => Hash::make('a'),
        ]);
        $user->assignRole('admin');

        $user->assignRole('mentor');
        $user->assignRole('user');


          $user =User::create([

            'name' => 'Super Admin',
            'email' => 'SuperAdmin@gmail.com',
            'phone'=>'010123456789',
            'password' => Hash::make('A2padffdssword#'),
        ]);
        $user->assignRole('admin');

                $user =User::create([

            'name' => 'Normal User',
            'email' => 'User@gmail.com',
            'phone'=>'010147258369',
            'password' => Hash::make('A2padffdssword#'),
        ]);
        $user->assignRole('user');


    }
}
