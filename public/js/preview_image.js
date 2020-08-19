$(document).ready(function() {
    /**********************************Image Preview *******************************/
    $(".avatar_image #image").change(function(e) {
        e.preventDefault();
        PreviewImage(this);
    });

    $(".room_image #roomimage").change(function(e) {
        e.preventDefault();
        PreviewImage(this);
    });

    function PreviewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image_preview_container').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    /**********************************Image Preview *******************************/
});