<div id="single-analyze">
    <div id="single-analyze-control">
        <input id="current-response" type="number" min="1" max="{{$form->responses->count()}}" value="1"><span>de {{$form->responses->count()}}</span>
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