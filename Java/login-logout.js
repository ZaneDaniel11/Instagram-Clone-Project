$(document).ready(function() {
    // Login Form Submission
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: '../Code/login.php', // Backend script for login
            method: 'POST',
            data: { username: username, password: password },
            success: function(response) {
                if (response === 'success') {
                    // Redirect to dashboard or update UI as logged in
                    $('#loginForm').hide();
                    $('#logoutBtn').show();
                    alert('Login successful!');
                } else {
                    alert('Login failed. Please check your credentials.');
                }
            }
        });
    });

    // Logout Button Click
    $('#logoutBtn').click(function() {
        $.ajax({
            url: '../Code/logout.php', // Backend script for logout
            method: 'GET',
            success: function() {
                // Redirect to login page or update UI as logged out
                $('#loginForm').show();
                $('#logoutBtn').hide();
                alert('Logout successful!');
            }
        });
    });
});
