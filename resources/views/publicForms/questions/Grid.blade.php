<?php
    $multiple = $question->typable->multiple;
?>
<div class="card">
    <div class="card-content black-text">
        <span class="card-title">{{$question->text}}</span>
        @if(!is_null($question->description))
            <div class="description">
                <p>{{$question->description}}</p>
            </div>
        @endif
    </div>
    <div class="card-action">
        <table class="striped centered responsive-table">
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
                        <td class="row-value">{{  $row->value }}</td>
                        @foreach($question->typable->columns->sortBy('position') as $column)
                            @if($multiple)
                                <td>
                                    <input type="checkbox" class="filled-in" id="form_answer_{{ $row->id }}_{{$column->id}}" name="form_answer[{{ $question->id }}][{{$row->id}}][]" value="{{$column->value}}"/>
                                    <label for="form_answer_{{ $row->id }}_{{$column->id}}"></label>
                                </td>
                            @else
                                <td>
                                    <input type="radio" id="form_answer_{{ $row->id }}_{{$column->id}}" name="form_answer[{{ $question->id }}][{{$row->id}}]" value="{{$column->value}}"/>
                                    <label for="form_answer_{{ $row->id }}_{{$column->id}}"></label>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>