<header>
    <nav>
        <div class="logo">
            <a href="#"><img class="image" src="{{ asset('assets/images/logo.png')}}" alt="logo">Clinic
                <text
                        style="color: #1A73B7;">Oscar
                </text>
            </a>
            <!-- <h2 class="Oscar" style="color: #82C8E5;">Oscar <text style="color: #82C8E5;">Clinic</text></h2> -->
        </div>
        <div class="toggle">
            <a href="#">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <ul class="menu">
            <li><a href="/Patient/HomePage" class="item">الرئيسية</a></li>
            <li><a href="/Patient/Services" class="item">خدماتنا</a></li>
            <li><a href="/Patient/AboutUs" class="item">من نحن</a></li>
            <li><a href="/Patient/bookAppointment" class="item">حجز موعد</a></li>
            <li><a href="/Patient/ContactUs" class="item">تواصل معنا</a></li>
        </ul>
        <ul class="menuA">
            <li><a href="/patientProfile"><img class="profileImage" src="{{ asset('assets/images/image4.png')}}"
                                 onclick="FunctionopenLogout()" style="  margin-right: -19%;"></a></li>
            <!-- <li><a href="#"><img class="profilenotc" src="{{ asset('assets/images/notification.png')}}"></a></li> -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class=" nav-link" style="
    right: 15px;" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="
    right: 10px;" href="{{ route('register') }}">{{ __('إنشاء حساب') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{--{{ Auth::user()->name }}--}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
            </ul>

        </ul>
    </nav>
</header>