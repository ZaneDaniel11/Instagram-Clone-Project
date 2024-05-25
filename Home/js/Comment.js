$(document).ready(function () {

    
// Add comment

    $(document).on('click','.comment_btn', function (e) {
        e.preventDefault();

        let clicked = $(this);
        let comment = clicked.closest('.add-comment').find('.comment-input').val();
        let content_id = clicked.closest('.add-comment').find('.comment_btn').val();
        let owner_id = clicked.closest('.add-comment').find('.content-id').val();

        // alert(owner_id);
        let data = {
            'owner_id':owner_id,
            'comment': comment,
            'content_id': content_id,
            'comment_submit': true
        }

        $.ajax({
            type: "POST",
            url: "./Code/comment.php",
            data: data,
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
        
    });

    // View Comment

    $(document).on('click','.view_comment_btn',function (e) {
        e.preventDefault();

        var click = $(this);
        var show_comment = click.val();

        var data = {
            'show_comment': show_comment,
            'show_comment_btn': true
        }

        $.ajax({
            type: "POST",
            url: "./Code/comment.php",
            data: data,
            success: function (response) {
                $('.comment-container').html("");
                $.each(response, function (key, value) { 
                  $('.comment-container').
                  append('<div class="reply_box border p-2 mb-2">\
                  <h6 class="border-bottom d-inline"> '+value.user['name']+'</h6>\
                   <p class="para">'+value.comments.comment+'</p>\
                  <button class="btn btn-primary edit_comment_btn data-bs-toggle="modal" data-bs-target="#editCommentModal" value="'+value.comments.comment_id+'">Edit</button>\
                 <button class="btn btn-success delete_comment_btn" value="'+value.comments.comment_id+'">Delete</button>\
                 <button class="btn btn-primary edit_comment_btn data-bs-toggle="modal" data-bs-target="" value="'+value.comments.comment_id+'">Reply</button>\
                  <div class="ml-4 reply_section"></div>\
                 </div>\
                  ');
                });
                console.log(response);
            }
        });
            
    });
// Edit Comment
    $(document).on('click', '.edit_comment_btn', function (e) {
        e.preventDefault();


        let commentText = $(this).closest('.reply_box').find('.para').text().trim();

        $(this).closest('.reply_box').find('.para').replaceWith('<input type="text" class="form-control edited-comment" value="' + commentText + '">');

       
        $(this).text('Save');
        $(this).removeClass('btn-primary edit_comment_btn').addClass('btn-success save_comment_btn');
    });


    $(document).on('click', '.save_comment_btn', function (e) {
        e.preventDefault();


        let editedComment = $(this).closest('.reply_box').find('.edited-comment').val();
        let commentID = $(this).val();


        $.ajax({
            type: "POST",
            url: "./Code/comment.php",
            data: {
                'edited_comment': editedComment,
                'comment_id': commentID,
                'edit_comment_submit': true
            },
            success: function (response) {
               
                location.reload();
            }
        });
    });

    // Delete comment button click event
    $(document).on('click', '.delete_comment_btn', function (e) {
        e.preventDefault();

        var click = $(this);
        var delete_comment = click.val();
        
        var data = {
            'delete_comment_id': delete_comment,
            'delete_comment': true
        }

        $.ajax({
            type: "POST",
            url: "./Code/comment.php",
            data: data,
            success: function (response) {
                location.reload();
            }
        });
        
     });

});
