<?php
    $multiple = $question->typable->multiple;
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="question-response">
            <h3>{{$question->text}}</h3>
            @if(!is_null($question->description))
                <div class="description">
                    <p>{{$question->description}}</p>
                </div>
            @endif
        </div>
        <div class="question-answer">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    @foreach($question->typable->columns->sortBy('position') as $column)
                        <th>{{$column->value}}</th>
                    @endforeach
                </tr>
                </thead>

                <tbody>
                @foreach($question->typable->rows->sortBy('position') as $row)
                    <tr>
                        <td>{{  $row->value }}</td>
                        @foreach($question->typable->columns->sortBy('position') as $column)
                            @php
                            $checked = false;
                            if(!is_null($answer)){
                                $item = $answer->filter(function ($model) use ($column, $row) {
                                    return $model->value == $column->value && $model->row->row_id == $row->id;
                                })->first();
                                if(!is_null($item)) {
                                    $checked = true;
                                }
                            }
                            @endphp
                            @if($multiple)
                                <td>
                                    <input type="checkbox" disabled @if($checked) checked @endif/>
                                </td>
                            @else
                                <td>
                                    <input type="radio" disabled @if($checked) checked @endif/>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>