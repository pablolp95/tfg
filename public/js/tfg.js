$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

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
    });

    $('.workspace-item').on('click', function () {
        window.location.href = $(this).val();
    });

    $('.form-item').on('click', function () {
        window.location =  'http://' + window.location.host + '/forms/' + $(this).val();
    });

    $('.delete-workspace').on('click', function (event) {
        $('#delete-workspace-form').attr("action", "http://tfg.com/workspaces/" + $(this).closest('li').val());
        $('#delete-workspace-modal').modal('toggle');
        event.stopPropagation();
    });

    $('#delete-workspace-modal').on('hidden.bs.modal', function (e) {
        $('#delete-workspace-form').attr("action", "");
    });

    $('.delete-form').on('click', function (event) {
        $('#delete-form').attr("action", "http://tfg.com/forms/" + $(this).closest('li').val());
        $('#delete-form-modal').modal('toggle');
        event.stopPropagation();
    });

    $('#delete-form-modal').on('hidden.bs.modal', function (e) {
        $('#delete-form').attr("action", "");
    });


});