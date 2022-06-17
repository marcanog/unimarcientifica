<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $comment_adminRole = Role::where('name', 'comment_admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'adrianafas13@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin1234')
        ]);
            
        $comment_admin = User::create([
            'name' => 'Comment Admin',
            'email' => 'comment@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('comment1234')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('user1234')
        ]);

        $admin->roles()->attach($adminRole);
        $comment_admin->roles()->attach($comment_adminRole);
        $user->roles()->attach($userRole);
    }
}
