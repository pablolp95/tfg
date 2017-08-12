<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = new Role();
        $roleSuperAdmin -> name = 'superadmin';
        $roleSuperAdmin -> display_name = 'Super administrador';
        $roleSuperAdmin -> save();

        $roleAdmin = new Role();
        $roleAdmin -> name = 'admin';
        $roleAdmin -> display_name = 'Administrador';
        $roleAdmin -> save();

        $roleUser = new Role();
        $roleUser -> name = 'user';
        $roleUser -> display_name = 'Usuario';
        $roleUser -> save();
    }
}
