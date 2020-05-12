@include('pages.Main_header')




@if(isset($getplaylist) and isset($cater))

    <div class="page-heading title-lg">
        <div class="container">
            <div class="container">

                <div class="row">

                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <h3>
                            <a style="text-decoration: none;" href="../" target="_blank" title="{{$getplaylist->title}}">
                               {{$getplaylist->title}}
                                <title>ويكي كورس |
                                    {{$getplaylist->title}}
                                     |{{json_decode($getplaylist->fulldata)->lessons[$id]->title}}

                                </title>
                            </a>
                        </h3>

                        <ul class="page-meta">
                            <li>
                                <i class="fa fa-tags"></i>
                                <a href="/MainCourse/{{trim($Main)}}" style="text-decoration: none;" class="subject-label" title="{{$Main}}">{{trim($Main)}}</a>
                                <a href="../" style="text-decoration: none;" class="subject-label" title="{{trim($SubMain)}}">{{trim($SubMain)}}</a>
                            </li>
</ul>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="page-options">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="lessons">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="lesson-player">
                        <div class="lesson">
                            <h3 class="text-right">{{json_decode($getplaylist->fulldata)->lessons[$id]->title}}</h3>
                                <link rel="stylesheet" href="{{asset('css/plyr.css')}}" />

                               <video poster="{{json_decode($getplaylist->fulldata)->cover ? json_decode($getplaylist->fulldata)->cover : '/images/cover.png'}}" id="player" playsinline controls>
                                    <source src="{{json_decode($getplaylist->fulldata)->lessons[$id]->url}}" type="video/mp4" />
                                   Your browser does not support the video tag.
                                </video>

                                <script src="{{asset('js/plyr.js')}}"></script>
                                <script>
                                    const player = new Plyr('#player',{
                                        'autoplay' : true,
                                        'controls' :['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],
                                        'setting' : ['captions', 'quality', 'speed', 'loop'],
                                        'volume': 1,
                                        'muted': false,
                                        // Display tooltips
                                        'tooltips': {
                                            'controls': true,
                                            'seek': true,
                                        },
                                        // Sprite (for icons)
                                        'loadSprite': true,
                                        'iconPrefix': 'plyr',
                                        'iconUrl': 'https://cdn.plyr.io/3.5.10/plyr.svg',


                                    });

                                </script>


                        </div>

                    </div>

                    <div class="lesson-page">
                        <p class="text-left">Video Title: <b>{{json_decode($getplaylist->fulldata)->lessons[$id]->title}}</b></p>
                        <p class="text-left">Video Duration: <b>{{json_decode($getplaylist->fulldata)->lessons[$id]->time}}</b></p>
                        <p class="text-left">Video Quilty: <b>{{json_decode($getplaylist->fulldata)->lessons[$id]->Quilty}}</b></p>
                        <p class="text-left">Video Download Size: <b>{{json_decode($getplaylist->fulldata)->lessons[$id]->size}}</b></p>
                        <p class="text-left"> :Video Tags<br /><br />
                            @php
                                $vars = explode(' ',json_decode($getplaylist->fulldata)->lessons[$id]->title);
                                foreach ($vars as $tags){
                                    $result = preg_replace("/[^a-zA-Z0-9]+^[\u0621-\u064A0-9 ]+$/", "", $tags);
                                    if(strlen($result) > 2){
                                        echo '<i class="fa fa-tags"></i><a href="/search?query='.$tags.'" style="text-decoration: none;" class="subject-label" title="'.$tags.'">'.$tags.'</a>
                                         ';
                                    }
                                }
                            @endphp
                        </p>
                        <a href="{{json_decode($getplaylist->fulldata)->lessons[$id]->url}}"
                           title="Download {{json_decode($getplaylist->fulldata)->lessons[$id]->title}}" download class="btn btn-danger align-self-center">
                            Download Now  {{json_decode($getplaylist->fulldata)->lessons[$id]->Quilty}}
                            [{{json_decode($getplaylist->fulldata)->lessons[$id]->size}}]
                        </a>

                    </div>

                    <br /><br />
                    <div class="lessons-list">
                        <h3><i class="fa fa-bars"></i> قائمة الدروس</h3>
                        <ul>
                            @php $i=1; @endphp
                           @foreach( json_decode($getplaylist->fulldata)->lessons as $video)
                                <li @if(($id+1) == ($i)) style="background: #e3dbdb;" @endif>
                                    <a href="{{$i}}">
                                        <div class="lesson-icon">
                                            @if(($id+1) == ($i))
                                                <i class="fa fa-pause"></i>
                                            @else
                                                <i class="fa fa-play-circle"></i>
                                            @endif

                                        </div>

                                        <div class="lesson-title">{{$video->title}}</div>
                                        <div class="lesson-duration">
                                            <b>المدة: {{$video->time}}</b> -
                                            <b>الوصف:</b>
                                            {{ substr(str_replace('=',' ',$video->descr),0,100) }}
                                        </div>
                                    </a>
                                </li>
                               @php $i=$i+1; @endphp

                            @endforeach
                        </ul>
                    </div>



                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    @if(strlen($getplaylist->full_link) > 5)
                        <div class="widget">
                            <h3><i class="fa fa-download">
                                </i> تحميل الكورس كاملاً </h3>

                            <div class="form-group">
                                <a href="{{$getplaylist->full_link}}" class="btn btn-primary center-block btn-lg" style="background-color: #25d366;border: 1px solid #25d366" download="" title="Download Full Course as rar or zip file" >Download  Full Course Now</a>
                            </div>

                        </div>
                    @endif

                    <div class="widget">
                        <h3><a href="/" target="_blank"><img src="/images/corses.png" alt="" /></a></h3>
                        <div class="widget-body">

                            <ul class="articles-list">


                                @foreach($collect as $coll)
                                    <li>
                                        <div class="article-item">
                                            <a href="/c/{{$coll->id}}" target="_blank">
                                                <img src="{{$coll->logo}}" alt="" />{{$coll->title}}</a>
                                            <div class="article-date">{{$coll->created_at}}</div>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="widget share-course">
                        <h3><i class="fa fa-share-alt"></i> شارك الكورس</h3>

                        <div class="course-link-input">

                            <input class="form-control" onclick="selectInput(this)" value="https://wikicourses.net/c/{{($getplaylist)->id}}" readonly="">
                        </div>
                        @php
                            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        @endphp
                        <ul class='list-unstyled share-buttons'>

                            <li>
                                <a class='sharing-button facebook' href='https://facebook.com/sharer/sharer.php?u={{$actual_link}}' title='facebook' target='_blank'>
                                    <i class='fa fa-facebook'></i>
                                </a>
                            </li>

                            <li>
                                <a class='sharing-button twitter' href='https://twitter.com/intent/tweet/?text={{$getplaylist->title}}&url={{$actual_link}}' title='twitter' target='_blank'>
                                    <i class='fa fa-twitter'></i>
                                </a>
                            </li>

                            <li>
                                <a class='sharing-button email' href='mailto:?subject={{$getplaylist->title}}&body={{$actual_link}}' title='email' target='_self'>
                                    <i class='fa fa-envelope'></i>
                                </a>
                            </li>

                            <li>
                                <a class='sharing-button whatsapp' href='https://api.whatsapp.com/send?text={{$actual_link}}' title='whatsapp' target='_blank'>
                                    <i class='fa fa-whatsapp'></i>
                                </a>
                            </li>

                        </ul>
                    </div>

                        <div class="widget">
                            <h3><i class="fa fa-download">
                                </i> مصدر الدورة الرئيسي   </h3>

                            <div class="form-group">
                                <a href="{{$getplaylist->playlist_link}}" class="btn btn-danger center-block btn-lg" target="_blank" download="" title="رابط المصدر الرئيسي" >رابط المصدر</a>
                            </div>
                            <p class="text-warning">
                                فنحن لا ندعي ملكية أي دورة ولهذا نضع المصدر الأصلي لكم
                            </p>
                        </div>

                </div>
            </div>

        </div>
    </div>
@endif
@include('pages.Main_footer')
