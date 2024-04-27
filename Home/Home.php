<?php
session_start();
include('./inputs/header.php');
?>

<div class="container">
  <div class="post-header">
    <img src="../car-5186291.jpg" alt="Profile Picture" class="profile-pic">
    <span class="username">yoww</span>
  </div>
  <img src="../car-5186291.jpg" alt="Post Image" class="post-image">
  <div class="post-actions">
    <!-- Icons for like, comment, send -->
  </div>
  <div class="post-likes">
    100 likes
  </div>
  <div class="post-caption">
    <span class="username">yoww</span>
    #style
  </div>
  <div class="post-comments">
    <!-- Comments go here -->
  </div>
  <div class="post-timestamp">
    1 hour ago
  </div>
  <div class="add-comment">
    <input type="text" placeholder="Add a comment..." class="comment-input">
    <button class="post-btn">Post</button>
  </div>
</div>

<?php
include('./inputs/footer.php');
?>