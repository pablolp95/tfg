<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new \App\QuestionTypesModels\ShortText();
        $type->max_num_characters = '12';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = '¿Cuantos años tienes?';
        $question->description = 'Es solo por saberlo';
        $question->icon = 'text-width';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '0';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\LongText();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Háblame de ti';
        $question->description = 'Es solo por saberlo';
        $question->icon = 'text-height';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '1';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Declaration();
        $type->button_text = 'Continuar';
        $type->save();
        $question = new App\Question();
        $question->text = 'Esto solo acaba de empezar';
        $question->icon = 'pencil';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '2';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Dropdown();
        $type->required = '0';
        $type->save();
        $option = new \App\QuestionOption();
        $option->option_value = 'España';
        $option->position = '0';
        $type->options()->save($option);
        $option = new \App\QuestionOption();
        $option->option_value = 'Alemania';
        $option->position = '1';
        $type->options()->save($option);
        $question = new App\Question();
        $question->text = 'De qué pais eres';
        $question->icon = 'triangle-bottom';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '3';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Email();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Dejanos tu email';
        $question->description = 'Es para poder contactar contigo';
        $question->icon = 'envelope';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '4';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Date();
        $type->format = 'DD/MM/YYYY';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Cuando naciste';
        $question->icon = 'calendar';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '5';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Legal();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Texto legal muy importante';
        $question->description = 'Blablablabla';
        $question->icon = 'text-width';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '6';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Web();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Cuál es tu página web favorita';
        $question->icon = 'globe';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '7';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\MultipleChoice();
        $type->required = '0';
        $type->multiple = '0';
        $type->random = '0';
        $type->vertical = '0';
        $type->other = '0';
        $type->save();
        $option = new \App\QuestionOption();
        $option->option_value = 'Opción A';
        $option->position = '0';
        $type->options()->save($option);
        $option = new \App\QuestionOption();
        $option->option_value = 'Opción B';
        $option->position = '1';
        $type->options()->save($option);
        $question = new App\Question();
        $question->text = 'Selección única';
        $question->icon = 'check';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '8';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\MultipleChoice();
        $type->required = '0';
        $type->multiple = '1';
        $type->random = '0';
        $type->vertical = '0';
        $type->other = '0';
        $type->save();
        $option = new \App\QuestionOption();
        $option->option_value = 'Opción A';
        $option->position = '0';
        $type->options()->save($option);
        $option = new \App\QuestionOption();
        $option->option_value = 'Opción B';
        $option->position = '1';
        $type->options()->save($option);
        $question = new App\Question();
        $question->text = 'Selección múltiple';
        $question->icon = 'check';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '9';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\YesNo();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Si o no';
        $question->icon = 'text-width';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '10';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Rating();
        $type->range = '10';
        $type->shape = 'star';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Puntuanos';
        $question->icon = 'star';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '11';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Scale();
        $type->range_min = '0';
        $type->range_max = '10';
        $type->left_tag = 'Etiqueta izquierda';
        $type->right_tag = 'Etiqueta derecha';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'En que esacla estamos';
        $question->icon = 'transfer';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '12';
        $type->question()->save($question);

        $type = new \App\QuestionTypesModels\Number();
        $type->range_min = '0';
        $type->range_max = '10';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Cuantos años tienes';
        $question->icon = 'text-width';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '13';
        $type->question()->save($question);


    }
}
