<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="{{ asset('assets/css/AboutUs.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bookAppointment.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/ContactUs.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/HomePage.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/Services.css')}}">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>


<!--     
    <link href="{{ asset('assets/vendors/base/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('assets/demo/default/media/img/logo/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}"> -->
</head>

<body>
<header>
    <nav>
        <div class="logo">
            <a href="#"><img class="image" src="{{ asset('assets/images/logo.png')}}" alt="logo">Clinic
                <text style="color: #1A73B7;">Oscar</text>
            </a>
            <!-- <h2 class="Oscar" style="color: #82C8E5;">Oscar <text style="color: #82C8E5;">Clinic</text></h2> -->
        </div>
        <div class="toggle">
            <a href="#">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <ul class="menu">
            <li><a href="/webSite/HomePage" class="item">الرئيسية</a></li>
            <li><a href="/webSite/Services" class="item">خدماتنا</a></li>
            <li><a href="/webSite/AboutUs" class="item">من نحن</a></li>
            <li><a href="/webSite/bookAppointment" class="item">حجز موعد</a></li>
            <li><a href="/webSite/ContactUs" class="item">تواصل معنا</a></li>
        </ul>
        <ul class="menu">
            <li><a href="/login" class="item-button">تسجيل الدخول</a></li>
            <li><a href="{{ route('register') }}" class="item-button-secondary">انشاء حساب</a></li>
        </ul>
    </nav>
</header>


<div class="page-wrapper">
    @yield('content')

    @include('sweetalert::alert')

    <footer class="footer" style="
    margin-top: 264px;">
        <div class="logo" id="logo">
            <a href="#"><img class="image" src="{{ asset('assets/images/logo.png')}}" alt="logo">Clinic
                <text style="color: #1A73B7;">Oscar</text>
            </a>
        </div>
        <div class="footer2">
            <div class="footer2con">
                <img src="{{ asset('assets/images/vector5.png')}}" class="vector4">
                <text class="textvector4">0567 600 617</text>
            </div>

            <div class="footer2con">
                <img src="{{ asset('assets/images/vector6.png')}}" class="vector4">
                <text class="textvector4">Oscar Clinic@gmail.com</text>
            </div>

            <div class="footer2con">
                <img src="{{ asset('assets/images/vector4.png')}}" class="vector4">
                <text class="textvector4">غزة_فلسطين</text>
            </div>

        </div>
        <div class="footer3">
            <p class="footertext">2019-2021 اوسكار© جميع الحقوق محفوظة.</p>
        </div>

    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>


<script>
    $(function () {
        $(".toggle").on("click", function () {
            if ($(".menu").hasClass("active")) {

                $(".menu").removeClass("active");
                $(this).find("a").html("<ion-icon name='menu-outline'></ion-icon>");

            } else {
                $(".menu").addClass("active");
                $(this).find("a").html("<ion-icon name='close-outline'></ion-icon>");

            }

        });

    });
</script>
<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/app/js/my-script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>


<div class="container">
    <div class="response"></div>
    <div id='calendar'></div>
</div>

<script type="text/javascript">
    $('#orthodonticAppointment').hide();
    $('#dateServices').hide();
    $(function () {

        $("#Service").change(function () {
            if ($(this).val() === "تقويم الأسنان") {
                $("#orthodonticAppointment").show();
                $('#dateServices').hide();
            }
            else{
                $('#orthodonticAppointment').hide();
                $("#dateServices").show();
            }

        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            showSeconds: false,
            daysOfWeekDisabled: [6, 5],
            hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7, 17, 18, 19, 20, 21, 22, 23]
        });
    });

    $(function () {
        $('#datetimepicker1').datetimepicker({
            showSeconds: false,
            daysOfWeekDisabled: [1, 4, 3, 2, 0, 5],
            hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7, 17, 18, 19, 20, 21, 22, 23]
        });
    });
</script>

</body>

</html>