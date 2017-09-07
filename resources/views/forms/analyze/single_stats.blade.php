<div id="single-analyze">
    <div id="single-analyze-control">
        <?php
            $count = $form->responses->count();
            $min = 0;
            $initial = 0;
            if($count != 0) {
                $min = 1;
                $initial = 1;
            }
        ?>
        <input id="current-response" type="number" min="{{$min}}" max="{{$count}}" value="{{$initial}}"><span>de {{$count}}</span>
    </div>
    <div id="response">

    </div>
</div>
<script>
    $.ajax({
        url : '/forms/'+ form_id +'/analyze/response_stats?page=1'
    }).done(function (data) {
        $('#response').html(data);
    }).fail(function () {
        alert('Ha ocurrido un error');
    });
</script>