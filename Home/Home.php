<?php
session_start();
include('./inputs/header.php');
?>
<style>
  .post-header {
    display: flex;
    justify-content: space-between;
  }

  .content-container {
    margin-top: 40px;

    border-color: #858585;
    border-style: solid;
    border-width: 1px;
    border-radius: 20px;
  }

  .container {
    width: 800px;
    background-color: none;
    border-style: none;
  }
</style>
<div class="container" style="display: block;">

  <div class="content-container">

  </div>

  <div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Content</h2>
        <form id="editForm">
            <input type="text" id="editContentId" name="content_id">
            <label for="editUsername">Username:</label>
            <input type="text" id="editContent" name="content" required><br>
            <label for="editImage">Image URL:</label>
            <input type="text" id="editImage" name="image_url"><br>
            <!-- Add more input fields as needed -->
            <button type="submit">Update</button>
        </form>
    </div>
</div>

</div>

<?php
include('./inputs/footer.php');
?>