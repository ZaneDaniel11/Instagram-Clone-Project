$(document).ready(function () {

    function load_notification()
    {
        let data ={
            'load-notif':true
        }
        $.ajax({
            type: "POST",
            url: "./Code/notification.php",
            data: data,
            success: function (response) {
                // console.log(response);
                $('.notif-parent-container').html("");
                $.each(response, function (key, value) { 
                    $('.notif-parent-container').append
                    (' <div class="notif-child-container">\
                    <div class="notif-container">\
                        <h2>'+value.notif.notif+'</h2>\
                    </div>\
                </div>');
                     
                });

            }
        });
    }
    load_notification()
});