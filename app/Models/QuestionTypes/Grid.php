<?php

namespace App\Models\QuestionTypes;

use App\Row;
use App\Column;
use App\Events\DeleteGridQuestion;
use App\Events\SaveQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Grid extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'deleted' => DeleteGridQuestion::class,
        'saved' => SaveQuestion::class,
    ];

    /**
     * Get the question model.
     */
    public function question()
    {
        return $this->morphOne('App\Question', 'typable');
    }

    /**
     * Get the rows.
     */
    public function rows()
    {
        return $this->hasMany('App\Row');
    }

    /**
     * Get the columns.
     */
    public function columns()
    {
        return $this->hasMany('App\Column');
    }

    /**
     * Get the image model.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'question');
    }

    /**
     * Get the video model.
     */
    public function video()
    {
        return $this->morphOne('App\Video', 'question');
    }

    /**
     * Basic save operation used for update & store.
     *
     * @param Request $request
     * @param bool $save
     * @return mixed
     */
    public function silentSave(Request $request, $save = true)
    {
        $this->required = $request->input('required');
        $this->multiple = $request->input('multiple');

        ($save) ? $this->save() : null;

        //Creo/actualizo las filas
        $rows_id = $request->input('rows_id');
        $rows_value = $request->input('rows_value');

        if(isset($rows_id) && isset($rows_value)){
            $current_rows = $this->rows;

            foreach ($current_rows as $current_row){
                if(!array_has($rows_id, $current_row->id)){
                    $current_row->delete();
                }
            }


            $min = min(count($rows_id), count($rows_value));

            for($position = 0; $position < $min; $position++) {
                $row = $this->rows->where('id', $rows_id[$position])->first();

                if(is_null($row) || empty($row)){
                    $row = new Row();
                }

                $row->value = $rows_value[$position];
                $row->position = $position;
                $this->rows()->save($row);
            }

        }
        else {
            $current_rows = $this->rows;
            foreach ($current_rows as $current_row){
                $current_row->delete();
            }
        }

        //Creo/actualizo las columnas
        $columns_id = $request->input('columns_id');
        $columns_value = $request->input('columns_value');

        if(isset($columns_id) && isset($columns_value)){
            $current_columns = $this->columns;

            foreach ($current_columns as $current_column){
                if(!array_has($columns_id, $current_column->id)){
                    $current_column->delete();
                }
            }


            $min = min(count($columns_id), count($columns_value));

            for($position = 0; $position < $min; $position++) {
                $column = $this->columns->where('id', $columns_id[$position])->first();

                if(is_null($column) || empty($column)){
                    $column = new Column();
                }

                $column->value = $columns_value[$position];
                $column->position = $position;
                $this->columns()->save($column);
            }

        }
        else {
            $current_columns = $this->columns;
            foreach ($current_columns as $current_column){
                $current_column->delete();
            }
        }

    }
}
