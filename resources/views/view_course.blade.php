@include('pages.Main_header')


@if(isset($Main) and isset($Sub) and isset($course))
    <div class="page-heading title-lg">
        <div class="container">
            <div class="container">

                <div class="row">

                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <h3>
                            <a style="text-decoration: none;" href="./" target="_blank" title="">
                                @php
                                    $title = @json_decode($course)->title;
                                    echo @$title;
                                    echo '  <title>ويكي كورس | '.$data->title.' </title>';
                                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                    echo '
                                      <meta property="og:title" content="ويكي كورس | '.json_decode($course)->title.' " />
                                      <meta property="og:description" content=" '.$data->desc.'" />
                                      <meta property="og:url" content="'.$actual_link.'" />
                                      <meta property="og:image" content=" '.$data->logo.'" />
                                      <meta property="og:type" content="website" />
                                      <meta property="og:image" content="https://www.wikicourses.net/'.$data->logo.'" />
                                    ';
                                @endphp
                            </a>
                        </h3>

                        <ul class="page-meta">
                            <li>
                                <i class="fa fa-tags"></i>
                                    <a href="/MainCourse/{{trim($Main->title_en)}}" style="text-decoration: none;" class="subject-label" title="{{$Main->title}}">{{trim($Main->title)}}</a>
                                <a href="/Courses/{{trim($Main->title_en)}}/{{trim($Sub->title_en)}}" style="text-decoration: none;" class="subject-label" title="trim({{$Sub->title}})">{{trim($Sub->title)}}</a>
                            </li>


                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="المحاضر">
                                <i class="fa fa-user"></i>
                                <a href="/search?query={{trim($data->auther)}}"> {{$data->auther}}</a>
                            </li>
                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="اللغة"><i class="fa fa-globe"></i>   {{$data->language}}</li>
                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="مدة الكورس"><i class="fa fa-clock-o"></i> {{$data->all_length}} </li>
                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="عدد الدروس"><i class="fa fa-play-circle"></i> {{$data->count_of_videos}}</li>
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
                    <div class="lessons-list">
                        <h3><i class="fa fa-bars"></i> قائمة الدروس</h3>
                        <ul>
                            @php $i=1; @endphp
                            @foreach( json_decode($course)->lessons as $video)
                                <li>
                                    <a href="{{$data->title_en}}/{{$i}}">
                                        <div class="lesson-icon"><i class="fa fa-play-circle"></i></div>
                                        <div class="lesson-title">{{$video->title}}</div>
                                        <div class="lesson-duration">

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

                    @if(strlen($data->full_link) > 5)
                        <div class="widget">
                            <h3><i class="fa fa-download">
                                </i> تحميل الكورس كاملاً </h3>

                            <div class="form-group">
                                <a href="{{$data->full_link}}" class="btn btn-primary center-block btn-lg" target="_blank" style="background-color: #25d366;border: 1px solid #25d366" download="" title="Download Full Course as rar or zip file" >Download  Full Course Now</a>
                            </div>
                            <p class="text-warning">
                                كما يمكنك تحميل كل درس بشكل منفصل من داخل صفحة المشاهدة بشكل مباشر
                            </p>

                        </div>
                    @endif


                    <div class="widget">
                        <h3><a href="/" target="_blank"><img src="/images/corses.png" alt=""></a></h3>
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
                            <input class="form-control" onclick="selectInput(this)"
                                   value="https://wikicourses.net/c/{{json_decode($data)->id}}"
                                   readonly="">
                        </div>

                        <ul class='list-unstyled share-buttons'>

                            <li>
                                @php
                                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                @endphp
                                <a class='sharing-button facebook' href='https://facebook.com/sharer/sharer.php?u={{$actual_link}}' title='facebook' target='_blank'>
                                    <i class='fa fa-facebook'></i>
                                </a>
                            </li>

                            <li>
                                <a class='sharing-button twitter' href='https://twitter.com/intent/tweet/?text={{$title}}&url={{$actual_link}}' title='twitter' target='_blank'>
                                    <i class='fa fa-twitter'></i>
                                </a>
                            </li>



                            <li>
                                <a class='sharing-button email' href='mailto:?subject={{$title}}&body={{$actual_link}}' title='email' target='_self'>
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
                                <a href="{{$data->playlist_link}}" class="btn btn-danger center-block btn-lg" target="_blank" download="" title="رابط المصدر الرئيسي" >رابط المصدر</a>
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
