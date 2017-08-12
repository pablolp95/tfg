<?php

use Illuminate\Database\Seeder;
use App\Workspace;

class WorkspacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workspace = new Workspace();
        $workspace->name = 'My workspace';
        $workspace->user_id = '3';
        $workspace->last_update_user_id = '3';
        $workspace->save();

    }
}
