<!--********************************************************************************* Hotel Categories *******************************************************-->
<div class="container-fluid">
    <h3 class="h3">Browse by property type</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider6" class="owl-carousel">
                @foreach($categories as $category)
                <div class="post-slide6">
                    <a href="{{route('category.index',$category->title)}}">
                        <div class="post-img">
                            @if($category->banner == NULL)
                            <img src="{{asset('storage/default.png')}}" alt="img17" style="width: 450px;height:250px;" />
                            @else
                            <img src="{{asset('storage/category/'.$category->title.'/'.$category->banner.'/')}}" class="img" alt="preview Avatar Image" style="width: 450px;height:250px;">
                            @endif

                        </div>
                    </a>
                    <div class="post-review">
                        <h3 class="post-title">
                            <a href="{{route('category.index',$category->title)}}">{{$category->title}}</a>
                        </h3>
                        <p class="post-description">
                            {{$category->hotels->count()}} Properties
                        </p>
                        <a href="{{route('category.index',$category->title)}}" class="read">read more</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--********************************************************************************* Hotel Categories *******************************************************-->