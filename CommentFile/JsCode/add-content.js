// $(document).ready(function () {
//     $(document).on('click', '.submit_content', function(e) {
//         e.preventDefault();
//         var click = $(this);
//         var content_input = click.closest('.modal-body').find('.add_content_input').val();
//         var formData = new FormData();
//         var filesInput = click.closest('.modal-body').find('.fileImg');
        
//         if (filesInput.length > 0 && filesInput[0].files.length > 0) {
//             var files = filesInput[0].files;
//             for (var i = 0; i < files.length; i++) {
//                 formData.append('fileImg[]', files[i]);
//             }
//         }
        
//         formData.append('content', content_input);
//         formData.append('add_content', true);
        
//         $.ajax({
//             type: "POST",
//             url: "./Code/Content.php",
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function(response) {
//                 console.log('shesh eror')
//                 console.log(response); // for testing, you can replace this with your logic
//             },
//             error: function(xhr, status, error) {
//                 console.log('eror')
//                 console.error(xhr.responseText); // for testing, you can replace this with your error handling logic
//             }
//         });
//     });
// });
