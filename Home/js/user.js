$(document).ready(function () {

    load_users_follow();

    // Load users
    function load_users_follow() {
        let data = {
            'load_user': true
        }
        $.ajax({
            type: "POST",
            url: "./Code/follow.php",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('.followers_container').html("");

                $.each(response, function (key, value) {
                    $('.followers_container').append('<div class="user-follow-con">\
                        <p>' + value.users['name'] + '</p>\
                       <p> <a href="profile.php?userid=' + value.users['user_id'] + '" class="view_profile">view</a></p>\
                        <button class="follow follow_btn" value="' + value.users['user_id'] + '">Follow</button>\
                    </div>');
                });
            }
        });
    }

    // Follow button
    $(document).on('click', '.follow_btn', function (e) {
        e.preventDefault();

        let click = $(this);
        let userid = click.val();

        let data = {
            'userid': userid,
            'follow_btn': true
        }

        $.ajax({
            type: "POST",
            url: "./Code/follow.php",
            data: data,
            success: function (response) {
                alert(response);
            }
        });
    });

});
