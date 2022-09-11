@extends('layouts.patientLayouts.patientLayouts')

@section('content')
    <section class="section1-home">
        <div class="text">
            <p class="paragraph1">
                هل تريد أن تصبح فرد يتمتع بأسنان صحية ,
                <br>قم بزيارة عيادتنا
            </p>
            <p class="paragraph2">
                عندما تواجه مشكلة في صحة الأسنان ، فإنك تحتاج إلى إستخدام بعض العلاجات <br>
                لمواكبة ذلك. ومع ذلك ، هذا لا يكفي ، تحتاج إلى زيارة عيادة الأسنان لحل هذه المشكلة <br>,
                سيساعد طبيب الأسنان في تنظيف أسنانك وتشخيص أي عيوب قد تحدث في أسنانك <br>
            </p>
            <a href="/webSite/bookAppointment" class="link3sec1">احجز موعد الآن</a>
        </div>
        <div class="img">
            <img class="image2" src="{{ asset('assets/images/image 2.png')}}">
        </div>
    </section>

    <section class="section2-home">
        <div class="service">
            <h3 class="section2services">خدماتنا</h3>
        </div>
        <div class="divsection2">
            @foreach($services as $service)
                @if($service->title == "تبيض الاسنان")
                    <div class="rectangle1">
                        <img src="{{ asset('assets/images/vector1.png')}}" class="vector1">
                        <h4 class="hea1section2">{{$service->title}}</h4>
                        <p class="paragraph1section2">{{$service->discription}}</p>
                    </div>
                @elseif($service->title =="تقويم الاسنان")
                    <div class="rectangle1">
                        <img src="{{ asset('assets/images/vector2.png')}}" class="vector2">
                        <h4 class="hea1section2"> {{$service->title}}</h4>
                        <p class="paragraph1section2">{{$service->discription}}
                        </p>
                    </div>
                @elseif($service->title == "زراعة اسنان")
                    <div class="rectangle1">
                        <img src="{{ asset('assets/images/vector3.png')}}" class="vector3">
                        <h4 class="hea1section2">{{$service->title}}</h4>
                        <p class="paragraph1section2">{{$service->discription}}</p>
                    </div>

                @elseif($service->title == "تجميل اسنان")
                    <div class="rectangle1">
                        <img src="{{ asset('assets/images/vector1.png')}}" class="vector12">
                        <h4 class="hea1section2">{{$service->title}}</h4>
                        <p class="paragraph1section2">{{$service->discription}}</p>
                    </div>
                @endif
            @endforeach
        </div>

    </section>


    <section class="section1-home" id="section1-home">
        <div class="text">
            <p class="paragraph1" id="paragraph1">
                عن عيادتنا
            </p>
            <p class="paragraph2" id="paragraph2">
                من أجل بريق ابتسامتك يستقبلك فريق من الأطباء في غرفة الأطباء في غرفة العلاج ،والتي<br>
                تم تصميمها خصيصاً لتمنحك شعوراً مريحاً وذلك للوهلة الأولى التي تطأ فيها قدماك عيادتنا <br>
                وترفل فيها بين خدمتنا ،فحين تترك نفسك مطمئناً لأنجح الأطباء للعناية بأسنانك ،والاهتمام<br>
                بسحر ابتسامك
            </p>
            <a href="/webSite/bookAppointment" class="link3sec2">المزيد</a>
        </div>
        <div class="img">
            <img class="image3" src="{{ asset('assets/images/image 3.png')}}">
        </div>
    </section>


    <section class="section4-home">
        <div class="service1">
            <h2 class="service">كيف نقوم بعملنا </h2>
        </div>
        <!-- <hr class="line"> -->
        <div class="divsection4">
            <div class="divsection4-1">
                <span class="span">1</span>
                <h4 class="h1section4">الخطوة الأولى</h4>
                <p class="paragraph1section4">يتم أخذ بيانات المريض وكل ما يتعلق في ملفه الشخصي</p>
            </div>

            <div class="divsection4-1">
                <span class="span">2</span>
                <h4 class="h1section4">الخطوة الثانية</h4>
                <p class="paragraph1section4">يتم أخذ بيانات المريض وكل ما يتعلق في ملفه الشخصي</p>
            </div>

            <div class="divsection4-1">
                <span class="span">3</span>
                <h4 class="h1section4">الخطوة الثالثة</h4>
                <p class="paragraph1section4">يتم أخذ بيانات المريض وكل ما يتعلق في ملفه الشخصي</p>
            </div>

            <div class="divsection4-1">
                <span class="span">4</span>
                <h4 class="h1section4">الخطوة الرابعة</h4>
                <p class="paragraph1section4">يتم أخذ بيانات المريض وكل ما يتعلق في ملفه الشخصي</p>
            </div>
        </div>
    </section>

    <section class="section5-home">
        <div class="service">
            <h3 class="h3section5">فريقنا </h3>
        </div>
        <div class="divsection5">
            @foreach($doctors as $doctor)
            <div class="div1section5">
                @if($doctor->gender == 1)
                <img src="{{ asset('assets/images/doc1.png')}}" class="image1section5">
               @elseif($doctor->gender == 0)
                    <img src="{{ asset('assets/images/doctor2.png')}}" class="image1section5">
                @endif
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
            <div class="div1section5">
                <img src="{{ asset('assets/images/doctor2.png')}}" class="image1section5">
                <h3 class="h1section5">د. وائل محمد</h3>
                <p class="paragraph1section5">يختص بتقويم الأسنان </p>
            </div>
        </div>
    </section>

    <section class="section6-home">
        <h3 class="hsection6">نحن نعمل من أجلك</h3>
        <p class="paragraphsection6">
            من أجل بريق ابتسامتك ،يستقبلك غريق من الأطباء في غرفة العلاج ،والتي تم تصميمها خصيصاً لتمنحك شعوراً
            مريحاًا<br>
            فنحن نعمل من أجلك أنت. ولكي تتمكن من الحصول على ابتسامة رائعة عليك بحجز موعد في عيادتنا
        </p>
        <a href="/webSite/bookAppointment" class="link3sec1">احجز موعد الأن </a>
    </section>

    <section class="section7-home">
        <div class="section7-1">
            <h3 class="h3section5">أراء المرضى عن العيادة</h3>
            <p class="paragraphsection7">
                هنا سوف تتمكن من رؤية آراء المرضى عن عيادتنا ويمكنك إضافة رأيك في الأسفل
            </p>
        </div>
        <div class="divsection7">
            @foreach ($opinions as $opinion)
            <div class="div1section7">
                <img src="{{ asset('assets/images/image4.png')}}" class="image4">
                <h6 class="name1">{{$opinion->user->name}}</h6>
                <text class="date1">{{$opinion->updated_at}}</text>
                <p class="paragraph1section7">
                    {{$opinion->Content}}
                </p>
            </div>
            @endforeach
            <div class="div1section7">
                <img src="{{ asset('assets/images/image5.png')}}" class="image4">
                <h6 class="name1">احمد محمد</h6>
                <text class="date1">اليوم</text>
                <p class="paragraph1section7">
                    كانت تجربة جميلة وحصلت فيها على أجود الخدمات ،انها عيادة رائعة وتوفر كل ما يحتاجه المريض للحصول على
                    راحته</p>
            </div>
        </div>
        <div class="div2section7">
            <form action="{{route ('webSite.opinions.store')}}" method="get">
            <h5 class="h1section7">قم بإضافة رأيك </h5>
            <p class="paragraph4section7">يسعدنا أن نأخذ رأيك لكي نتمكن من تطوير العيادة من أجلكم ولراحتكم</p>
            <textarea name="notes"></textarea>
                <button type="submit" class="link3sec1-send">أرسل</button>
            </form>
        </div>

    </section>



@endsection