<div class="card">
    <div class="card-content black-text">
        <span class="card-title">
            @if($question->typable->required)<span>*</span>@endif
            {{$question->text}}
        </span>
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
        <div class="input-field">
            <textarea id="form_answer-{{ $question->id }}" name="form_answer[{{ $question->id }}]" maxlength="{{$question->typable->max_num_characters}}" class="materialize-textarea" @if($question->typable->required) required @endif></textarea>
            <label for="form_answer-{{ $question->id }}">Respuesta</label>
        </div>
    </div>
</div>