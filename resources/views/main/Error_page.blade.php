@include('pages.Main_header')
<link href="{{asset('css/error_page.css')}}" rel="stylesheet" />
<div class="errorPage">
    <h1>عذراً، الصفحة المطلوبة غير موجودة</h1>

        <h5>لم يتم العثور على الصفحة التي طلبتها. قد يكون الرابط خاطئ أو الصفحة محذوفة</h5>


    <section class="error-container">
        <span class="four"><span class="screen-reader-text">4</span></span>
        <span class="zero"><span class="screen-reader-text">0</span></span>
        <span class="four"><span class="screen-reader-text">4</span></span>
    </section>

    <div class="btn-group">
        <a href="https://www.coursat.org" class="btn btn-success btn-lg"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
    </div>







</div>
@include('pages.Main_footer')
