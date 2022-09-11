<html>

<head>
    <title> Sign Up </title>
    <link rel="stylesheet" href="{{ asset('assets/css/SignUp.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div>
    <div class="box">
        <img class="image" src="{{ asset('assets/images/image 1.png')}}">
        <h2 class="Oscar">Oscar <text style="color: #82C8E5;">Clinic</text></h2>
    </div>
    <div>
        <div class="div1">
            <form action="" method="post">
                <h3 class="create"> إنشاء حساب جديد</h3>

                <label class="uname" for="username">الاسم</label>
                <input class="username" type="text" placeholder="قم بادخال الاسم " name="username">

                <label class="email" for="email">البريد الالكتروني</label>
                <input class="email1" type="email" placeholder="قم بادخال البريد الالكتروني  " name="email">

                <label class="mobile" for="mobile">رقم الجوال </label>
                <input class="mobile1" type="text" placeholder="قم بادخال رقم الجوال " name="mobile" readonly>

                <label class="pass" for="password">كلمة المرور </label>
                <input class="pass1" type="password" placeholder="قم بادخال كلمة المرور " name="password">

                <label class="bairthday" for="bairthday">تاريخ الميلاد</label>
                <input class="bairthday1" type="date" placeholder="قم بادخال تاريخ الميلاد" name="bairthday">

                <label class="Living" for="Living">السكن</label>
                <input class="Living1" type="text" placeholder="قم بادخال السكن" name="Living">

                <label class="gender" for="gender">الجنس</label>
                <input type="radio"  name="fav_language" value="ذكر" class="gendermale">
                <label for="html"class="Lgendermale" >ذكر</label>
                <input type="radio"  name="fav_language" value="انثى" class="genderfemale">
                <label for="html"class="Lgenderfemale"  >انثى</label>

                <label class="Diseases" for="Diseases">أمراض مزمنة</label>
                <select class="Diseases1"  >
                    <option >سكري</option>
                    <option>ضغط</option>
                    <option>قلب</option>
                </select>

                <p class="haveaccount">هل لديك حساب؟</p>
                <a href="/webSite/SignIn" class="a1">تسجيل الدخول</a>
                <input type="submit" class="submit" value="إنشاء حساب">

            </form>
        </div>
    </div>

</div>
</body>