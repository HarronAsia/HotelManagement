<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Assignment 2</title>


    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
 
        body {
            background-color: #f7f8f9;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid rgba(0, 34, 51, 0.1);
            box-shadow: 2px 4px 10px 0 rgba(0, 34, 51, 0.05), 2px 4px 10px 0 rgba(0, 34, 51, 0.05);
            border-radius: 0.15rem;
        }

        /* Tabs Card */

        .tab-card {
            border: 10px solid #eee;
        }

        .tab-card-header {
            background: none;
        }

        /* Default mode */
        .tab-card-header>.nav-tabs {
            border: none;
            margin: 0px;
        }

        .tab-card-header>.nav-tabs>li {
            margin-right: 2px;
        }

        .tab-card-header>.nav-tabs>li>a {
            border: 0;
            border-bottom: 2px solid transparent;
            margin-right: 0;
            color: #737373;
            padding: 2px 15px;
        }

        .tab-card-header>.nav-tabs>li>a.show {
            border-bottom: 2px solid #007bff;
            color: #007bff;
        }

        .tab-card-header>.nav-tabs>li>a:hover {
            color: #007bff;
        }

        .tab-card-header>.tab-content {
            padding-bottom: 0;
        }

        .coral {
            border-left-style: solid;
            border-left-color: blue;
        }
    </style>
</head>

<body>

    <div class="box">
        <div class="container-fluid">
            <div class="row">

                <div class="card mt-3 tab-card">
                    <div class="card-header tab-card-header">
                        <div class="row">
                            <div class="col-lg-9 coral">
                                <h4>カナンデについて</h4>
                                <p class="text-primary">About Kanande</p>
                            </div>
                            <div class="col-lg-3 ">
                                <p class="bg-info">
                                    <i class="fab fa-youtube"></i> &ensp;
                                    その他の動画
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="width: 350px; height:120px;">
                                <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt="" style="width: 250px; height:50px;">
                                <h5><a href="#"><u>新しい1</u></a></h5>
                                <p>新しい1の新しい詳細は次のとおりです</p>
                            </div>
                            <div class="col-md-4" style="width: 250px; height:120px;">
                                <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt="" style="width: 250px; height:50px;">
                                <h5><a href="#"><u>新しい2</u></a></h5>
                                <p>新しい2の新しい詳細は次のとおりです。</p>
                            </div>
                            <div class="col-md-4" style="width: 250px; height:120px;">
                                <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt="" style="width: 250px; height:50px;">
                                <h5><a href="#"><u>新しい3</u></a></h5>
                                <p>新しい3の新しい詳細は次のとおりです。</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!--Latest JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
    <!--Latest JS, Popper.js, and jQuery -->


</body>

</html>