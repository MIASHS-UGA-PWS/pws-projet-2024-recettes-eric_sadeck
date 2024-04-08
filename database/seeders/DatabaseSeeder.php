<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
        ]);

// Create 5 recipes with admin
$adminUser = \App\Models\User::where('email', 'admin@admin.com')->first();
$user = \App\Models\User::where('email', 'test@test.com')->first();

\App\Models\Recipe::factory()
    ->count(5)
    ->for($adminUser)
    ->create();

//Create 3 recipes with a user
\App\Models\Recipe::factory()
    ->count(3)
    ->for($user)
    ->create();

// Create 2 recipes with another user
\App\Models\Recipe::factory()
    ->count(2)
    ->for(\App\Models\User::factory()->create())
    ->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

// Create 2 roles
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

// Create role_user table data
    $adminRole = \App\Models\Role::where('name', 'admin')->first(); // get the admin role
    $userRole = \App\Models\Role::where('name', 'user')->first(); // get the user role

    $users = \App\Models\User::all(); // get all users

    foreach ($users as $user) {

        if ($user->name === 'admin') {
            $user->roles()->attach($adminRole->id); // assign admin role to admin user
        } else {
            $user->roles()->attach($userRole->id); // assign user role to all other users
        }
    }

    }
}
