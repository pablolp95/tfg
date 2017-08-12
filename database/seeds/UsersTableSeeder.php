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
        $roleSuperAdmin = Role::where('name', 'superadmin')->first();
        $roleAdmin  = Role::where('name', 'admin')->first();
        $roleUser  = Role::where('name', 'user')->first();
        
        $superAdmin = new User();
        $superAdmin->name = 'SuperAdmin';
        $superAdmin->email = 'superadmin@gmail.com';
        $superAdmin->password = bcrypt('tfgpablo');
        $superAdmin->save();
        $superAdmin->roles()->attach($roleSuperAdmin);
    
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('tfgpablo');
        $admin->save();
        $admin->roles()->attach($roleAdmin);

        $user = new User();
        $user->name = 'Pablo';
        $user->email = 'pablo95lp@gmail.com';
        $user->password = bcrypt('tfgpablo');
        $user->default_workspace = '1';
        $user->save();
        $user->roles()->attach($roleUser);
    }
}
