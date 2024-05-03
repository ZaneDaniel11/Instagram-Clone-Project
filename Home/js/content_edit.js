$(document).ready(function () {
    // Handle edit button click to open modal
    $(document).on('click', '.edit_content_btn', function (e) {
        e.preventDefault();

        var clicked = $(this);
        var contentId = clicked.val();

        // Find the closest post element
        var postElement = clicked.closest('.post-Container');

        // Get the content from the post element
        var content = postElement.find('.content_edit').text();

      
        $('#editContentId').val(contentId);
        $('#editContent').val(content);
        var content = $('.content_edit').text();

        // Show the modal
        $('#editModal').modal('show');
    });

    // Handle form submission
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
                location.reload(); // Reload the page after successful update
            },
            error: function (xhr, status, error) {
                console.error('Error updating content:', status, error);
            }
        });
    });

    // Close the modal when the close button is clicked
    $('#close_modal').click(function () {
        $('#editModal').modal('hide');
    });
});
