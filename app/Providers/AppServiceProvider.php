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
            'date' => 'App\Models\QuestionTypes\Date',
            'declaration' => 'App\Models\QuestionTypes\Declaration',
            'dropdown' => 'App\Models\QuestionTypes\Dropdown',
            'email' => 'App\Models\QuestionTypes\Email',
            'hour' => 'App\Models\QuestionTypes\Hour',
            'legal' => 'App\Models\QuestionTypes\Legal',
            'longText' => 'App\Models\QuestionTypes\LongText',
            'multipleChoice' => 'App\Models\QuestionTypes\MultipleChoice',
            'number' => 'App\Models\QuestionTypes\Number',
            'pictureChoice' => 'App\Models\QuestionTypes\PictureChoice',
            'rating' => 'App\Models\QuestionTypes\Rating',
            'scale' => 'App\Models\QuestionTypes\Scale',
            'shortText' => 'App\Models\QuestionTypes\ShortText',
            'web' => 'App\Models\QuestionTypes\Web',
            'yesNo' => 'App\Models\QuestionTypes\YesNo',

            'dateAnswer' => 'App\Models\AnswerTypes\DateAnswer',
            'declarationAnswer' => 'App\Models\AnswerTypes\DeclarationAnswer',
            'dropdownAnswer' => 'App\Models\AnswerTypes\DropdownAnswer',
            'emailAnswer' => 'App\Models\AnswerTypes\EmailAnswer',
            'hourAnswer' => 'App\Models\AnswerTypes\HourAnswer',
            'legalAnswer' => 'App\Models\AnswerTypes\LegalAnswer',
            'longTextAnswer' => 'App\Models\AnswerTypes\LongTextAnswer',
            'multipleChoiceAnswer' => 'App\Models\AnswerTypes\MultipleChoiceAnswer',
            'numberAnswer' => 'App\Models\AnswerTypes\NumberAnswer',
            'pictureChoiceAnswer' => 'App\Models\AnswerTypes\PictureChoiceAnswer',
            'ratingAnswer' => 'App\Models\AnswerTypes\RatingAnswer',
            'scaleAnswer' => 'App\Models\AnswerTypes\ScaleAnswer',
            'shortTextAnswer' => 'App\Models\AnswerTypes\ShortTextAnswer',
            'webAnswer' => 'App\Models\AnswerTypes\WebAnswer',
            'yesNoAnswer' => 'App\Models\AnswerTypes\YesNoAnswer',
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
