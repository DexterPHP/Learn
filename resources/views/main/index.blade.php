@include('pages.Main_header')






<title>  ويكي كورس | كورسات مجانية مع تحميل مباشر </title>
<section class="coursat-intro text-center" >
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
        <div class="container intro-bg">
            <div class="mySearch">
                <h2>مجال البحث كبير معنا، فما الذي تبحث عنه؟</h2>
                <div class="search-box">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-lg-offset-* col-md-8 col-md-offset-2 col-md-offset-* col-sm-12 col-xs-12">
                            <div id="search-form">
                                <form role="/search" method="get" id="searchform" action="search">
                                    <input type="text" class="search-input" name="query" placeholder="اكتب هنا لتبدأ البحث في الكورسات ..." required>
                                    <button type="submit" id="searchsubmit" class="search-icon"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="slider" class="slider">
                <div class="slider-item active" style="background-image: url({{asset('https://wikicourses.net/images/0.jpg')}})"></div>
                <div class="slider-item" style="background-image: url({{asset('https://wikicourses.net/images/networking.jpg')}})"></div>
                <div class="slider-item" style="background-image: url({{asset('https://wikicourses.net/images/1.jpg')}})"></div>
                <div class="slider-item" style="background-image: url({{asset('https://wikicourses.net/images/2.jpg')}})"></div>
                <div class="slider-item" style="background-image: url({{asset('https://wikicourses.net/images/intro-bg.jpg')}})"></div>
                <div class="slider-panel">
                    <div class="slider-panel__navigation">
                        <i class="fa fa-circle indicator active" data-slide-to="0"></i>
                        <i class="fa fa-circle indicator" data-slide-to="1"></i>
                        <i class="fa fa-circle indicator" data-slide-to="2"></i>
                        <i class="fa fa-circle indicator" data-slide-to="3"></i>
                        <i class="fa fa-circle indicator" data-slide-to="4"></i>
                    </div>

                </div>
            </div>


        </div>
</section>
<!-- Header And Navbar -->

<section class="categories categories-home text-center">
    <div class="container">
        <div class="big-title">
            <h2>تصنيفات الكورسات</h2>
            <div class="hr-title"></div>
        </div>


        <div class="row">

            @foreach($cater as $category)

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="/MainCourse" class="btn all-categories-btn"><i class="fa fa-mortar-board"></i>   عرض الجميع </a>
                </div>

        </div>

    </div>
</section>

<section class="courses courses-home text-center">
    <div class="container">
        <div class="big-title">
            <h2> الكورسات الأعلى تصنيفاً  </h2>
            <div class="hr-title"></div>
        </div>

        <div class="row">
            @foreach($Rand as $Randmoy)

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="course-box">
                        <div class="course-cover">
                            <a href="/c/{{$Randmoy->id}}">
                                <img src="{{$Randmoy->logo}}" alt="" />
                            </a>

                            <div class="course-instructor" data-toggle="tooltip" data-placement="top" title="المحاضر">
                                <a href="/search?query={{$Randmoy->auther}}">
                                    <i class="fa fa-graduation-cap"></i>
                                    {{$Randmoy->auther}}
                                </a>
                            </div>


                            <a href="/c/{{$Randmoy->id}}">
                                <div class="course-language" data-toggle="tooltip" data-placement="top" title="اللغة">{{$Randmoy->language}}</div>
                            </a>

                        </div>

                        <a href="/c/{{$Randmoy->id}}">
                            <div class="course-heading">
                                <div class="course-title">{{$Randmoy->title}}</div>                                                                                </div>

                        </a>

                        <a href="/c/{{$Randmoy->id}}">
                            <div class="row course-meta">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 meta-item">
                                    <div class="" data-toggle="tooltip" data-placement="top" title="مدة الكورس">
                                        <i class="fa fa-clock-o"></i>
                                        {{$Randmoy->all_length}}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 meta-item">
                                    <div class="" data-toggle="tooltip" data-placement="top" title="عدد الدروس">
                                        <i class="fa fa-play-circle"></i>
                                        {{$Randmoy->count_of_videos}}
                                    </div>
                                </div>

                            </div>
                        </a>

                        <a href="/c/{{$Randmoy->id}}">
                            <div class="course-rating" data-toggle="tooltip" data-placement="top" title="وصف قصير">
                                <div class="rating-start rating-small">
                                    @php
                                    $text    = str_replace('-',' ',$Randmoy->desc);
                                    $text    = str_replace('.',' ',$text);
                                    $exportz = explode(' ',$text);
                                    if(count($exportz) > 11){for($i =0; $i < 11 ; $i++){echo $exportz[$i].' ';}}
                                    else{for($i =0; $i < count($exportz) ; $i++){echo $exportz[$i].' '; }}
                                    @endphp
                                </div>

                            </div>
                        </a>

                    </div>
                </div>

            @endforeach

        </div>

    </div>
</section>




@include('pages.Main_footer')
