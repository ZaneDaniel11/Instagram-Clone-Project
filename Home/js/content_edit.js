$(document).ready(function () {
    // Handle edit button click to open modal
    $(document).on('click', '.edit_content_btn', function (e) {
        e.preventDefault();

        var clicked = $(this);
        var contentId = clicked.val();
        var contentData = JSON.parse(clicked.attr('data-content'));

        openEditModal(contentId, contentData.content, contentData.image_url);
    });

    function openEditModal(contentId, content, imageUrl) {
        $('#editContentId').val(contentId);
        $('#editContent').val(content);
        $('#editImage').val(imageUrl);

        $('#editModal').modal('show'); // Show the modal using Bootstrap modal function
    }

    // Close the modal when the close button is clicked
    $('#close_modal').click(function () {
        $('#editModal').modal('hide');
    });

    // Handle form submission using delegated event handler
    $(document).on('submit', '#editForm', function (e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]); // Use FormData for file uploads

        $.ajax({
            type: "POST",
            url: "./Code/edit_content.php",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Set content type to false for file uploads
            success: function (response) {
                console.log('Content updated successfully:', response);
                $('#editModal').modal('hide'); // Hide the modal after successful update
                // Reload or update content display as needed
            },
            error: function (xhr, status, error) {
                console.error('Error updating content:', status, error);
            }
        });
    });

    // Handle delete content button click
    $(document).on('click', '.delete_content_btn', function (e) {
        e.preventDefault();

        var clicked = $(this);
        var delete_content = clicked.val();

        var data = {
            'content': delete_content,
            'submit_delete': true
        };

        $.ajax({
            type: "POST",
            url: "./Code/content.php",
            data: data,
            success: function (response) {
                location.reload();
            }
        });
    });
});
