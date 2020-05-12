<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta http-equiv="Content-Language" content="ar">
    <meta http-equiv="content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name='description' content='موقع لمشاهدة وتحميل الكورسات العربية بشكل مباشر برمجة تصميم أنظمة تشغيل صيانة لغات قواعد بيانات'>
    <meta name='keywords' content='كورسات,كورسات مجاني,مجاني,كورسات برمجة,كورسات تعليمية'>
    <!--IE Compatibility Meta-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile Meta-->
    <style itemscope itemtype="http://schema.org/Thing" itemref="i1a i1b"></style>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta property="og:title" content="wikicourses.net Free Courses" />
    <meta property="og:url" content="https://www.wikicourses.net/" />
    <meta property="og:image" content="https://www.wikicourses.net/images/wikicourses-og.png" />
    <meta property="og:description" content="موقع لمشاهدة وتحميل الكورسات العربية بشكل مباشر">
    <meta property="og:type" content="website">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/devicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/loader.css')}}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">

    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.min.js')}}assets/js/"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "courses",
  "name" : "wikicourses.net Free Courses",
 "url" : "hhttps://www.wikicourses.net/",
 "sameAs" : [
   "https://twitter.com/mutaz_hakmi",
   "https://www.facebook.com/mutaz.programs"
   ]
}
</script>
</head>

<body>
@include('main.Loader')
<script>
    var siteUrl = "https://wikicourses.net/";
</script>
<!-- Header And Navbar -->
<!--Navbar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

            <div class="navbar-header TopRight">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ourNavbar" style="margin-top: -9px;">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand coursat-logo-main" href="/" ><img style="margin-right: -22px;" src="{{asset('images/logo.png')}}"  alt="كورسات" /></a>
                <a class="navbar-brand coursat-logo-mobile" href="/"><img src="{{asset('images/logo-mobile.png')}}" alt="كورسات" /></a>
            </div>



            <div class="collapse navbar-collapse" id="ourNavbar" style="margin-top: -8px;">
                <ul class="nav navbar-nav navbar-right ">
                    <div class="mobile-search hidden-lg hidden-md hidden-sm">
                        <div class="container">
                            <form action="/search" method="get" role="search">
                                <input class="form-control" type="text" name="query" placeholder="أكتب كلمة البحث ..." required>
                            </form>
                        </div>
                    </div>
                    <!-- New -->
                    <li class="nav-item"><a class="nav-link" href="/"><i class="fa fa-home"></i> الرئيسية</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/MainCourse" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-server"></i>
                            تصنيفات الكورسات
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu categories-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach(\App\Models\MainCater::limit(9)->orderBy('forNav','asc')->get() as $coco)
                            <li class="dropdown-submenu">
                                <a href="/MainCourse/{{$coco->title_en}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="{{$coco->icon_link}}"></i>
                                    {{$coco->title}}
                                    <span class="fa fa-angle-left fa-6" style="font-weight: 700;"></span>
                                </a>
                                <ul class="dropdown-menu  categories-menu-child DexMenu" role="menu" >
                                    @foreach(\App\Models\SubCater::where('cater_id',$coco->id)->orderBy('title','asc')->get() as $subcat)
                                        <li>
                                            <a href="/Courses/{{$coco->title_en}}/{{$subcat->title_en}}" title="{{$subcat->title}}" class="liMenu dropdown-item" >
                                                {{$subcat->title}}
                                                <i class="{{$subcat->logo}} colored left"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/contact-us"><i class="fa fa-gift"></i> اقترح كورس</a>
                    <li class="nav-item"><a class="nav-link" href="/contact-us"><i class="fa fa-coffee"></i>   اطلب كورس</a>
                    <li class="nav-item"><a class="nav-link" href="/privacy-policy"><i class="fa fa-diamond "></i> سياسة الخصوصية </a>
                    <li class="nav-item"><a class="nav-link" href="/contact-us"><i class="fa fa-envelope"></i>  اتصل بنا</a>
                    <!-- New -->
                    <!--
                    @foreach(\App\Models\MainCater::orderBy('forNav','asc')->get() as $coco)
                        <li class="dropdown">
                            <a href="/MainCourse/{{$coco->title_en}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="{{$coco->icon_link}}"></i>
                                {{$coco->title}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu categories-menu DexMenu" role="menu" style="    margin-top: -8px;">

                                @foreach(\App\Models\SubCater::where('cater_id',$coco->id)->orderBy('title','asc')->get() as $subcat)
                                    <li>
                                        <a href="/Courses/{{$coco->title_en}}/{{$subcat->title_en}}" title="{{$subcat->title}}" class="liMenu">
                                            {{$subcat->title}}
                                            <i class="{{$subcat->logo}} colored left"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    -->
                </ul>

                <ul class="nav navbar-nav navbar-left " style=" position: absolute; top: -7px; left: 6%; " >
                    <li class="hidden-xs" data-toggle="tooltip" data-placement="bottom" title="البحث">
                        <a href="javascript:;" id="search-button"><i class="fa fa-search fa-lg"></i></a>
                    </li>
                </ul>

            </div>


    </div>

    <div id="search-bar">
        <div class="container">
            <form action="{{url('search')}}" id="search-form" method="get" role="search">
                <input class="form-control" id="search-input" type="text" name="query" placeholder="أكتب كلمة البحث ..." required/>
            </form>
        </div>
    </div>

</nav>


