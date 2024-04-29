$(document).ready(function () {

    // Handle edit button click to open modal
$(document).on('click', '.edit_content_btn', function (e) {
    e.preventDefault();

    var clicked = $(this);
    var contentId = clicked.val();



    openEditModal(contentId, contentData.content);
});

function openEditModal(contentId, content, imageUrl) {
    $('#editContentId').val(contentId);
    $('#editContent').val(content);

    $('#editModal').modal('show'); 
}


$('#close_modal').click(function () {
    $('#editModal').modal('hide');
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
            $('#editModal').modal('hide');
        
        },
        error: function (xhr, status, error) {
            console.error('Error updating content:', status, error);
        }
    });
});

    
});
