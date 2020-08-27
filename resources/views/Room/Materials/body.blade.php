 <!-- Post Content -->
 <p class="lead">{{$room->room_description}}</p>
 <hr>
 <div class="container-fluid">

     <div class="row">
         <div class="col-md-12">
             <div id="news-slider2" class="owl-carousel">
                 @if($room->images == NULL)

                 @else
                 <div class="post-slide2">
                     <div class="post-img">
                         <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt="">
                     </div>
                 </div>

                 <div class="post-slide2">
                     <div class="post-img">
                         <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-2.jpg" alt="">
                     </div>
                 </div>

                 <div class="post-slide2">
                     <div class="post-img">
                         <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-3.jpg" alt="">
                     </div>
                 </div>

                 <div class="post-slide2">
                     <div class="post-img">
                         <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-4.jpg" alt=""></a>
                     </div>
                 </div>
                 @endif
             </div>
         </div>
     </div>
 </div>