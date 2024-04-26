var res ; 

$(document).ready(function () {
    Load_Content();

    function Load_Content() {
        let data = {
            'load': true
        };

        $.ajax({
            type: "POST",
            url: "./Code/Content.php",
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                res = response; 
                if (Array.isArray(response)) { 
                    response.forEach(function (value) {
                        console.log(value.content.image); // Debugging output

                        let imagesHTML = '';
                            var images = JSON.parse(value.content.image);

                        if (images.length>1 ) { // Check if image data is an array
                            images.forEach(function (image) {
                                imagesHTML += '<img src="Code/uploads/' + image + '" alt="image1                                                        ">';
                            });
                        } else {
                            imagesHTML += '<img src="Code/uploads/'+ images + '" alt="image">';
                        }

                        let contentHTML = '<div class="col-md-8">\
                            <div class="card">\
                                <div class="card-header d-flex justify-content-between">\
                                    <h4>' + value.user.fullName + '</h4> ' + value.content.created + '<label type="button" value='+value.content.content_id+' class="delete_content_btn">delete</label>\
                                </div>\
                                <div class="card-body">\
                                    <div class="post-Container d-flex align-content-stretch flex-nowrap">\
                                        <div class="image-Container">' + imagesHTML + '</div>\
                                    </div>\
                                    <!-- Other content elements here -->\
                                </div>\
                            </div>\
                        </div>';

                        $('.content_Container').append(contentHTML);
                    });
                } else {
                    console.log('Invalid response format.');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }


    $(document).on('click','.delete_content_btn',function (e) {
        e.preventDefault();

        var clicked = $(this);

        var delete_content  = clicked.val();

        var data = {
            'content': delete_content,
            'submit_delete':true
        }
        $.ajax({
            type: "POST",
            url: "./Code/Content.php",
            data: data,
            success: function (response) {
                console.log(response)
            }
        });
        
    });
});
