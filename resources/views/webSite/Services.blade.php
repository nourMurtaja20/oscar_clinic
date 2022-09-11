@extends('layouts.webLayout.webLayout')

@section('content')

    <div class="page-wrapper">
        <div class="section1">
            <div class="hero-image">
                <img src="{{ asset('assets/images/image18.png')}}" class="hero-image">
            </div>
            <div class="hero-box">
                <h2 class="h2"> خدماتنا </h2>
                <p class="p1"> لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان الماهرين تأهيلاً
                    وخبرةً،<br>
                    يتلقون شهادات الدكتوراه؛ من أجل راحتكم </p>
                <a class="booknow" href="/webSite/bookAppointment">احجز موعد الان</a>
            </div>
        </div>

        <div class="section2-services">
            <h3 class="h3">نقوم بتقديم الأفضل لمرضنا</h3>
            <p class="p2">لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان لماهرين تأهيلاً
                وخبرةً،
                يتلقون شهادات الدكتوراه؛ من أجل راحتكم</p>
        </div>

        <div class="section3-services">
            <h3 class="h3">الخدمات التي تقدمها العيادة</h3>
            <p class="p2">لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان لماهرين تأهيلاً
                وخبرةً،
                يتلقون شهادات الدكتوراه؛ من أجل راحتكم</p>
        </div>

        <div class="section4-services">
            @foreach($services as $service)
                @if($service->title == "تبيض الاسنان")
                    <div class="s4-1">
                        <div class="s4-2">
                            <img src="{{ asset('assets/images/vector1.png')}}" class="img2-s">
                        </div>

                        <div class="s4-3">
                            <h2 class="-s">{{$service->title}}</h2>
                            <h2 class="h5-s">{{$service->discription}}</h2>
                        </div>
                    </div>
                @elseif($service->title =="تقويم الاسنان")
                    <div class="s4-1">
                        <div class="s4-2">
                            <img src="{{ asset('assets/images/vector2.png')}}" class="img2-s">
                        </div>

                        <div class="s4-3">
                            <h2 class="h4-s">{{$service->title}}</h2>
                            <h2 class="h5-s">{{$service->discription}}</h2>
                        </div>
                    </div>
                @elseif($service->title == "زراعة اسنان")
                <div class="s4-1">
                    <div class="s4-2">
                        <img src="{{ asset('assets/images/vector3.png')}}" class="img2-s">
                    </div>

                    <div class="s4-3">
                        <h2 class="h4-s">{{$service->title}}</h2>
                        <h2 class="h5-s">{{$service->discription}}</h2>
                    </div>
                </div>
                    @elseif($service->title == "تجميل اسنان")
                    <div class="s4-1">
                        <div class="s4-2">
                            <img src="{{ asset('assets/images/vector1.png')}}" class="img2-s">
                        </div>

                        <div class="s4-3">
                            <h2 class="h4-s">تجميل اسنان </h2>
                            <h2 class="h5-s">{{$service->discription}}</h2>                        </div>
                    </div>
                @endif
            @endforeach



        </div>


        <div class="section5-services">
            <h3 class="hsection5">نحن نعمل من أجلك</h3>
            <p class="paragraphsection5">
                من أجل بريق ابتسامتك ،يستقبلك غريق من الأطباء في غرفة العلاج ،والتي تم تصميمها خصيصاً لتمنحك شعوراً
                مريحاًا<br>
                فنحن نعمل من أجلك أنت. ولكي تتمكن من الحصول على ابتسامة رائعة عليك بحجز موعد في عيادتنا
            </p>
            <a href="/webSite/bookAppointment" class="link3sec1">احجز موعد الأن </a>
        </div>

        <div class="section6-services">
            <div class="s6-1" style="margin-top: 164px;">
                <h3 class="h8-s">صور المرضى قبل وبعد</h3>
                <p class="h9-s">لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان الماهرين تأهيلاً
                    وخبرةً </p>
            </div>
            <div class="s6-2">
                <div class="s6-3">
                    <h3 class="h10-s">المريض الأول</h3>
                    <div class="s6-4">
                        <img src="{{ asset('assets/images/t1.png')}}" class="img-s6">
                        <img src="{{ asset('assets/images/t2.png')}}" class="img-s6">
                    </div>
                </div>

                <div class="s6-3">
                    <h3 class="h10-s">المريض الثاني</h3>
                    <div class="s6-4">
                        <img src="{{ asset('assets/images/t3.png')}}" class="img-s6">
                        <img src="{{ asset('assets/images/t4.png')}}" class="img-s6">
                    </div>

                </div>
                <div class="s6-3">
                    <h3 class="h10-s">المريض الثالث</h3>
                    <div class="s6-4">
                        <img src="{{ asset('assets/images/t5.png')}}" class="img-s6">
                        <img src="{{ asset('assets/images/t6.png')}}" class="img-s6">
                    </div>

                </div>
                <div class="s6-3">
                    <h3 class="h10-s">المريض الرابع</h3>
                    <div class="s6-4">
                        <img src="{{ asset('assets/images/t1.png')}}" class="img-s6">
                        <img src="{{ asset('assets/images/t2.png')}}" class="img-s6">
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection