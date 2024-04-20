$(document).ready(function () {
    $(".add_comment_btn").click(function (e) {
      e.preventDefault();
  
      var msg = $("#comment_textbox").val();
      var isError = false;
  
      if ($.trim(msg).length == 0) {
        $("#error_status").text("Please type a comment");
        isError = true;
      } else {
        $("#error_status").text("");
      }
  
      if (isError) {
        return false;
      } else {
        var data = {
          'msg': msg,
          'add_comment': true,
        };
  
        $.ajax({
          type: "POST",
          url: "./Code/add-Comment.php",
          data: data,
          success: function (response) {
            alert(response);
          
            $(".comment_textbox").val("");
          },
          error: function () {
            alert("Error occurred while adding the comment.");
          }
        });
      }
    });
  });
  