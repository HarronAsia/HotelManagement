<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper" class="animate">
        @include('layouts.admin.navbar')

        @yield('content')

        <!--Latest JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"></script>
        <script src="{{asset('js/admin/app.js')}}"></script>
        <script src="{{asset('js/admin/dashboard.js')}}"></script>
        <!--Latest JS, Popper.js, and jQuery -->
        <script>
            $(document).ready(function() {
                //**************************Preview User Image *************************************//
                $(".avatar_image #image").change(function(e) {
                    e.preventDefault();
                    PreviewImage(this);
                });

                $(".banner #region_banner").change(function(e) {
                    e.preventDefault();
                    PreviewImage(this);
                });

                $(".banner #category_banner").change(function(e) {
                    e.preventDefault();
                    PreviewImage(this);
                });

                $(".hotel_image #hotelimage").change(function(e) {
                    e.preventDefault();
                    PreviewImage(this);
                });

                $(".room_image #roomimage").change(function(e) {
                    e.preventDefault();
                    PreviewImage(this);
                });

                $(".bed_image #bedimage").change(function(e) {
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
                //**************************Preview User Image *************************************//

                //**************************Show Password *************************************//
                $('.pass_show').append('<span class="ptxt">Show</span>');

                $(document).on('click', '.pass_show .ptxt', function() {

                    $(this).text($(this).text() == "Show" ? "Hide" : "Show");

                    $(this).prev().attr('type', function(index, attr) {
                        return attr == 'password' ? 'text' : 'password';
                    });
                    //**************************Show Password *************************************//
                });
            });
        </script>
</body>

</html>