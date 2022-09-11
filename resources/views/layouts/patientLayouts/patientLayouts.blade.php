<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" href="{{ asset('assets/css/AboutUs.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bookAppointment.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/ContactUs.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/HomePage.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/Services.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/tryProfile.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</head>

<body>

<div class="logout" id="imglogout" onclick="FunctioncloseLogout()">
    <a href="#">
        <img class="imgLogout" src="{{ asset('assets/images/logout.png')}}" id="ilogout">
        <p class="textLogout">تسجيل دخول</p>
    </a>
</div>

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    @include('layouts.patientLayouts.header')
</div>
    <div class="page-wrapper">
        @yield('content')

        @include('sweetalert::alert')
    @include('layouts.patientLayouts.footer')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    function FunctionReservations() {
        var x = document.getElementById("Reservations");
        var y = document.getElementById("coming");
        var z = document.getElementById("Notes");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }

    function Functioncoming() {
        var x = document.getElementById("coming");
        var y = document.getElementById("Reservations");
        var z = document.getElementById("Notes");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }

    function FunctionNotes() {
        var z = document.getElementById("coming");
        var y = document.getElementById("Reservations");
        var x = document.getElementById("Notes");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }

    function Functionopen() {
        var o = document.getElementById("div7");
        var x = document.getElementById("back");
        if (o.style.display === "none") {
            o.style.display = "block";
            x.style.display = "block";

        } else {
            o.style.display = "none";
        }

    }

    function Functionclose() {
        var x = document.getElementById("back");
        var o = document.getElementById("div7");
        o.style.display = "none";
        x.style.display = "none";

    }

    function FunctionopenLogout() {
        var o = document.getElementById("imglogout");
        if (o.style.display === "none") {
            o.style.display = "block";
        } else {
            o.style.display = "none";
        }

    }

    function FunctioncloseLogout() {
        var o = document.getElementById("imglogout");
        if (o.style.display === "block") {
            o.style.display = "none";
        } else {
            o.style.display = "none";
        }
    }

</script>


</body>

</html>