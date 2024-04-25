$(document).ready(function () {
  
    
    $(document).on('click', '.submit_content', function(e) {
        e.preventDefault();
        var click = $(this);
    
        var content_input = click.closest('.modal-body').find('.add_content_input').val();
        var formData = new FormData();
        var filesInput = click.closest('.modal-body').find('.fileImg');
    
        if (filesInput.length > 0 && filesInput[0].files.length > 0) {
            var files = filesInput[0].files;
    
            // Append each selected file to the FormData object
            for (var i = 0; i < files.length; i++) {
                formData.append('fileImg[]', files[i]);
            }
        }
    
        formData.append('content', content_input);
        formData.append('add_content', true);
    
        $.ajax({
            type: "POST",
            url: "./Code/Content",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting contentType
            success: function(response) {
                // Handle success response
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });
    
    });
    
});

