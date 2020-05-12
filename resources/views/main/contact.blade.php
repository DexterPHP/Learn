@include('pages.Main_header')
<title>ويكي كورس | تواصل معنا</title>
<link href="{{asset('css/error_page.css')}}" rel="stylesheet" />
<div class="contact">

    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="form-page">
 @if(session('Dexter'))
    <div class="alert alert-success alert-dismissible text-right">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-stop"></i> شكراً لك </h5>
        لقد تم إرسال الرسالة بشكل سليم نتمنى إن نكون عند حسن ظنكم 
    </div>
@endif
            <h3><i class="fa fa-envelope"></i> اتصل بنا</h3>

                    <form role="form" method="post" >
                        {{csrf_field()}}

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="senderName">الاسم <span class="required">*</span></label>
                                    <input type="text" name="msg_sender" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="senderEmail">البريد الالكتروني <span class="required">*</span></label>
                                    <input type="email" name="msg_email" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="messageCategory"> نوع الرسالة <span class="required">*</span></label>
                                    <select name="category_id" class="form-control">


                                        <option value="1">تواصل </option>


                                        <option value="2">أقتراح</option>


                                        <option value="3">طلب</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="subject">عنوان الرسالة <span class="required">*</span></label>
                                    <input type="text" name="msg_subject" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="message">نص الرسالة <span class="required">*</span></label>
                                    <textarea name="msg_text" class="form-control"></textarea>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="submit" name="sendMessage" value="إرسال" class="btn btn-primary btn-lg">
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
@include('pages.Main_footer')
