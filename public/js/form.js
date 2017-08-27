$(document).ready(function(){
    var resource_name = $('#resource-name').html();

    /* ---------------------------------------------------
                    SUBNAV
    ----------------------------------------------------- */
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

    //Peticion de edición para cambiar el nombre del formulario actual
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

    /* ---------------------------------------------------
                    BUILD CONTENT
    ----------------------------------------------------- */
    //Envia una petición de creación del tipo de pregunta seleccionada
    $(document).on('click', '.question-type', function () {
        var question_html;
        if(!$("#form-questions").has("li.question-item").length) {
            $('.empty').css('height','45px');
        }
        question_html = '<li id="null" class="question-item" data-icon="' + $(this).data('icon') + '">' +
            '<div class="question-label-wrapper">' +
            '   <span class="glyphicon glyphicon-'+ $(this).data('icon') +'" aria-hidden="true"></span>' +
            '   <span class="question-label">' + $(this).data('label') + '</span>' +
            '</div>' +
            '<div class="question-actions">' +
            '   <span class="move-up-question glyphicon glyphicon-arrow-up" aria-hidden="true"></span>' +
            '   <span class="move-down-question glyphicon glyphicon-arrow-down" aria-hidden="true"></span>' +
            '   <span class="delete-question glyphicon glyphicon-trash" aria-hidden="true" ></span>' +
            '</div>' +
            '<div class="loading-question">' +
            '   <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate">' +
            '</div>' +
            '</li>';
        $(question_html).hide().insertBefore($('#drag-here')).fadeIn(1000);

        //Petición del contenido del modal según el tipo de pregunta y quitamos el icono de carga
        $.ajax({
            type: 'get',
            url: '/forms/type/' + $(this).data('id'),
            data: {
                _token: $('[name="csrf-token"]').attr('content'),
            },
            success: function(html) {
                $('#add-question-modal').append(html);
                $('.loading-question').remove();
                $('#add-question-modal').modal('toggle');
            },
            error: function(m) {
                console.log(m);
            }
        });

    });

    //Añadir una nueva pregunta al formulario
    $(document).on('click', '#add-question', function () {
        //Añado el id del formulario a la pregunta a almacenar
        $('#form_id').val(form_id);
        $('#icon').val($('#null').data('icon'));

        //Petición de creación de la pregunta
        $.ajax({
            type: 'post',
            url: '/questions',
            data: $('#question-form').serialize(),
            success: function(question_id) {
                $('#null').attr('id',question_id);
                $('#' + question_id + ' .question-label').html($('#question-form').find('[name="text"]').val());
                $('#add-question-modal').modal('hide');
            },
            error: function(m) {
                console.log(m);
            }
        });
    });

    //Quita el id del formulario a eliminar si se cancela la acción
    $('#add-question-modal').on('hidden.bs.modal', function () {
        if($('#null').length != 0) {
            $('#null').remove();
        }
        $('#add-question-modal').empty();
        if(!$("#form-questions").has("li.question-item").length) {
            $('.empty').css('height','145px');
        }
    });

    //Establece el id de la pregunta a eliminar y muestra el modal de eliminación
    $(document).on('click', '.delete-question', function (event) {
        $('#delete-question-button').attr("value", $(this).closest('li').attr('id'));
        $('#delete-question-modal').modal('toggle');
        event.stopPropagation();
    });

    //Quita el id de la pregunta a eliminar si se cancela la acción
    $('#delete-question-modal').on('hidden.bs.modal', function (e) {
        $('#delete-question-button').attr("value", "");
    });

    //Envia una petición de borrado de la pregunta seleccionada
    $(document).on('click', '#delete-question-button', function () {
        var id = $(this).val();
        var token = $('[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'post',
            url: '/questions/' + id,
            data: {
                _method: 'delete',
                _token: token
            },
            success: function(ms) {
                $('.question-item[id='+ id +']').fadeOut(500, function(){
                    $(this).remove()
                });
            },
            error: function(ms) {
                console.log("Error");
            },
            complete: function () {
                $('#delete-question-modal').modal('hide');
            }
        });

        if(!$("#form-questions").has("li.question-item").length) {
            $('.empty').css('height','145px');
        }
    });

});