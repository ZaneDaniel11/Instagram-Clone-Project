<?php
session_start();
include('Include/header.php');
include('Include/navbar.php');
?>

<?php
if (isset($_SESSION['status'])) {
?><div class="alert"><?= $_SESSION['status'] ?></div>
<?php
}
?>


<!-- <div class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4>This is a Blog Heading</h4>
          </div>
          <div class="card-body">
            shesh
            <div class="main-comment">
              <div id="error_status"></div>
              <textarea class="comment_text form-control" id="comment_textbox" rows="3"></textarea>
              <button type="button" class="btn btn-primary add_comment_btn" id="add_comment_btn">Comment</button>

              <hr>

              <div class="comment-container">

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<style>
  .image-Container img
   {
      width: 100%;
      height: 100%;
  }
  .image-Container
  {
    width: 100%;
    height: 200px;
  }
</style>
<div class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4>Zane Daniel</h4> <p>20/20/24</p>
          </div>
          <div class="card-body">

            <div class="post-Container d-flex align-content-stretch flex-nowrap">
              <div class="image-Container">
                  <img src="./uploads/Picturetest.jpg" alt="">
              </div>
            </div>

            <div class="main-comment" style="margin-top: 20px;">
              <div id="error_status">

              </div>

              <p>Add Comment</p>
              <input class="comment_text form-control" id="comment_textbox"></input>

              <!-- Button Container -->
              <div class="button-Container d-flex justify-content-between" style="margin-top:20px">
              <button type="button" class="btn btn-primary add_comment_btn" id="add_comment_btn">Comment</button>
              <button class="btn btn-primary view_content_comment">View Comments</button>
              </div>
              

              <hr>

              <div class="comment-container">

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('Include/footer.php');
?>