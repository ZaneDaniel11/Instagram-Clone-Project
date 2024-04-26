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
                if (Array.isArray(response)) { // Check if response is an array
                    response.forEach(function (value) {
                        console.log(value.content.image); // Debugging output

                        let imagesHTML = '';
                        if (Array.isArray(value.content.image)) { // Check if image data is an array
                            value.content.image.forEach(function (image) {
                                imagesHTML += '<img src="./uploads/' + image + '" alt="image">';
                            });
                        } else {
                            
                            imagesHTML += '<img src="./uploads/' + value.content.image + '" alt="image">';
                        }

                        let contentHTML = '<div class="col-md-8">\
                            <div class="card">\
                                <div class="card-header d-flex justify-content-between">\
                                    <h4>' + value.user.fullName + '</h4> ' + value.content.created + '<label type="button" class="delete_content">delete</label>\
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


    
});
