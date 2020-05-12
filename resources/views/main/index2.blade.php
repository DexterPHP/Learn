@include('pages.Main_header')

<title>ويكي كورس |تصنيفات الأقسام الرئيسية</title>

<section class="coursat-intro text-center">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <div class="container intro-bg">
        <div id="slider" class="slider">
            <div class="slider-item active" style="background-image: url({{asset('images/0.jpg')}})"></div>
            <div class="slider-item" style="background-image: url({{asset('images/networking.jpg')}})"></div>
            <div class="slider-item" style="background-image: url({{asset('images/1.jpg')}})"></div>
            <div class="slider-item" style="background-image: url({{asset('images/2.jpg')}})"></div>
            <div class="slider-item" style="background-image: url({{asset('images/intro-bg.jpg')}})"></div>
            <div class="slider-panel">
                <div class="slider-panel__navigation">
                    <i class="fa fa-circle indicator active" data-slide-to="0"></i>
                    <i class="fa fa-circle indicator" data-slide-to="1"></i>
                    <i class="fa fa-circle indicator" data-slide-to="2"></i>
                    <i class="fa fa-circle indicator" data-slide-to="3"></i>
                    <i class="fa fa-circle indicator" data-slide-to="4"></i>
                </div>
                <div class="slider-panel__controls">
                    <i class="fa fa-arrow-circle-right " id="next"></i>
                    <i class="fa fa-pause" id="pause-play"></i>
                    <i class="fa fa-arrow-circle-left" id="previous"></i>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Header And Navbar -->

<section class="categories categories-home text-center">
    <div class="container">
        <div class="big-title">
            <h2> جميع تصنيفات االكورسات</h2>
            <div class="hr-title"></div>
        </div>


        <div class="row">

            @foreach($cater as $category)
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                    <a href="MainCourse/{{$category->title_en}}">
                        <div class="category-box" title="{{$category->description}}">
                            <div class="category-cover" style="background:url('{{$category->image_link}}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                                <div class="category-overlay">
                                    <div class="thumb-content">
                                        <div class="category-icon">
                                            <i class="{{$category->icon_link}}"></i>
                                        </div>
                                        <div class="category-name">{{$category->title}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach



        </div>

    </div>
</section>


@include('pages.Main_footer')
