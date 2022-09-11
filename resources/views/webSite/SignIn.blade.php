<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/SignIn.css')}}">
    <style type="text/css">
    </style>
</head>
<body class="body-signin">

<div class="box">
    <img class="image" src="{{ asset('assets/images/image 1.png')}}">
    <h2 class="Oscar">Oscar <text style="color: #82C8E5;">Clinic</text></h2>
    <div class="LoginBox">
        <form action="" method="Post">
            <h3 class="header">تسجيل الدخول </h3><br><br>
            <label class="uname" for="username">الاسم</label><br><br>
            <input class="username" type="text" placeholder="قم بادخال البريد الالكتروني" name="username"><br><br>
            <label class="pword" for="password">كلمة المرور</label><br><br>
            <input class="password" type="password" placeholder="قم بادخال كلمة المرور" name="password"><br><br>
            <a href="ForgetPassword.html" class="rePassword">هل نسيت كلمة المرور ؟</a><br><br>
            <!-- <a href="#" class="LoginBtn"><text class="btn1">تسجيل الدخول  </text></a>
            <a href="#" class="signupBtn"><text class="btn2">إنشاء حساب جديد  </text></a> -->
            <form method="Post" action="/webSite/HomePage">
                <input type="submit" name="login" value="تسجيل الدخول  " class="LoginBtn">
            </form>
            <form method="Post" action="/webSite/SignUp">
                <input type="submit" name="signup" value="إنشاء حساب جديد  " class="signupBtn">
            </form>
        </form>
    </div>
</div>



</body>
</html>