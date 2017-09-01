<?php

use Illuminate\Database\Seeder;
use App\Form;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = new Form();
        $form->name = 'Mi formulario';
        $form->workspace_id = '1';
        $form->last_update_user_id = '3';
        $form->save();

        $form = new Form();
        $form->name = 'Mi formulario 2';
        $form->workspace_id = '1';
        $form->last_update_user_id = '3';
        $form->save();
    }
}
