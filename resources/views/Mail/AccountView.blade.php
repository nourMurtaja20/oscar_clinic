
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .logo1{
            position: absolute;
            width: 79px;
            height: 51px;
            left: 288px;
            top: 95px;
            background: url({{ asset('assets/css/logo.png')}});
        }
        .oscarclinic{
            position: absolute;
            width: 291px;
            height: 45px;
            left: 198px;
            top: 133px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-size: 30px;
            line-height: 45px;
            color: #15B7D7;
        }
        .mailcontact{
            position: absolute;
            top: 180px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            line-height: 45px;
            color: #000000;
            direction: rtl;
            left: 341px;
        }
        hr{
            position: absolute;
            width: 275px;
            height: 0px;
            left: 353px;
            top: 388px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            transform: rotate(-180deg);
        }
        .phone{
            position: absolute;
            width: 24px;
            height: 24px;
            left: 610px;
            top: 428px;
        }
        .phonenumber{
            position: absolute;
            left: 513px;
            top: 428px;
            color: #ACACAC;
        }
        .email{
            position: absolute;
            width: 24px;
            height: 24px;
            left: 449px;
            top: 428px;
        }
        .emailtext{
            position: absolute;
            left: 280px;
            top: 428px;
            color: #ACACAC;
        }
        .location{
            position: absolute;
            width: 24px;
            height: 24px;
            left: 217px;
            top: 428px;
        }
        .locationtext{
            position: absolute;
            left: 142px;
            top: 428px;
            color: #ACACAC;
        }
    </style>
</head>
<body>
<div>
    <img class="logo1" src="{{ asset('assets/images/logo 1.png')}}">
    <h2 class="oscarclinic">Oscar Dental Clinic</h2>
</div>

<div>
    <p class="mailcontact">
        الرد
        <br>
        مرحبا
        <br>
        كلمة المرور الخاصة بك هي {{$test_message['password']}}.
        <br>
        نرجو عدم مشاركتها مع أي شخص أخر
        <br>
    </p>
</div>
<hr>
<footer>
    <div><img src="{{ asset('assets/images/i1.png')}}" class="phone">
        <text class="phonenumber">0567 600 617</text></div>

    <div><img src="{{ asset('assets/images/email.png')}}" class="email">
        <text class="emailtext">oscar clinic@gmail.com</text></div>

    <div><img src="{{ asset('assets/images/i3.png')}}" class="location">
        <text class="locationtext">غزة , فلسطين </text></div>
</footer>
</body>
</html>