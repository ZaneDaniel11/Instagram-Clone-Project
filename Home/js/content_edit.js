$(document).ready(function () {

    $(document).on('click', '.edit_content_btn', function (e) {
        e.preventDefault();

        var clicked = $(this);
        var contentId = clicked.val();


        var postElement = clicked.closest('.post-Container');


        var content = postElement.find('.content_edit').text();

      
        $('#editContentId').val(contentId);
        $('#editContent').val(content);
        var content = $('.content_edit').text();


        $('#editModal').modal('show');
    });

    $(document).on('submit', '#editForm', function (e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]);

        $.ajax({
            type: "POST",
            url: "./Code/edit_content.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error('Error updating content:', status, error);
            }
        });
    });


    $('#close_modal').click(function () {
        $('#editModal').modal('hide');
    });
});
