$(document).ready(function () {
    sortable('#form-questions',{
        items: '.question-item',
        forcePlaceholderSize: true
    });
    /* ---------------------------------------------------
                    1.MANAGE QUESTIONS
    ----------------------------------------------------- */
    /*-------------------------
        1.1.ADD QUESTIONS
     -------------------------*/
    //Envia una petición de creación del tipo de pregunta seleccionada
    $(document).on('click', '.question-type', function () {
        var question_html;
        var type = $(this).data('type');

        if(!$("#form-questions").has("li.question-item").length) {
            $('.empty').css('height','45px');
        }

        question_html = '<li id="null" class="question-item" data-id="" data-icon="' + $(this).data('icon') + '" data-type="' + type + '">' +
            '<div class="question-label-wrapper">' +
            '   <span class="glyphicon glyphicon-'+ $(this).data('icon') +'" aria-hidden="true"></span>' +
            '   <span class="question-label">' + $(this).data('label') + '</span>' +
            '</div>' +
            '<div class="question-actions">' +
            '   <span class="move-question glyphicon glyphicon-move" aria-hidden="true"></span>' +
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
            url: '/questions/create/' + type,
            data: {
                _token: $('[name="csrf-token"]').attr('content')
            },
            success: function(html) {
                $('#add-question-modal').append(html);
                $('.loading-question').remove();
                $('#add-question-modal').modal('toggle');
            },
            error: function(m) {
                console.log(m);
                $('html').html(m.responseText);
            },
            complete: function () {
                if(type === 'dropdown' || type === 'multipleChoice' || type === 'pictureChoice'){
                    sortable('#question-options',{
                        items: '.option-item',
                        handle: '.move-option',
                        forcePlaceholderSize: true
                    });
                }
            }
        });

        sortable('#form-questions',{
            forcePlaceholderSize: true
        });

    });

    //Añadir una nueva pregunta al formulario
    $(document).on('click', '#add-question', function () {
        $('#form_id').val(form_id); //Añado el id del formulario al input oculto
        $('#icon').val($('#null').data('icon')); //Añado el tipo de icono al input oculto
        var position = $('#form-questions').find('li.question-item').length - 1;
        $('#question-position').val(position); //Añado la posicion al input oculto

        var question_id = '';
        var form = $('#question-form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);

        if($('.question-field #text').val().length === 0) {
            $('.question-field #text').after('<span id="question_warning" class="warning">Debe establecer una pregunta</span>');
        }
        else {
            //Petición de creación de la pregunta
            $.ajax({
                type: 'post',
                url: '/questions',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(model_json) {
                    $model = JSON.parse(model_json);
                    question_id = "question-"+$model.id;

                    $('#null').attr('id',question_id);
                    $('#' + question_id + ' .question-label').html($model.text);
                    $('#' + question_id).attr('data-id', $model.id);
                    $('#add-question-modal').modal('hide');
                },
                error: function(m) {
                    console.log(m);
                    $('html').html(m.responseText);
                }
            });
        }

    });

    //Quita de la lista la pregunta si se cancela la operación de añadir una nueva
    $('#add-question-modal').on('hidden.bs.modal', function () {
        if($('#null').length != 0) {
            $('#null').remove();
        }
        $('#add-question-modal').empty();
        if(!$("#form-questions").has("li.question-item").length) {
            $('.empty').css('height','145px');
        }
    });

    //Funcion para quitar texto de warning
    $(document).on('keyup','.question-field #text', function () {
        if ($("#question_warning").length) {
            $("#question_warning").remove();
        }
    });

    /*-------------------------
        1.2.EDIT QUESTIONS
     -------------------------*/
    //Actualización de las posiciones de las preguntas
    sortable('#form-questions')[0].addEventListener('sortupdate', function(e) {
        /*

        This event is triggered when the user stopped sorting and the DOM position has changed.

        e.detail.item contains the current dragged element.
        e.detail.index contains the new index of the dragged element (considering only list items)
        e.detail.oldindex contains the old index of the dragged element (considering only list items)
        e.detail.elementIndex contains the new index of the dragged element (considering all items within sortable)
        e.detail.oldElementIndex contains the old index of the dragged element (considering all items within sortable)
        e.detail.startparent contains the element that the dragged item comes from
        e.detail.endparent contains the element that the dragged item was added to (new parent)
        e.detail.newEndList contains all elements in the list the dragged item was dragged to
        e.detail.newStartList contains all elements in the list the dragged item was dragged from
        e.detail.oldStartList contains all elements in the list the dragged item was dragged from BEFORE it was dragged from it
        */

        var token = $('[name="csrf-token"]').attr('content');
        var data = sortable('#form-questions','serialize')[0].children;
        var questions_data = {
            questions: []
        };

        $.each(data, function (index, value) {
            questions_data.questions.push({
                "id": value.attributes[2].value,
                "position": index
            });
        });

        $.ajax({
            type: 'post',
            url: '/questions/update/order',
            data: {
                _method: 'put',
                _token: token,
                order: questions_data
            },
            success: function() {

            },
            error: function(ms) {
                console.log(ms);
            }
        });


    });

    //Mostrar modal para editar pregunta
    $(document).on('click', '.question-item', function () {
        //Petición del contenido del modal según el tipo de pregunta y quitamos el icono de carga
        $.ajax({
            type: 'get',
            url: '/questions/' + $(this).data('id') + '/edit',
            data: {
                _token: $('[name="csrf-token"]').attr('content')
            },
            success: function(html) {
                $('#edit-question-modal').append(html);
                $('.loading-question').remove();
                $('#edit-question-modal').modal('toggle');
            },
            error: function(m) {
                console.log(m);
                $('html').html(m.responseText);
            }
        });
    });

    //Actualizar una pregunta
    $(document).on('click', '#edit-question', function () {
        var question_id = '#question-'+$('#edit-question').val();
        var form = $('#question-form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);

        $.ajax({
            url: $('#question-form').prop('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(model_json) {
                $model = JSON.parse(model_json);
                $(question_id+' .question-label').html($model.text);
                $('#edit-question-modal').modal('hide');
            },
            error: function(message) {
                console.log(message);
            }
        });
    });

    //Quita el contenido del modal si se cancela la edición de la pregunta
    $('#edit-question-modal').on('hidden.bs.modal', function () {
        $('#edit-question-modal').empty();
    });

    /*-------------------------
        1.3.DELETE QUESTIONS
     -------------------------*/
    //Establece el id de la pregunta a eliminar y muestra el modal de eliminación
    $(document).on('click', '.delete-question', function (event) {
        var id = $(this).closest('li').attr('id').replace('question-','');
        $('#delete-question-button').attr("value", id);
        $('#delete-question-modal').modal('toggle');
        event.stopPropagation();
    });

    //Quita el id de la pregunta a eliminar si se cancela la acción
    $('#delete-question-modal').on('hidden.bs.modal', function () {
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
                $('.question-item[id=question-'+ id +']').fadeOut(500, function(){
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

    /* ---------------------------------------------------
                2.DROPDOWN/MULTIPLE QUESTION TYPE
    ----------------------------------------------------- */
    //Se añade a la lista una nueva opción
    $(document).on('click', '.add-option-button', function () {
        var id = $('#question-options').find('li.option-item').length;
        var count = id + 1;

        var option = '<li class="option-item">' +
            '   <input name="options_id[]" value="" type="hidden">' +
            '   <input name="options_value[]" class="question-option" type="text" value="Opción '+ count +'">' +
            '   <span class="glyphicon glyphicon-move move-option" aria-hidden="true"></span>\n' +
            '   <span class="glyphicon glyphicon-remove delete-option" aria-hidden="true"></span>' +
            '</li>';
        $(option).insertBefore($('#add-option-item'));
        sortable('#question-options',{
            items: '.option-item',
            handle: '.move-option',
            forcePlaceholderSize: true
        });

    });

    //Se borra de la lista la opción seleccionada
    $(document).on('click', '.delete-option', function () {
        $(this).closest('li').remove();
    });

    /* ---------------------------------------------------
                    3.GRID QUESTION TYPE
    ----------------------------------------------------- */
    //Se añade a la lista una nueva fila
    $(document).on('click', '.add-row-button', function () {
        var id = $('#rows').find('li.option-item').length;
        var count = id + 1;

        var option = '<li class="option-item">' +
            '   <input name="rows_id[]" value="" type="hidden">' +
            '   <input name="rows_value[]" class="question-option" type="text" value="Fila '+ count +'">' +
            '   <span class="glyphicon glyphicon-move move-option" aria-hidden="true"></span>\n' +
            '   <span class="glyphicon glyphicon-remove delete-option" aria-hidden="true"></span>' +
            '</li>';
        $(option).insertBefore($('#add-row-item'));
        sortable('#rows',{
            items: '.option-item',
            handle: '.move-option',
            forcePlaceholderSize: true
        });

    });

    //Se añade a la lista una nueva columna
    $(document).on('click', '.add-column-button', function () {
        var id = $('#columns').find('li.option-item').length;
        var count = id + 1;

        var option = '<li class="option-item">' +
            '   <input name="columns_id[]" value="" type="hidden">' +
            '   <input name="columns_value[]" class="question-option" type="text" value="Columna '+ count +'">' +
            '   <span class="glyphicon glyphicon-move move-option" aria-hidden="true"></span>\n' +
            '   <span class="glyphicon glyphicon-remove delete-option" aria-hidden="true"></span>' +
            '</li>';
        $(option).insertBefore($('#add-column-item'));
        sortable('#columns',{
            items: '.option-item',
            handle: '.move-option',
            forcePlaceholderSize: true
        });

    });
});