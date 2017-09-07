@if($question->typable->multiple)
    <?php
    $chart = Charts::multi('bar', 'material')
        ->responsive(true);

    $chart->labels($result['labels']);
    $chart->dataset('Valor', $result['count_options']);

    ?>
@else
    <?php
    $chart = Charts::create('pie', 'highcharts')
        ->responsive(true);

    $chart->labels($result['labels']);
    $chart->values($result['count_options']);

    ?>
@endif

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
                {!! $chart->render() !!}
            </div>
        </div>
    </div>

