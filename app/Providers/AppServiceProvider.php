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
            'YesNo' => 'App\Models\QuestionTypes\YesNo',

            'DateAnswer' => 'App\Models\AnswerTypes\DateAnswer',
            'DeclarationAnswer' => 'App\Models\AnswerTypes\DeclarationAnswer',
            'DropdownAnswer' => 'App\Models\AnswerTypes\DropdownAnswer',
            'EmailAnswer' => 'App\Models\AnswerTypes\EmailAnswer',
            'HourAnswer' => 'App\Models\AnswerTypes\HourAnswer',
            'LegalAnswer' => 'App\Models\AnswerTypes\LegalAnswer',
            'LongTextAnswer' => 'App\Models\AnswerTypes\LongTextAnswer',
            'MultipleChoiceAnswer' => 'App\Models\AnswerTypes\MultipleChoiceAnswer',
            'NumberAnswer' => 'App\Models\AnswerTypes\NumberAnswer',
            'PictureChoiceAnswer' => 'App\Models\AnswerTypes\PictureChoiceAnswer',
            'RatingAnswer' => 'App\Models\AnswerTypes\RatingAnswer',
            'ScaleAnswer' => 'App\Models\AnswerTypes\ScaleAnswer',
            'ShortTextAnswer' => 'App\Models\AnswerTypes\ShortTextAnswer',
            'WebAnswer' => 'App\Models\AnswerTypes\WebAnswer',
            'YesNoAnswer' => 'App\Models\AnswerTypes\YesNoAnswer',
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
