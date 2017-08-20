$(document).ready(function(){
    var resource_name = $('#resource-name').html();

    /****************************/
    /*        WORKSPACE         */
    /****************************/
    //Devuelve la vista del formulario seleccionado
    $('.form-item').on('click', function () {
        window.location =  'http://' + window.location.host + '/forms/' + $(this).val() + '/build';
    });

    //Establece la acción del formulario para eliminar un workspace
    $('.delete-workspace').on('click', function (event) {
        $('#delete-workspace-form').attr("action", "http://tfg.com/workspaces/" + $(this).closest('li').val());
        $('#delete-workspace-modal').modal('toggle');
        event.stopPropagation();
    });

    //Quita la acción del formulario para eliminar un workspace si se cancela la acción
    $('#delete-workspace-modal').on('hidden.bs.modal', function () {
        $('#delete-workspace-form').attr("action", "");
    });

    //Establece el id del formulario a eliminar y muestra el modal de eliminación
    $('.delete-form').on('click', function (event) {
        $('#delete-form-button').attr("value", $(this).closest('li').val());
        $('#delete-form-modal').modal('toggle');
        event.stopPropagation();
    });

    //Quita el id del formulario a eliminar si se cancela la acción
    $('#delete-form-modal').on('hidden.bs.modal', function (e) {
        $('#delete-form-button').attr("value", "");
    });

    //Envia una petición de borrado del formulario seleccionado
    $('#delete-form-button').on('click', function () {
        var id = $(this).val();
        var token = $('[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'post',
            url: '/forms/' + id,
            data: {
                _method: 'delete',
                _token: token,
                id: id,
                name: name
            },
            success: function(ms) {
                $( ".form-item[value="+id+"]" ).fadeOut(1000, function(){
                    $(this).remove()
                });
            },
            error: function(ms) {
                console.log("Error");
            },
            complete: function () {
                $('#delete-form-modal').modal('hide');
            }
        });
    });

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
        var id = $('#workspace-links .active').attr('value');
        var token = $('[name="csrf-token"]').attr('content');
        var name = $("#edit-resource-name").val();

        $.ajax({
            type: 'post',
            url: '/workspaces/' + id,
            data: {
                _method: 'put',
                _token: token,
                name: name
            },
            success: function() {
                resource_name = name;
                $('#received-message').html('<div id="received-message-success" class="alert alert-success" role="alert">Nombre actualizado</div>');
                $( ".workspace-item[value="+id+"] .workspace-item-name" ).html(name);
                $("#received-message-success").fadeOut(4000);
            },
            error: function() {
                $('#received-message').html('<div id="received-message-error" class="alert alert-danger" role="alert">Ha ocurrido un error</div>');
                $("#received-message-error").fadeOut(4000);
            },
            complete: function() {
                $('#layout-name').html(
                    '<span id="resource-name">' + resource_name + '</span> ' +
                    '<span class="glyphicon glyphicon-pencil" style="color: white"></span> ').hide().fadeIn();
            }
        });
    });
});