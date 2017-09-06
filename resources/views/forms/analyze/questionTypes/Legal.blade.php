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
            @if($answer->value)
                <span class="glyphicon glyphicon-ok" style="color: #0f9d58" aria-hidden="true"></span><span>Aceptada</span>
            @else
                <span class="glyphicon glyphicon-remove" style="color: red" aria-hidden="true"></span><span>Rechazada</span>
            @endif
        </div>
    </div>
</div>