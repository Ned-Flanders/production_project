require('./bootstrap');

jQuery(function($) {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

    $('.navbar-nav li a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
        }
    });

});

$('#exampleModalCenter-edit').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var challenge_name = button.data('challenge_name')
    var flag = button.data('flag')
    var course = button.data('course')
    var flag_id = button.data('flag_id')

    var modal = $(this)

    modal.find('.modal-body #challenge_name').val(challenge_name);
    modal.find('.modal-body #flag').val(flag);
    modal.find('.modal-body #course').val(course);
    modal.find('.modal-body #flag_id').val(flag_id);

});

$('#exampleModalCenter-delete').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var flag_id = button.data('flag_id')

    var modal = $(this)

    modal.find('.modal-body #flag_id').val(flag_id);

});
