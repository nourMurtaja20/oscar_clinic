@extends('layouts.patientLayouts.patientLayouts')

@section('content')
<div class="section1-aboutUs">
    <div class="hero-image">
        <img src="{{ asset('assets/images/image17.png')}}" class="hero-image">
    </div>
    <div class="hero-box">
        <h2 class="h2-a"> من نحن </h2>
        <p class="p1"> لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان الماهرين تأهيلاً وخبرةً،<br>
            يتلقون شهادات الدكتوراه؛ من أجل راحتكم </p>
        <a class="booknow" href="bookAppointment.html">احجز موعد الان</a>
    </div>
</div>

<div class="section2-aboutUs">
    <h3 class="h3-a">  من نحن في عيادة اوسكار</h3>
    <p class="p2">لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان لماهرين تأهيلاً وخبرةً،
        يتلقون شهادات الدكتوراه؛ من أجل راحتكم</p>
</div>

<div class="section3-aboutUs">
    <h3 class="h3-a"> لماذا نحن ؟</h3>
    <p class="p2">من أجل بريق ابتسامتك، يستقبلك فريق من الأطباء في غرفة العلاج، والتي تم تصميمها خصيصًا لتمنحك شعورًا مريحا وذلك للوهلة الأولى التي تطأ فيها قدماك عيادتنا،
        وترفل فيها بين خدمتنا، فحين تترك نفسك مطمئنا لأنجع الأطباء للعناية بأسنانك، والاهتمام بسحر ابتسا</p>
</div>

<section class="section4-aboutUs">
    <div class="service">
        <h3 class="h3section4">فريقنا </h3>
    </div>
    <div class="divsection4">
        @foreach($doctors as $doctor)
            <div class="div1section5">
                <img src="{{ asset('assets/images/doc1.png')}}" class="image1section5">
                <h3 class="h1section5">{{ $doctor->user ? $doctor->user->name : '' }}</h3>


                @if($doctor->specialization ==0)
                    <p class="paragraph1section5">يختص بطب أسنان عام</p>
                @elseif($doctor->specialization ==1)
                    <p class="paragraph1section5">يختص بجراحة أسنان</p>
                @elseif($doctor->specialization ==2)
                    <p class="paragraph1section5">تقويم أسنان</p>

                @endif
            </div>
        @endforeach
        <div class="div1section4">
            <img src="{{ asset('assets/images/doctor2.png')}}" class="image1section4">
            <h3 class="h1section4">د. وائل محمد</h3>
            <p class="paragraph1section4">يختص بتقويم الأسنان </p>
        </div>
    </div>
</section>


<div class="section5-aboutUs">
    <h3 class="hsection5">نحن نعمل من أجلك</h3>
    <p class="paragraphsection5">
        من أجل بريق ابتسامتك ،يستقبلك غريق من الأطباء في غرفة العلاج ،والتي تم تصميمها خصيصاً لتمنحك شعوراً مريحاًا<br>
        فنحن نعمل من أجلك أنت. ولكي تتمكن من الحصول على ابتسامة رائعة عليك بحجز موعد في عيادتنا
    </p>
    <a href="bookAppointment.html" class="link3sec1">احجز موعد الأن </a>
</div>

<div class="section6-aboutUs">
    <div class="s6-1">
        <h3 class="h8-a">صور عن العيادة</h3>
        <p class="h9-a">لسنا مجرد مركز لعلاج الأسنان فحسب، بل لدينا من نفخر بهم من أطباء الأسنان الماهرين تأهيلاً وخبرةً </p>
    </div>
    <div class="container">
        <div class="con-img">
            <img src="{{ asset('assets/images/image9.png')}}" class="GalleryImg1">
            <img src="{{ asset('assets/images/image8.png')}}" class="GalleryImg1">
            <img src="{{ asset('assets/images/image20.png')}}" class="GalleryImg1">
            <img src="{{ asset('assets/images/image21.png')}}" class="GalleryImg1">

        </div>


    </div>


</div>

@endsection
