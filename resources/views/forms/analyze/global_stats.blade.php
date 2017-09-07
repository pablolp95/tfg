@if(!is_null($results))
    @foreach($form->questions->sortBy('position') as $question)
        @if(array_key_exists($question->id, $results))
            @include('forms.analyze.global.'.$question->typable_type, ['question' => $question, 'result' => $results[$question->id]])
        @endif
    @endforeach
@endif