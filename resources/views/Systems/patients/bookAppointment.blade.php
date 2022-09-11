@extends('layouts.patientLayouts.patientLayouts')

@section('content')
    <div class="row">
        <div class="card-body">
            <div class="section1-appointment">
                <div class="hero-image">
                    <img src="{{ asset('assets/images/image17.png')}}" class="hero-image">
                </div>
                <div class="hero-box">
                    <h2 class="h2-a"> احجز موعد الان </h2>
                    <p class="p1">نحن في عيادة اوسكار نتبع كل الوسائل السلسلة لكي نسهل عليك كمريض , وذلك من خلال
                        تمكنك من<br>
                        حجز موعد بشكل الكتروني من دون عناء ولا تعب</p>
                </div>
            </div>

            <div class="section2-appointment">
                <div class="s2-1">
                    <h2 class="h3-a">قم بحجز موعد اون لاين الأن</h2>
                    <p class="p2">اذا حصلت اي مشكلة خلال حجز الموعد بشكل الكتروني او تريد الاستفسار عن اي أمر
                        أخر يمكنك التواصل معنا عبر
                        الرقم
                        <text style="color: #1A73B7;">+972 5951 234 67</text>
                    </p>
                </div>
                <div class="s2-2">
                    <div class="s2-3">
                        <h2 class="h4" style="font-family: Tajawal; font-style:normal; font-weight: 500; font-size: 22px; color: #15B7D7;">حجز موعد</h2>
                        <div class="s2-4">
                            <img src="{{ asset('assets/images/vector.png')}}" class="img1" onclick="Functionopen()">
                            <h2  class="h5" >قبل حجز موعد</h2>
                        </div>
                    </div>
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <a href="/login">
                            {{ session()->get('error') }}
                            </a>
                        </div>
                    @endif
                    <div class="s2-5">
                        <form action="{{route ('webSite.bookAppointment.store')}}" method="get">
                            <div class="formbox1">
                                <label class="h66" style="top:170px; margin-bottom:16px">وقت الحجز</label>
                                <input type="datetime-local" class="select1"
                                       placeholder="تاريخ الموعد"
                                       value="" name="start" id="datetimepicker2"/>
                            </div>
                            <!-- <div class="formbox1">
                                <label class="h66">الأخصائي المسؤول </label>
                                <select class="select1" id="Drname" name="Drname">
                                    <option selected></option>
                                    @foreach ($doctors as $key => $value)
                                        <option value="{{$key=$value->id}} ">{{ $value=$value->user->name }}</option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div class="formbox1">
                                <label class="h66" style=" margin-bottom:16px">نوع الحجز</label>
                                <select name="Service" id="Service" class="select1">
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}"> {{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="formbox1">
                                <label class="h66" style="top:500px;">حالات خاصة </label>
                                <textarea class="textarea1" name="specialCases"></textarea>
                            </div>
                            <div class="formbox1">
                                <button class="bookNow"> حجز موعد</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="d2" id="not1"></div>
	<div class="d1" id="not">
		<h1 class="t1">ما قبل الحجز</h1>
		<img src="../../assets/images/cros.png" class="i1" onclick="Functionclose()">
		<img src="../../assets/images/i.png" class="i6">
		<h1 class="t2">يجب عليك انشاء حساب ان لم يكن لديك حساب او تسجيل الدخول في حال لديك حساب</h1>
		<img src="../../assets/images/Group.png" class="i6" style="top: 156px;">
		<h1 class="t2" style="top: 150px;">يجب عليك مراجعة الطبيب المختص في حال كنت تعاني من اي مرض مزمن او حالة
			صحية معينة</h1>
		<img src="../../assets/images/i4.png" class="i6" style="top: 242px;">
		<h1 class="t2" style="top: 235px;">يجب عليك التزام في الموعد الذي قمت بحجزه وان حدث اي طارىء فعليك اخبار
			الطبيب بذلك </h1>
		
	</div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select[name="Drname"]').on('change', function () {
                    var doctorID = $(this).val();
                    if (doctorID) {
                        $.ajax({
                            url: '/myform/ajax/' + doctorID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {

                                $('select[name="Service"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="Service"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="Service"]').empty();
                    }
                });
            });
            function Functionopen() {
            var o = document.getElementById("not");
            var x = document.getElementById("not1");
            if (o.style.display === "none") {
                o.style.display = "block";
                x.style.display = "block";

            } else {
                o.style.display = "none";
            }

        }
        function Functionclose() {
            var o = document.getElementById("not");
            var x = document.getElementById("not1");
            o.style.display = "none";
            x.style.display = "none";


        }
        </script>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    showSeconds: false,
                    daysOfWeekDisabled: [6, 5],
                    hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7, 17, 18, 19, 20, 21, 22, 23]
                });
            });
        </script>

    </div>

@endsection
