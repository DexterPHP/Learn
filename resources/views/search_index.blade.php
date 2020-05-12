@include('pages.Main_header')



@if(isset($search_data) and isset($search_title))
    <title>ويكي كورس |    نتائج البحث عن
        {{$search_title}}</title>
    <div class="page-heading title-lg">
        <div class="container">
            <h3>
                نتائج البحث عن
                {{$search_title}}
            </h3>
        </div>
    </div>
    <div class="courses text-center">
        <div class="container">
            <div class="row">
                @foreach($search_data as $CourseData)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="course-box">
                            <div class="course-cover">
                                <a href="/c/{{$CourseData->id}}">
                                    <img src="{{$CourseData->logo}}" alt="">
                                </a>

                                <div class="course-instructor" data-toggle="tooltip" data-placement="top" title="المحاضر">
                                    <a href="/search?query={{$CourseData->auther}}">
                                        <i class="fa fa-graduation-cap"></i>
                                        {{$CourseData->auther}}
                                    </a>
                                </div>


                                <a href="/c/{{$CourseData->id}}">
                                    <div class="course-language" data-toggle="tooltip" data-placement="top" title="اللغة">{{$CourseData->language}}</div>
                                </a>

                            </div>

                            <a href="/c/{{$CourseData->id}}">
                                <div class="course-heading">
                                    <div class="course-title">{{$CourseData->title}}</div>                                                                                </div>

                            </a>

                            <a href="/c/{{$CourseData->id}}">
                                <div class="row course-meta">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 meta-item">
                                        <div class="" data-toggle="tooltip" data-placement="top" title="مدة الكورس">
                                            <i class="fa fa-clock-o"></i>
                                            {{$CourseData->all_length}}
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 meta-item">
                                        <div class="" data-toggle="tooltip" data-placement="top" title="عدد الدروس">
                                            <i class="fa fa-play-circle"></i>
                                            {{$CourseData->count_of_videos}}
                                        </div>
                                    </div>

                                </div>
                            </a>

                            <a href="/c/{{$CourseData->id}}">
                                <div class="course-rating" data-toggle="tooltip" data-placement="top" title="وصف قصير">

                                    <div class="rating-start rating-small">
                                        {{substr($CourseData->desc,0,50)}}
                                    </div>

                                </div>
                            </a>

                        </div>
                    </div>

                @endforeach



            </div>


        </div>
    </div>

@endif
@include('pages.Main_footer')
