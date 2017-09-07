@foreach($form->questions->sortBy('position') as $question)
    @if(!empty($answers))
        @php
            $answer = $answers[$question->id];
        @endphp
        @include('forms.analyze.questionTypes.'.$question->typable_type, ['question' => $question, 'answer' => $answer])
    @endif
@endforeach