<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!--Latest JQuery Light Gallery -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.3/css/lightgallery.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.3/js/lightgallery.min.js"></script>
    <!--Latest JQuery Light Gallery -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #152836
        }

        h2 {
            color: #fff;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 100;
        }
    </style>
</head>

<body class="home">
    <div class="container-fluid" style="margin-top:40px;">
        <h2>Preview Images for {{$room->room_name}}</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="filename" multiple>
            <input type="submit" class="btn btn-primary">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            @endif
        </form>

        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">

                @if($room->images == NULL)
                <li class="col-lg-3 col-sm-4 col-md-2 col-lg-2" data-responsive="{{asset('storage/default.png')}}" data-src="{{asset('storage/default.png')}}">
                    <a href="">
                        <div id="image_preview"></div>
                        <img class="img-responsive" src="{{asset('storage/default.png')}}">
                    </a>
                </li>
                $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/' . $room->room_name . '/comment' . '/' . $user->name . '/');
                @else
                @foreach($images as $image)
                <li class="col-lg-3 col-sm-4 col-md-2 col-lg-2" data-responsive="{https://sachinchoolur.github.io/lightgallery.js/static/img/1-1600.jpg}" data-src="https://sachinchoolur.github.io/lightgallery.js/static/img/1-1600.jpg">
                    <a href="">
                        <img class="img-responsive" src="https://sachinchoolur.github.io/lightgallery.js/static/img/thumb-1.jpg">
                    </a>
                </li>
                @endforeach
                <li class="col-lg-3 col-sm-4 col-md-2 col-lg-2" data-responsive="https://sachinchoolur.github.io/lightgallery.js/static/img/2-1600.jpg" data-src="https://sachinchoolur.github.io/lightgallery.js/static/img/2-1600.jpg">
                    <a href="">
                        <img class="img-responsive" src="https://sachinchoolur.github.io/lightgallery.js/static/img/thumb-2.jpg">
                    </a>
                </li>
                <li class="col-lg-3 col-sm-4 col-md-2 col-lg-2" data-responsive="https://sachinchoolur.github.io/lightgallery.js/static/img/13-1600.jpg" data-src="https://sachinchoolur.github.io/lightgallery.js/static/img/13-1600.jpg">
                    <a href="">
                        <img class="img-responsive" src="https://sachinchoolur.github.io/lightgallery.js/static/img/thumb-13.jpg">
                    </a>
                </li>
                <li class="col-lg-3 col-sm-4 col-md-2 col-lg-2" data-responsive="https://sachinchoolur.github.io/lightgallery.js/static/img/4-1600.jpg" data-src="https://sachinchoolur.github.io/lightgallery.js/static/img/4-1600.jpg">
                    <a href="">
                        <img class="img-responsive" src="https://sachinchoolur.github.io/lightgallery.js/static/img/thumb-4.jpg">
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#lightgallery').lightGallery();
        });

        $("#comment_image").change(function() {

            $('#image_preview').html("");

            var total_file = document.getElementById("comment_image").files.length;

            for (var i = 0; i < total_file; i++)

            {

                $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style='padding-left:10px;width:250px; height:250px;'>");

            }

        });

        $('#form').ajaxForm(function()

            {

                alert("Uploaded SuccessFully");

            });
    </script>

    <script src="{{ asset('js/image.js') }}"></script>
</body>

</html>