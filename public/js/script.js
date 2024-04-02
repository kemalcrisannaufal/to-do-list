$(document).ready(function () {
    $('.fa-chevron-down').click(function(){
        var id = $(this).data('task-id');
        $(`.subtask[data-subtask-id=${id}]`).slideToggle('slow');
        $(this).toggleClass('fa-chevron-down fa-chevron-up');
    });
});
