$(document).ready(function () {
    
    // alert('Commment js');

    $(document).on('click','.comment_btn', function (e) {
        e.preventDefault();

        let clicked = $(this);
        let comment = clicked.closest('.add-comment').find('.comment-input').val();
        let content_id = clicked.closest('.add-comment').find('.comment_btn').val();

        let data = {
            'comment':comment,
            'content_id':content_id,
            'comment_submit':true
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

    $(document).on('click','.view_comment_btn',function (e) {
        e.preventDefault();

        var click = $(this);

        var show_comment = click.val();

        var data = {
            'show_comment':show_comment,
            'show_comment_btn':true
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
                  <button class="btn btn-primary edit_comment._btn" value="'+value.comments.comment_id+'">Edit</button>\
                 <button class="btn btn-success delete_comment_btn" value="'+value.comments.comment_id+'">Delete</button>\
                  <div class="ml-4 reply_section"></div>\
                 </div>\
                  ');
                });
                console.log(response);
            }
        });
            
    });

    $(document).on('click','.view_comment_btn', function (e) {
        e.preventDefault();
        $('.comment-container').html("")
     });

    
     $(document).on('click','.delete_comment_btn', function (e) {
        e.preventDefault();

        var click = $(this);
        var delete_comment = click.val();
        
        var data = {
            'delete_comment_id':delete_comment,
            'delete_comment':true
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