$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    /* ---------------------------------------------------
                    SIDEBAR
    ----------------------------------------------------- */
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

    //Devuelve la vista del workspace seleccionado
    $('.workspace-item').on('click', function () {
        window.location =  'http://' + window.location.host + '/workspaces/' + $(this).val();
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

});