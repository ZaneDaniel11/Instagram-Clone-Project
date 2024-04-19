<?php 
session_start();
include('Include/header.php');
include('Include/navbar.php');
?>
<?php
if(isset($_SESSION['status']))
{
    ?><div class="alert"><?=$_SESSION['status']?></div>
    <?php
}

?>

  <h4><?php if(isset($_SESSION['authuser_name'])){ echo $_SESSION['authuser_name']; }
  else
  {
    echo'fail';
  }?></h4>

<?php 
include('Include/footer.php');
?>