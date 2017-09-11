<div class="card">
    <div class="card-content black-text">
        <span class="card-title">{{$question->text}}</span>
    </div>
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