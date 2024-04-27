$(document).ready(function() {

    $('.loginForm').submit(function(event) {
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
            $.ajax({
                url: './Code/login.php', 
                method: 'POST',
                data: { username: username, password: password },
                success: function(response) {
                    if (response === 'success') {
                    
                        window.location.href = './Home/Main-Page.html';
                    } else {
                        alert('wrong shit');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + status + ' - ' + error);
                }
            });
       
    });
});


    $('#logoutBtn').click(function() {
        $.ajax({
            url: '../Code/logout.php', 
            method: 'GET',
            success: function() {
                out
                $('#loginForm').show();
                $('#logoutBtn').hide();
                alert('Logout successful!');
            }
        });
    });

