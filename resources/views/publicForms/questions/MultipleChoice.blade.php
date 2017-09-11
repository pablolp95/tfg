<div class="card">
    <div class="card-content black-text">
        <span class="card-title">{{$question->text}}</span>
        @if(!is_null($question->description))
            <div class="description">
                <p>{{$question->description}}</p>
            </div>
        @endif
        @if(!is_null($question->description))
            <div class="description">
                <p>{{$question->description}}</p>
            </div>
        @endif
        @if(!is_null($question->typable->image))
            <img class="responsive-img" src="{{asset('storage/images/'.$question->typable->image->original_filename)}}">
        @elseif(!is_null($question->typable->video))
            <div class="video-container">
                <iframe width="853" height="480" src="{{$question->typable->video->url}}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endif
    </div>
    <div class="card-action">
        <ul>
            @php
                if($question->typable->random)
                    $options = $question->typable->options->shuffle();
                else
                    $options = $question->typable->options->sortBy('position');
            @endphp
            @if(!$question->typable->multiple)
                @foreach($options as $option)
                    <li class="optiom-item">
                        <input type="radio" id="form_answer_{{ $question->id }}_{{$option->id}}" name="form_answer[{{ $question->id }}]" value="{{$option->option_value}}"/>
                        <label for="form_answer_{{ $question->id }}_{{$option->id}}">{{$option->option_value}}</label>
                    </li>
                @endforeach
            @else
                @foreach($options as $option)
                    <li class="optiom-item">
                        <input type="checkbox" class="filled-in" id="form_answer_{{ $question->id }}_{{$option->id}}" name="form_answer[{{ $question->id }}][]" value="{{$option->option_value}}"/>
                        <label for="form_answer_{{ $question->id }}_{{$option->id}}">{{$option->option_value}}</label>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>