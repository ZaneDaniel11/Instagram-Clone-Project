$(document).ready(function () {
    Content();

    function Content() {
        let data = {
            'Load_Content': true
        };

        $.ajax({
            type: "POST",
            url: "./Code/content.php",
            data: data,
            success: function (response) {
                console.log(response);
                $('.content-container').empty(); 

                if (Array.isArray(response)) {
                    response.forEach(function (value) {
                        console.log(value.content.image);

                        let imagesHTML = '';
                        var images = JSON.parse(value.content.image);

                        images.forEach(function (image, index) {
                            imagesHTML += '<div class="image-item" data-index="' + index + '"><img src="Code/uploads/' + image + '" alt="image"></div>';
                        });

                        let contentHTML = '\
                            <div class="post">\
                                <div class="post-header d-flex justify-content-between">\
                                    <div><img src="../car-5186291.jpg" alt="Profile Picture" class="profile-pic">\
                                        <span class="username">' + value.content.poster_name + '</span>\
                                    </div>\
                                    <div>\
                                        <button class="edit_content_btn" data-content=\'' + JSON.stringify(value.content) + '\' value="' + value.content.content_id + '">edit</button>\
                                    </div>\
                                    <div>\
                                        <button class="delete_content_btn" value="' + value.content.content_id + '">X</button>\
                                    </div>\
                                </div>\
                                <div class="post-images-wrapper">\
                                    <button class="nav-btn left-btn">←</button>\
                                    <div class="post-images d-flex flex-wrap">\
                                        ' + imagesHTML + '\
                                    </div>\
                                    <button class="nav-btn right-btn">→</button>\
                                </div>\
                                <div class="post-actions">\
                                </div>\
                                <div class="post-likes">\
                                <input type="hidden" class="poster_id" value="'+value.content.poster_id +'"></input>\
                                <button class="like_btn" value="'+value.content.content_id +'">like</button>\
                                <p> '+value.content.content_like+' likes</p>\
                                </div>\
                                <div class="post-caption">\
                                    <span class="username">' + value.content.poster_name + '</span>\
                                    <p class="content_edit" >' + value.content.content + '</p>\
                                </div>\
                                <div class="post-comments">\
                                </div>\
                                <div class="post-timestamp">\
                                    ' + value.content.created + '\
                                    <button class="post-btn view_comment_btn" value="'+value.content.content_id+'" >view Comment</button>\
                                </div>\
                                <div class="add-comment">\
                                    <input type="hidden" class="content-id" value="'+value.content.poster_id+'"></input>\
                                    <input type="text" placeholder="Add a comment..." class="comment-input">\
                                    <button class="post-btn comment_btn" value="'+value.content.content_id+'">Post</button>\
                                </div>\
                                <div class="comment-container">\
                                </div>\
                            </div>\
                        ';

                        $('.content-container').append(contentHTML);
                    });

               
                    $('.left-btn').on('click', function() {
                        navigateImages($(this).siblings('.post-images'), -1);
                    });

                    $('.right-btn').on('click', function() {
                        navigateImages($(this).siblings('.post-images'), 1);
                    });

             
                    $(document).on('keydown', function(event) {
                        if (event.key === 'ArrowLeft') {
                            $('.left-btn:visible').click();
                        } else if (event.key === 'ArrowRight') {
                            $('.right-btn:visible').click();
                        }
                    });
                } else {
                    console.log('Invalid response format.');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }


    function navigateImages(container, direction) {
        let images = container.find('.image-item');
        let currentIndex = images.filter(':visible').index();
        images.hide();
        let newIndex = (currentIndex + direction + images.length) % images.length;
        images.eq(newIndex).show();
    }


    $(document).on('content-loaded', function() {
        $('.post-images').each(function() {
            $(this).find('.image-item').hide().first().show();
        });
    });


    $(document).on('click','.like_btn', function (e) {
        e.preventDefault();
        let click = $(this);
        let poster_id = click.closest('.post-likes').find('.poster_id').val();
        let content_id = click.val();
        let like = 0;
        
        let data = {
            'poster_id':poster_id,
            'content_id':content_id,
            'content_like':like,
            'like_btn':true
        };
        
        $.ajax({
            type: "post",
            url: "./Code/like.php",
            data: data,
            success: function (response) {
                alert(response);
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
