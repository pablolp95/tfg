<?php

namespace App\Listeners;

use App\AnswerRow;
use App\Events\ResponseCreated;
use App\Question;
use App\Row;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Answer;
use Illuminate\Support\Facades\Log;

class FillResponse
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  ResponseCreated  $event
     * @return void
     */
    public function handle(ResponseCreated $event)
    {
        $response = $event->response;
        $answers = $this->request->input('form_answer');

        if(!is_null($answers)) {
            foreach ($answers as $question_id => $value) {
                $question = Question::find($question_id);
                $type = $question->typable_type;
                if ($type == 'Grid') {
                    foreach ($value as $row_id => $row_value) {
                        if (is_array($row_value)) {
                            foreach ($row_value as $answer_value) {
                                if (isset($answer_value)) {
                                    $answer = new Answer();
                                    $answer->response_id = $response->id;
                                    $answer->question_id = $question_id;
                                    $answer->value = $answer_value;

                                    $answer_row = new AnswerRow();
                                    $answer_row->row_id = $row_id;

                                    $response->answers()->save($answer);
                                    $answer->row()->save($answer_row);
                                }
                            }
                        } else {
                            if (isset($row_value)) {
                                $answer = new Answer();
                                $answer->response_id = $response->id;
                                $answer->question_id = $question_id;
                                $answer->value = $row_value;

                                $answer_row = new AnswerRow();
                                $answer_row->row_id = $row_id;

                                $response->answers()->save($answer);
                                $answer->row()->save($answer_row);
                            }
                        }
                    }
                } else {
                    if (is_array($value)) {
                        foreach ($value as $answer_value) {
                            if (isset($answer_value)) {
                                $answer = new Answer();
                                $answer->response_id = $response->id;
                                $answer->question_id = $question_id;
                                $answer->value = $answer_value;

                                $response->answers()->save($answer);
                            }
                        }
                    } else {
                        if (isset($value)) {
                            $answer = new Answer();
                            $answer->response_id = $response->id;
                            $answer->question_id = $question_id;
                            $answer->value = $value;

                            $response->answers()->save($answer);

                        }
                    }
                }
            }
        }
    }
}
