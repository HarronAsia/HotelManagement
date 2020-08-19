<!--********************************************************************************* Hotel Place *******************************************************-->
<div class="container-fluid">
    <h3 class="h3">Browse by property area </h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider" class="owl-carousel">
                @foreach($regions as $region)
                <div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            @if($region->banner == NULL)
                            <img src="{{asset('storage/default.png')}}" class="img" alt="preview Avatar Image" style="width: 200px;height:200px;">
                            @else
                            <img src="{{asset('storage/region/'.$region->title.'/'.$region->banner.'/')}}" class="img" alt="preview Avatar Image" style="width: 200px;height:200px;">
                            @endif
                        </a>
                    </div>
                    <div class="post-review">
                        <h2 class="post-title"><a href="#">{{$region->title}}</a></h2>
                        <p class="post-description">
                            {{$region->hotels->count()}} properties
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--********************************************************************************* Hotel Place *******************************************************-->