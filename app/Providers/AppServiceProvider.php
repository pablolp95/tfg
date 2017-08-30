<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Relation::morphMap([
            'date' => 'App\QuestionTypesModels\Date',
            'declaration' => 'App\QuestionTypesModels\Declaration',
            'dropdown' => 'App\QuestionTypesModels\Dropdown',
            'email' => 'App\QuestionTypesModels\Email',
            'longText' => 'App\QuestionTypesModels\LongText',
            'multipleChoice' => 'App\QuestionTypesModels\MultipleChoice',
            'number' => 'App\QuestionTypesModels\Number',
            'pictureChoice' => 'App\QuestionTypesModels\PictureChoice',
            'rating' => 'App\QuestionTypesModels\Rating',
            'scale' => 'App\QuestionTypesModels\Scale',
            'shortText' => 'App\QuestionTypesModels\ShortText',
            'web' => 'App\QuestionTypesModels\Web'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
