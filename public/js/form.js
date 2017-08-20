$(document).ready(function(){
    var resource_name = $('#resource-name').html();

    /****************************/
    /*        SUBNAV            */
    /****************************/
    //Muestra el input para cambiar el nombre del workspace actual
    $(document).on('click', '#resource-name', function () {
        $('#layout-name').empty();
        $('#layout-name').append(
            '<input id="edit-resource-name" value="' + resource_name + '" type="text"> '+
            '<span id="submit-name" class="glyphicon glyphicon-ok"></span> '+
            '<span id="cancel-name" class="glyphicon glyphicon-remove"></span> ').hide().fadeIn();
    });

    //Muestra de nuevo el nombre del workspace actual si se cancela la acción de edición del mismo
    $(document).on('click', '#cancel-name', function () {
        $('#layout-name').html(
            '<span id="resource-name">' + resource_name + '</span> ' +
            '<span class="glyphicon glyphicon-pencil" style="color: white"></span> ').hide().fadeIn();
    });

    //Peticion de edición para cambiar el nombre del workspace actual
    $(document).on('click', '#submit-name', function () {
        var token = $('[name="csrf-token"]').attr('content');
        var name = $("#edit-resource-name").val();

        $.ajax({
            type: 'post',
            url: '/forms/' + form_id,
            data: {
                _method: 'put',
                _token: token,
                name: name
            },
            success: function() {
                resource_name = name;
                $('#received-message').html('<div id="received-message-success" class="alert alert-success" role="alert">Nombre actualizado</div>');
                $("#received-message-success").fadeOut(4000);
            },
            error: function(m) {
                $('#received-message').html('<div id="received-message-error" class="alert alert-danger" role="alert">Ha ocurrido un error</div>');
                $("#received-message-error").fadeOut(4000);
                console.log(m);
            },
            complete: function() {
                $('#layout-name').html(
                    '<span id="resource-name">' + resource_name + '</span> ' +
                    '<span class="glyphicon glyphicon-pencil" style="color: white"></span> ').hide().fadeIn();
            }
        });
    });
});