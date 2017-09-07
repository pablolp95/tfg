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
            @if(!is_null($answer))
                @if($answer->first()->value)
                    <span class="glyphicon glyphicon-ok" style="color: #0f9d58" aria-hidden="true"></span><span>Si</span>
                @else
                    <span class="glyphicon glyphicon-remove" style="color: red" aria-hidden="true"></span><span>No</span>
                @endif
            @endif
        </div>
    </div>
</div>