<link href="{{ asset('css/HomePage/category.css') }}" rel="stylesheet" type="text/css">
<!--********************************************************************************* Bed Category *******************************************************-->
<div class="container-fluid">
    <div class="grid">
        <div class="row">
            <h3>All Categories</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <figure class="effect-ravi">
                    <img src="https://picsum.photos/1000/800/?random" alt="img17" />
                    <figcaption>
                        <h2>{{__('Single Bed')}}</h2>
                        <p>
                            <a href="{{route('category.index',['locale'=>app()->getLocale(),'category'=>'Single Bed'])}}"><i class="fa fa-search"></i></a>
                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4">
                <figure class="effect-ravi">
                    <img src="https://picsum.photos/1000/801/?random" alt="img25" />
                    <figcaption>
                        <h2>{{__('Double Bed')}}</h2>
                        <p>
                            <a href="{{route('category.index',['locale'=>app()->getLocale(),'category'=>'Double Bed'])}}"><i class="fa fa-search"></i></a>

                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4">
                <figure class="effect-ravi">
                    <img src="https://picsum.photos/1000/802/?random" alt="img25" />
                    <figcaption>
                        <h2>{{__('Queen Size Bed')}}</h2>
                        <p>
                            <a href="{{route('category.index',['locale'=>app()->getLocale(),'category'=>'Queen Size Bed'])}}"><i class="fa fa-search"></i></a>

                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <figure class="effect-ravi">
                    <img src="https://picsum.photos/1000/804/?random" alt="img25" />
                    <figcaption>
                        <h2>{{__('King Size Bed')}}</h2>
                        <p>
                            <a href="{{route('category.index',['locale'=>app()->getLocale(),'category'=>'King size Bed'])}}"><i class="fa fa-search"></i></a>

                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col">
                <figure class="effect-ravi">
                    <img src="https://picsum.photos/1000/805/?random" alt="img25" />
                    <figcaption>
                        <h2>{{__('Super King Size Bed')}}</h2>
                        <p>
                            <a href="{{route('category.index',['locale'=>app()->getLocale(),'category'=>'Super Kind Size Bed'])}}"><i class="fa fa-search"></i></a>

                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <figure class="effect-ravi">
                    <img src="https://picsum.photos/2000/300/?random" alt="img25" />
                    <figcaption>
                        <h2>{{__('Californa King Bed')}}</h2>
                        <p>
                            <a href="{{route('category.index',['locale'=>app()->getLocale(),'category'=>'California king bed'])}}"><i class="fa fa-search"></i></a>

                        </p>
                    </figcaption>
                </figure>

            </div>
        </div>

    </div>

</div>
<!--*********************************************************************************  Bed Category  *******************************************************-->