$(document).ready(function() {
    $("#comment_image").change(function() {

        $('#image_preview').html("");

        var total_file = document.getElementById("comment_image").files.length;

        for (var i = 0; i < total_file; i++)

        {

            $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style='padding-left:10px;width:250px; height:250px;'>");

        }

    });


    $(".container-fluid .row  .col-md-4 #filename").change(function() {

        $('#news-slider2 .post-slide2 .post-img #image_preview').html("");

        var total_file = document.getElementById("filename").files.length;

        for (var i = 0; i < total_file; i++)

        {

            $('#news-slider2 .post-slide2 .post-img #image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style='padding-left:10px;width:250px; height:250px;'>");

        }

    });

    $('#form').ajaxForm(function()

        {

            alert("Uploaded SuccessFully");

        });

});
//******************************************** Room description *************************************************************************************************************/