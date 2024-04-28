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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm"  enctype="multipart/form-data" >
                    <input type="hidden" id="editContentId" name="content_id">
                    <div class="form-group">
                        <label for="editContent">Content:</label>
                        <textarea class="form-control" id="editContent" name="content" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editImage">Upload Image:</label>
                        <div class="input-group">
                            <input type="file" class="form-control fileImg" name="fileImg[]" accept=".jpg, .jpeg, .png" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required multiple>
                        </div>
                    </div>
                    <!-- Add more input fields as needed -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>
<?php
include('./inputs/footer.php');
?>