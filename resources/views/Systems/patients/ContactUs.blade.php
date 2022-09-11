@extends('layouts.patientLayouts.patientLayouts')

@section('content')

<div class="section1-contactUs">
    <div class="hero-image">
        <img src="{{ asset('assets/images/image12.png')}}" class="hero-image">
    </div>
    <div class="hero-box">
        <h2 class="h2-a"> تواصل معنا </h2>
        <p class="p1">لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان الماهرين تأهيلاً <br>
            وخبرةً، يتلقون شهادات الدكتوراه؛ من أجل راحتكم</p>

    </div>
</div>

<div class="section2-contactUs">
    <h3 class="h3-c">تواصل معنا في عيادة أوسكار</h3>
    <p class="p2">اذا حصلت اي مشكلة خلال حجز الموعد بشكل الكتروني او تريد الاستفسار عن اي أمر أخر يمكنك التواصل معنا عبر الرقم
        <text style="color: #1A73B7; ">+972 5951 234 67</text></p>
</div>


<div class="section3-contactUs">
    <div class="s3-2">
        <form class="contact-form" method="post" action="{{route('contact.send.mail')}}">
            @Csrf
            <div class="formbox">
                <label class="h6-c" style="top:170px;"> البريد الالكتروني</label>
                <input class="select1" type="email" placeholder="قم بادخال البريد الالكتروني" name="email">
            </div>
            <div class="formbox">
                <label class="h6-c" style="top:500px;">الرسالة </label>
                <textarea class="textarea1" placeholder="قم بادخال الرسالة" name="messageText" style="padding:14px;"></textarea>
            </div>
            <div class="formbox">
                <button type="submit" class="bookNow">
                        ارسال</button>
            </div>
        </form>
    </div>
    <div class="s3-3">
        <h1 class="s3-h1">بيانات التواصل</h1>
        <div class="s3-4">
            <div class="info">
                <img src="{{ asset('assets/images/i1.png')}}" class="imgphone">
                <text class="info-1">0567 600 617</text>

            </div>
            <div class="info">
                <img src="{{ asset('assets/images/vector7.png')}}" class="imgwhatsapp">
                <text class="info-1">+970 599 344 728</text>
            </div>
            <div class="info">
                <img src="{{ asset('assets/images/i2.png')}}" class="imggmail">
                <text class="info-1">oscar clinic@gmail.com</text>
            </div>
            <div class="info">
                <img src="{{ asset('assets/images/i3.png')}}" class="imglocation">
                <text class="info-1">شارع الوحدة , غزة , فلسطين</text>
            </div>

        </div>
        <div class="s3-5">
            <div class="div2-c">
                <h1 class="s3-h1">ساعات العمل</h1>
                <text class="days">من السبت الى الخميس</text>
                <div class="info">
                    <img src="{{ asset('assets/images/vector8.png')}}" class="imgtimes">
                    <text class="info-1">من 1مساء - 7:30 مساء</text>
                </div>
            </div>

        </div>


    </div>




</div>

<div class="section4-contactUs">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.15344555756!2d34.451091921127215!3d31.519945254409524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7fa9398ca1eb%3A0x20b6a97d6614ef14!2z2YXYsdmD2LIg2KfZhNmI2K3Yr9ipINin2YTYq9mC2KfZgdmK!5e0!3m2!1sar!2sus!4v1655384236941!5m2!1sar!2sus"
            width="1500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>



@endsection