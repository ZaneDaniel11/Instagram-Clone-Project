$(document).ready(function() {
    function getUserIDFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('userid');
    }

    function headerusercontent(user_id) {
        if (user_id) {
            $.ajax({
                type: "POST",
                url: "./Code/profile.php",
                data: { user_id: user_id },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('.profile-content-container').empty(); // Clear existing content

                    if (Array.isArray(response)) {
                        response.forEach(function(value) {
                            console.log(value.content.image);

                            let imagesHTML = '';
                            let images = JSON.parse(value.content.image);

                            if (images.length > 1) {
                                images.forEach(function(image) {
                                    imagesHTML += '<div class="image-Container d-flex align-content-stretch flex-nowrap"><img src="Code/uploads/' + image + '" alt="image1"></div>';
                                });
                            } else {
                                imagesHTML += '<img src="Code/uploads/' + images + '" alt="image">';
                            }

                            let contentHTML = '\
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
                                <div class="post-Container d-flex flex-nowrap">\
                                    ' + imagesHTML + '\
                                </div>\
                                <div class="post-actions"></div>\
                                <div class="post-likes">\
                                    <input type="hidden" class="poster_id" value="'+value.content.poster_id+'"></input>\
                                    <button class="like_btn" value="'+value.content.content_id+'">like</button>\
                                    <p>' + value.content.content_like + ' likes</p>\
                                </div>\
                                <div class="post-caption">\
                                    <span class="username">' + value.content.poster_name + '</span>\
                                    <p class="content_edit">' + value.content.content + '</p>\
                                </div>\
                                <div class="post-comments"></div>\
                                <div class="post-timestamp">' + value.content.created + '\
                                    <button class="post-btn view_comment_btn" value="'+value.content.content_id+'">view Comment</button>\
                                </div>\
                                <div class="add-comment">\
                                    <input type="hidden" class="content-id" value="'+value.content.poster_id+'"></input>\
                                    <input type="text" placeholder="Add a comment..." class="comment-input">\
                                    <button class="post-btn comment_btn" value="'+value.content.content_id+'">Post</button>\
                                </div>\
                                <div class="comment-container"></div>';

                            $('.profile-content-container').append(contentHTML);
                        });
                    } else {
                        console.log('Invalid response format.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    }

    function loadUserContent(user_id) {
        if (user_id) {
            $.ajax({
                type: "POST",
                url: "./Code/profile.php",
                data: { user_id: user_id },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('.container').empty(); // Clear existing content

                    if (Array.isArray(response)) {
                        response.forEach(function(value) {
                            let contentHTML = '<div class="profile">\
			<div class="profile-image">\
				<img src="https://vectorified.com/images/no-profile-picture-icon-10.jpg" alt="">\
			</div>\
			<div class="profile-user-settings">\
				<h1 class="profile-user-name">'+value.content.user_name+'</h1>\
				<button class="btn profile-edit-btn">Edit Profile</button>\
				<button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>\
			</div>\
			<div class="profile-stats">\
				<ul>\
					<li><span class="profile-stat-count">164</span> posts</li>\
					<li><span class="profile-stat-count">188</span> followers</li>\
					<li><span class="profile-stat-count">206</span> following</li>\
				</ul>\
			</div>\
			<div class="profile-bio">\
				<p><span class="profile-real-name">Jane Doe</span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>\
			</div>\
		</div>';

                            $('.container').append(contentHTML);
                        });
                    } else {
                        console.log('Invalid response format.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    }
    let user_id = getUserIDFromURL();
    headerusercontent(user_id);
    loadUserContent(user_id);
});
