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

<div class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4>This is a Blog Heading</h4>
          </div>
          <div class="card-body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
            <hr>
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
</div>

<?php
include('Include/footer.php');
?>