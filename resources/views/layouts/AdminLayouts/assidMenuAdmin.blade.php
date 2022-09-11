<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
            class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
         m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">

        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            {{--الصفحة الرئيسية للأدمن--}}
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="/admin/home" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title"> <span class="m-menu__link-wrap">
         <span class="m-menu__link-text">Main</span>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="/admin/AddNewUser" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">Create a new User</span></a>
            </li>



            {{--إدارة صفحات الدكاترة--}}
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="/admin/DoctoreMange" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">Doctor Page</span></a>
            </li>

            {{--إدارة صفحات الاستقبال المرضى--}}
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="/admin/ReciptionMange" class="m-menu__link m-menu__toggle"><i
                            class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">Reception Page</span></a>
            </li>
            {{--إدارة صفحــات المريض--}}
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="/admin/patientMange" class="m-menu__link m-menu__toggle"><i
                            class="m-menu__link-icon flaticon-layers">
                    </i><span class="m-menu__link-text">Pateint Page </span></a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="/admin/Appointment" class="m-menu__link m-menu__toggle"><i
                            class="m-menu__link-icon flaticon-layers">
                    </i><span class="m-menu__link-text">Appointment Page </span></a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="/admin/not" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-layers">
                    </i><span class="m-menu__link-text">Notification</span></a>
            </li>
            {{--الأمراض المزمنة--}}
            {{--<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">--}}
            {{--<a href="{{ route('') }}" class="m-menu__link m-menu__toggle">--}}
            {{--<i class="m-menu__link-icon flaticon-layers"></i>--}}
            {{--<span class="m-menu__link-text">Chronic Diseases </span></a>--}}
            {{--</li>--}}


        </ul>
    </div>
    </li>
    </ul>
</div>

<!-- END: Aside Menu -->
