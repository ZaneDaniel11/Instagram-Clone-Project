<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Post Layout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../lib/style/styles.css">
    <link rel="stylesheet" href="../lib/style/style2.css">

    <style>

    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="SiteLogoContainer">
            <img src="../lib/style/images/instagramLogoLetter.png" alt="Instagram Logo" class="imgcontainer">
        </div>
        <nav class="navigation">
            <div class="icon-bar">
                <a href="#" class="nav-link"><i class="fas fa-home"></i> Home</a>
                <a href="#" class="nav-link"><i class="fas fa-search"></i> Search</a>
                <a href="#" class="nav-link"><i class="fas fa-compass"></i> Explore</a>
                <a href="#" class="nav-link"><i class="fas fa-film"></i> Reels</a>
                <a href="#" class="nav-link"><i class="fas fa-paper-plane"></i> Messages</a>
                <a href="#" class="nav-link"><i class="fas fa-bell"></i> Notifications</a>
                <a href="#" class="nav-link"><i class="fas fa-plus-square"></i> Create</a>
                <a href="#" class="nav-link"><i class="fas fa-user"></i> <?php if (isset($_SESSION['authuser_name'])) {
                                                                                echo $_SESSION['authuser_name'];
                                                                            } else {
                                                                                echo 'fail';
                                                                            } ?></a>
                <a href="">Logout</a>
            </div>

            </div>
            <div class="bnav">
                <div class="thread">
                    <a href="#" class="nav-link"><i class="fas fa-comment-dots"></i> Threads</a>
                </div>
                <div class="more">
                    <a href="#" class="nav-link"><i class="fas fa-ellipsis-h"></i> More</a>
    </aside>