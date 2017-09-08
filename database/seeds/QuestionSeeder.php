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
        $type = new \App\Models\QuestionTypes\ShortText();
        $type->max_num_characters = '12';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = '¿Cual es tu nombre?';
        $question->description = 'Es solo por saberlo';
        $question->icon = 'text-width';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '0';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\LongText();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Háblame de ti';
        $question->description = 'A qúe te dedicas,...';
        $question->icon = 'text-height';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '1';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\Declaration();
        $type->save();
        $question = new App\Question();
        $question->text = 'Esto solo acaba de empezar';
        $question->icon = 'pencil';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '2';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\Dropdown();
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

        $type = new \App\Models\QuestionTypes\Email();
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

        $type = new \App\Models\QuestionTypes\Date();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Cuando naciste';
        $question->icon = 'calendar';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '5';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\Legal();
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

        $type = new \App\Models\QuestionTypes\Web();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Cuál es tu página web favorita';
        $question->icon = 'globe';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '7';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\MultipleChoice();
        $type->required = '0';
        $type->multiple = '0';
        $type->random = '0';
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

        $type = new \App\Models\QuestionTypes\MultipleChoice();
        $type->required = '0';
        $type->multiple = '1';
        $type->random = '0';
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

        $type = new \App\Models\QuestionTypes\YesNo();
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Si o no';
        $question->icon = 'text-width';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '10';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\Scale();
        $type->range_min = '0';
        $type->range_max = '10';
        $type->left_tag = 'Etiqueta izquierda';
        $type->right_tag = 'Etiqueta derecha';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'En qué escala estamos';
        $question->icon = 'transfer';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '11';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\Number();
        $type->range_min = '0';
        $type->range_max = '10';
        $type->required = '0';
        $type->save();
        $question = new App\Question();
        $question->text = 'Dígame un número del 0 al 10';
        $question->icon = 'text-width';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '12';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\Grid();
        $type->required = '0';
        $type->multiple = '0';
        $type->save();
        $row = new \App\Row();
        $row->value = 'Fila 1';
        $row->position = '0';
        $type->rows()->save($row);
        $row = new \App\Row();
        $row->value = 'Fila 2';
        $row->position = '1';
        $type->rows()->save($row);
        $column = new \App\Column();
        $column->value = 'Columna 1';
        $column->position = '0';
        $type->columns()->save($column);
        $column = new \App\Column();
        $column->value = 'Columna 2';
        $column->position = '1';
        $type->columns()->save($column);
        $question = new App\Question();
        $question->text = 'Cuadricula selección única';
        $question->icon = 'th';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '13';
        $type->question()->save($question);

        $type = new \App\Models\QuestionTypes\Grid();
        $type->required = '0';
        $type->multiple = '1';
        $type->save();
        $row = new \App\Row();
        $row->value = 'Fila 1';
        $row->position = '0';
        $type->rows()->save($row);
        $row = new \App\Row();
        $row->value = 'Fila 2';
        $row->position = '1';
        $type->rows()->save($row);
        $column = new \App\Column();
        $column->value = 'Columna 1';
        $column->position = '0';
        $type->columns()->save($column);
        $column = new \App\Column();
        $column->value = 'Columna 2';
        $column->position = '1';
        $type->columns()->save($column);
        $question = new App\Question();
        $question->text = 'Cuadricula selección multiple';
        $question->icon = 'th';
        $question->form_id = '1';
        $question->last_update_user_id = '3';
        $question->position = '14';
        $type->question()->save($question);

    }
}
