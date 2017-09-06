@extends('publicForms.layout')

@section('title')
    {{$form->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                {!! Form::open(["method" => "post", "route" => "form.submit"]) !!}
                <input name="form_id" value="{{$form->id}}" type="hidden">

                @foreach($form->questions->sortBy('position') as $question)
                    @include('publicForms.questions.'.$question->typable_type)
                @endforeach

                {!! Form::button("ENVIAR", ["type" => "submit", "class" => "right btn waves-effect white black-text"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
