$(document).ready(function(){
    /* ---------------------------------------------------
                        1.ANALYZE
    ----------------------------------------------------- */
    $.ajax({
        url : '/forms/'+ form_id +'/analyze/global_stats'
    }).done(function (data) {
        $('#analyze-content').html(data);
    }).fail(function () {
        alert('Ha ocurrido un error');
    });

    $('#summary').click(function () {
        $.ajax({
            url : '/forms/'+ form_id +'/analyze/global_stats'
        }).done(function (data) {
            $('#single').removeClass('selected');
            $('#summary').addClass('selected');
            $('#analyze-content').html(data);
        }).fail(function () {
            alert('Ha ocurrido un error');
        });
    });

    $('#single').click(function () {
        $.ajax({
            url : '/forms/'+ form_id +'/analyze/single_stats'
        }).done(function (data) {
            $('#summary').removeClass('selected');
            $('#single').addClass('selected');
            $('#analyze-content').html(data);
        }).fail(function () {
            alert('Ha ocurrido un error');
        });
    });

    $(document).on('keyup change', '#current-response', function () {
        var current_response = $("#current-response");
        var value = current_response.val();
        if(value !== '' && value >= current_response.attr('min') && value <= current_response.attr('max')) {
            $.ajax({
                url : '/forms/'+ form_id +'/analyze/response_stats?page='+ value
            }).done(function (data) {
                $('#response').html(data);
            }).fail(function () {
                alert('Ha ocurrido un error');
            });
        }
    });

});