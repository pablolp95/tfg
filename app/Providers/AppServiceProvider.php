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
            'Date' => 'App\Models\QuestionTypes\Date',
            'Declaration' => 'App\Models\QuestionTypes\Declaration',
            'Dropdown' => 'App\Models\QuestionTypes\Dropdown',
            'Email' => 'App\Models\QuestionTypes\Email',
            'Grid' => 'App\Models\QuestionTypes\Grid',
            'Hour' => 'App\Models\QuestionTypes\Hour',
            'Legal' => 'App\Models\QuestionTypes\Legal',
            'LongText' => 'App\Models\QuestionTypes\LongText',
            'MultipleChoice' => 'App\Models\QuestionTypes\MultipleChoice',
            'Number' => 'App\Models\QuestionTypes\Number',
            'PictureChoice' => 'App\Models\QuestionTypes\PictureChoice',
            'Rating' => 'App\Models\QuestionTypes\Rating',
            'Scale' => 'App\Models\QuestionTypes\Scale',
            'ShortText' => 'App\Models\QuestionTypes\ShortText',
            'Web' => 'App\Models\QuestionTypes\Web',
            'YesNo' => 'App\Models\QuestionTypes\YesNo'
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
