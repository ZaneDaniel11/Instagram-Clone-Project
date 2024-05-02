<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./lib/style/Sign-Up.css">
</head>
<body>
    
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Overpass+Mono" rel="stylesheet">

<div id="wrapper">
  <div class="main-content">
    <div class="header">
      <img src="https://i.imgur.com/zqpwkLQ.png" />
    </div>
    <form action="./Code/login.php" class="form" method="POST">
    <div class="l-part">
      <input type="text" placeholder="Username" name="username"  class="input-1" />
      <div class="overlap-text">
        <input type="password" placeholder="Password" name="password" class="input-2" />
        <a href="#">Forgot?</a>
      </div>
      <input type="submit" value="Log in" name="login_btn" class="btn" />
    </div>
    </form>
  </div>
  <div class="sub-content">
    <div class="s-part">
      Don't have an account?<a href="#">Sign up</a>
    </div>
  </div>
</div>
</body>
</html>