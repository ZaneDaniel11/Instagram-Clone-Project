$(document).ready(function() {
    // Login Form Submission
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: '../Code/login.php', // Adjust the URL as needed
            method: 'POST',
            data: { username: username, password: password },
            success: function(response) {
                if (response.trim() === 'success') {
                    window.location.href = '../Home/Main-Page.html'; // Example redirect
                } else {
                    alert('Login failed. Please check your credentials.');
                }
            },
            error: function(xhr, status, error) {
                alert('Error: ' + status + ' - ' + error);
            }
        });
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

