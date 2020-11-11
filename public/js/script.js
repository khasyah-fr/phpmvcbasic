$(function() {
    $('.addBtn').on('click', function() {
        $('#titleModal').html('Add Student ?');
        $('.modal-footer button[type=submit]').html('Add');
    });

    $('.editBtn').on('click', function() {
        $('#titleModal').html('Edit Student ?');
        $('.modal-footer button[type=submit]').html('Edit');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/students/getedit',
            data: {id : id},
            method: 'post',
            dataType: 'text',
            success: function(data) {
                console.log(data);
            }
        });
    });
})