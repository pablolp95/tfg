@foreach($form->questions->sortBy('position') as $question)
    @foreach($responses as $response)
        @php
            $answer = $response->answers->where('question_id', $question->id)->first();
        @endphp
        @if(!is_null($answer))
            @include('forms.analyze.questionTypes.'.$question->typable_type, ['question' => $question, 'answer' => $answer])
        @endif
    @endforeach
@endforeach