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
            }
        });
        
    });
});