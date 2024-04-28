$(document).ready(function () {
    
function openEditModal(contentId, username, imageUrl) {
    $('#editContentId').val(contentId);
    $('#editContent').val(username);
    $('#editImage').val(imageUrl);

    $('#editModal').css('display', 'block');
}

// Handle edit button click to open modal
$(document).on('click', '.edit_content_btn', function (e) {
    e.preventDefault();

    var clicked = $(this);
    var contentId = clicked.val();
    var contentContainer = clicked.closest('.content-container'); // Get t  he container of the clicked content
    var username = contentContainer.find('.content_content').text();
    var imageUrl = contentContainer.find('.image-url').text();

    openEditModal(contentId, username, imageUrl);
});

// Close the edit modal when the close button or outside modal is clicked
$(document).on('click', '.close', function() {
    $('#editModal').css('display', 'none');
});

$(document).on('click', function(e) {
    var modal = $('#editModal');
    if (e.target == modal[0]) {
        modal.css('display', 'none');
    }
});

// Submit edit form
$('#editForm').submit(function(e) {
    e.preventDefault();

    var form = $(this);
    var formData = form.serialize();

    $.ajax({
        type: "POST",
        url: "./Code/edit_content.php",
        data: formData,
        success: function(response) {
            console.log('Content updated successfully:', response);
            // Close the modal after successful update
            $('#editModal').css('display', 'none');
            // Reload or update content display as needed
        },
        error: function(xhr, status, error) {
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