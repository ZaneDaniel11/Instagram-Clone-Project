$(document).ready(function () {
    
    load_users_follow();
// Load user 
    function load_users_follow()
    {
        let data = {
            'load_user':true
        }
        $.ajax({
            type: "POST",
            url:  "./Code/follow.php",
            data: data,
            success: function (response) {
                console.log(response);
                $('.followers_container').html("");

                $.each(response, function (key, value) { 

                    $('.followers_container').append('<div class="user-follow-con">\
                    <p>'+value.users['name']+'</p> <p value="'+value.users.user_id+'">view</p> <button class="follow follow_btn" value ='+value.users['user_id']+'>Follow</button>\
                </div>\
                    ');
                     
                });

            }
        });
    }

// Follow button
    $(document).on('click','.follow_btn', function (e) {
        e.preventDefault();

        let click = $(this);

        $userid = click.val();

        let data = {
            'userid':$userid,
            'follow_btn':true
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