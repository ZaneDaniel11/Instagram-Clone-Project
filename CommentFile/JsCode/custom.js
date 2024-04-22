$(document).ready(function () {

  load()
//   function load() {
//     $.ajax({
//         type: "POST",
//         url: "./Code/add-Comment.php",
//         data: {
//             'comment_load_data': true,
          
//         },
//         success: function (response) {
//             console.log("AJAX request successful. Response:", response);

//             if (typeof response === 'string') {
//                 response = response.trim(); // Trim the response if it's a string
//             }

//             // Check if response is not empty and is a valid JSON string
//             if (response && isValidJsonString(response)) {
//                 var responseData = JSON.parse(response);
//                 // Handle the parsed JSON data as needed
//                 console.log("Parsed JSON data:", responseData);

//                 // Append new content based on response data
//                 responseData.forEach(function(item) {
//                     $('.comment-container').append('<div class="reply_box border p-2 mb-2">\
//                         <h6 class="border-bottom d-inline">' + item.user.fullName + '</h6>\
//                         <p class="para">' + item.cmt.msg + '</p>\
//                         <button class="btn btn-primary reply_btn">Reply</button>\
//                         <button class="btn btn-success view_reply_btn">View reply</button>\
//                         <div class="ml-4 reply_section"></div>\
//                     </div>');
//                 });
//             } else {
//                 console.log("Invalid or empty response:");
//             }
//         },
//         error: function (xhr, status, error) {
//             console.log("Error:", xhr.responseText);
//         }
//     });
// }

// // Function to check if a string is a valid JSON
// function isValidJsonString(str) {
//     try {
//         JSON.parse(str);
//         return true;
//     } catch (e) {
//         return false;
//     }
// }

  // Load_comment();
  // load();
  function load()
  {
    $.ajax({
      type: "POST",
      url: "./Code/add-Comment.php",
      data: {
        'comment_load_data': true
      },
     
      success: function (response) {
  
       $('.comment-container').html("");
        $.each(response, function (key, value) { 
          $('.comment-container').
          append('<div class="reply_box border p-2 mb-2">\
          <h6 class="border-bottom d-inline"> '+value.user['fullName']+' : '+value.cmt['commented_on']+' </h6>\
           <p class="para">'+value.cmt['msg']+'</p>\
          <button class="btn btn-primary reply_btn">Reply</button>\
         <button class="btn btn-success view_reply_btn">View reply</button>\
          <div class="ml-4 reply_section"></div>\
         </div>\
          ');
        });
      console.log(response);
  
      }
    });
  }
  // function Load_comment() {
  //   $.ajax({
  //     type: "POST",
  //     url: "./Code/add-Comment.php",
  //     data: {
  //       'comment_load_data': true
  //     },
  //     success: function (response) {
  //       console.log("AJAX request successful. Response:", response);
  
       
  //       if (response && response.length > 0) {
  //         response.forEach(function (commentData) {
  //           var user = commentData.user;
  //           var comment = commentData.cmt;
  
  //           var commentHtml = '<div class="reply_box border p-2 mb-2">';
  //           commentHtml += '<h6 class="username">' + user.username + '</h6>';
  //           commentHtml += '<p class="para">' + comment.msg + '</p>';
  //           commentHtml += '<button class="reply_btn">Reply</button>';
  //           commentHtml += '<button class="view_reply_btn">View reply</button>';
  //           commentHtml += '<div class="ml-4 reply_section"></div>';
  //           commentHtml += '</div>';
  
  //           $('.comment-container').append(commentHtml);
  //         });
  //       } else {
  //         console.log("No comments available.");
  //       }
  //     },
  //     error: function (xhr, status, error) {
  //       console.log("Error:", xhr.responseText);
  //     }
  //   });
  // }


  
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
  