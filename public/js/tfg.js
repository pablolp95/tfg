$(document).ready(function(){
    var workspace_name = $('#workspace-name').html();

    $('[data-toggle="tooltip"]').tooltip();

    /****************************/
    /*        SIDEBAR           */
    /****************************/
    $("#sidebar").niceScroll({
        cursorcolor: '#53619d',
        cursorwidth: 4,
        cursorborder: 'none'
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        $(this).blur();
    });

    /****************************/
    /*        WORKSPACE         */
    /****************************/

    //Devuelve la vista del workspace seleccionado
    $('.workspace-item').on('click', function () {
        window.location.href = $(this).val();
    });

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

    //Muestra el input para cambiar el nombre del workspace actual
    $(document).on('click', '#workspace-name', function () {
        $('#layout-workspace-name').empty();
        $('#layout-workspace-name').append(
            '<input id="edit-workspace-name" value="' + workspace_name + '" type="text"> '+
            '<span id="submit-name" class="glyphicon glyphicon-ok"></span> '+
            '<span id="cancel-name" class="glyphicon glyphicon-remove"></span> ').hide().fadeIn();
    });

    //Peticion de edición para cambiar el nombre del workspace actual
    $(document).on('click', '#submit-name', function () {
        var id = $('#workspace-links .active').attr('value');
        var token = $('[name="csrf-token"]').attr('content');
        var name = $("#edit-workspace-name").val();

        $.ajax({
            type: 'post',
            url: '/workspaces/' + id,
            data: {
                _method: 'put',
                _token: token,
                id: id,
                name: name
            },
            success: function() {
                workspace_name = name;
                $('#workspace-message').html('<div id="workspace-message-success" class="alert alert-success" role="alert">Nombre actualizado</div>');
                $( ".workspace-item[value="+id+"] .workspace-item-name" ).html(name);
                $("#workspace-message-success").fadeOut(3000);
            },
            error: function() {
                $('#workspace-message').html('<div id="workspace-message-error" class="alert alert-danger" role="alert">Ha ocurrido un error</div>');
                $("#workspace-message-error").fadeOut(3000);
            },
            complete: function() {
                $('#layout-workspace-name').html(
                    '<span id="workspace-name">' + workspace_name + '</span> ' +
                    '<span class="glyphicon glyphicon-pencil" style="color: white"></span> ').hide().fadeIn();
            }
        });
    });

    //Muestra de nuevo el nombre del workspace actual si se cancela la acción de edición del mismo
    $(document).on('click', '#cancel-name', function () {
        $('#layout-workspace-name').html(
            '<span id="workspace-name">' + workspace_name + '</span> ' +
            '<span class="glyphicon glyphicon-pencil" style="color: white"></span> ').hide().fadeIn();
    });

    /****************************/
    /*          FORMS           */
    /****************************/



});