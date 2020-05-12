@include('pages.Main_header')
@if(isset($datacater) and isset($Sub))
    <div class="page-heading title-lg">
        <div class="container">
            <h3>{{$Sub->title}}</h3>
            <title>
                ويكي كورس | كورسات مجانية
            | {{$Sub->title}}
            </title>
        </div>
    </div>
<section class="subjects text-center">
<div class="container">


    <div class="row">
      @foreach($datacater as $SubCater)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <a href="/Courses/{{trim($Sub->title_en)}}/{{trim($SubCater->title_en)}}">
                    <div class="subject-box">
                        <div class="box-icon">
                            <i class="{{$SubCater->logo}} colored"></i>
                        </div>
                        <div class="box-title">{{$SubCater->title}}</div>
                    </div>
                </a>
            </div>
          @endforeach
    </div>

</div>
</section>
@endif

@include('pages.Main_footer')
