<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Post Layout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./lib/style/styles.css">
    <link rel="stylesheet" href="./lib/style/style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

    <style>
            .nav-link
            {
                display: flex;
                margin-bottom: 28px;
                margin-top: 0px;
            }
    </style>
</head>

<body>
<?php
session_start();

if (!isset($_SESSION['auth_user_id'])) {

    header("Location: login.php");

}
?>
    <aside class="sidebar">
        <div class="SiteLogoContainer">
            <img src="./lib/style/images/instagramLogoLetter.png" alt="Instagram Logo" class="imgcontainer">
        </div>
        <nav class="navigation">
            <div class="icon-bar">
                <a href="#" class="nav-link"><i class="fas fa-home"></i>Home</a>
                <a href="#" class="nav-link"><i class="fas fa-search"></i> Search</a>
                <a href="#" class="nav-link"><i class="fas fa-compass"></i> Explore</a>
                <a href="#" class="nav-link"><i class="fas fa-film"></i> Reels</a>
                <a href="#" class="nav-link"><i class="fas fa-paper-plane"></i> Messages</a>
                <a href="#" class="nav-link"><i class="fas fa-bell"></i> Notifications</a>
                <a class="nav-link" ata-bs-toggle="modal" data-bs-target="#exampleModal"><i class=" fas fa-plus-square"data-bs-toggle="modal" data-bs-target="#exampleModal"></i> Create</a>
                <a href="#" class="nav-link"><i class="fas fa-user"></i> <?php if (isset($_SESSION['authuser_name'])) {
                                                                                echo $_SESSION['authuser_name'];
                                                                            } else {
                                                                                echo 'fail';
                                                                            } ?></a>
                <a href="./Code/logout.php">Logout</a>
            </div>

        
            <div class="bnav">
                <div class="thread">
                    <a href="#" class="nav-link"><i class="fas fa-comment-dots"></i> Threads</a>
                </div>
                <div class="more">
                    <a href="#" class="nav-link"><i class="fas fa-ellipsis-h"></i> More</a>
                </div>
            </div>
        </nav>
    </aside>
</div>
<!-- Button trigger modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form method="POST" action="./Code/content.php" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="mb-3">
              <label for="text" class="form-label">Content Name</label>
              <input type="text" class="form-control" name="content" id="content">
          </div>
          <div class="mb-3">
              <div class="input-group">
                  <input type="file" class="form-control fileImg" name="fileImg[]" accept=".jpg, .jpeg, .png" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required multiple>
              </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary upload-button">Submit</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>