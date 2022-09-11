@extends('layouts.AdminLayouts.layout_Admin')
@section('content')

    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--tabs" style="margin-left: 255px;">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Create a new User
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--right m-tabs-line-danger" role="tablist">
                    <li class="nav-item m-tabs__item" style="
    margin-right: 16px;">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#Reciption" role="tab">
                            Reciption
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item" style="
    margin-right: 61px;">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#Doctore" role="tab">
                            Doctor
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#patients" role="tab">
                            Patient
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="Reciption">
                    <form action="{{route ('admin.Reciption.store')}}" method="get">
                        <div class="card-body">
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-right">Name </label>
                                <div class="col-lg-9">
                                    <input style="margin-left:60px;" type="text" class="form-control" placeholder="الاسم "
                                           value=""
                                           name="name"/>
                                </div>

                            </div>
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">Email </label>
                                <div class="col-lg-9">
                                    <input style="margin-left:60px;" type="text" class="form-control"
                                           placeholder="البريد الالكتروني "
                                           value=""
                                           name="email"/>
                                </div>

                            </div>

                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">Phone Number </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"
                                           placeholder="رقم الهاتف"
                                           value="" name="phone"/>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row " style="
    margin-left: 0px;">
                            <label style="margin-left: 16px;
    margin-top: -7px;" class="col-lg-auto col-form-label text-left">Address </label>
                            <div class="col-lg-8">
                                <input style="    margin-left: 43px;
                                margin-top: -13px;" type="text" class="form-control"
                                       placeholder="عنوان السكن "
                                       value="" name="addres"/>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Create</button>
                        </div>

                    </form>
                </div>
                <div class="tab-pane" id="Doctore">
                    <form action="{{route ('admin.Doctre.store')}}" method="get" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-right">
                                    Name </label>
                                <div class="col-lg-9">
                                    <input style="margin-left: 50px;" type="text" class="form-control" placeholder="الاسم "
                                           value="" 
                                           name="name"/>
                                </div>

                            </div>
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">
                                    Email </label>
                                <div class="col-lg-9" >
                                    <input style="margin-left: 51px;" type="text" class="form-control"
                                           placeholder="البريد الالكتروني "
                                           value="" 
                                           name="email"/>
                                </div>

                            </div>

                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">
                                    Phone Number </label>
                                <div class="col-lg-9">
                                    <input style="    margin-left: -8px;
" type="text" class="form-control"
                                           placeholder="رقم الهاتف"
                                           value="" name="phone"/>
                                </div>

                            </div>

                            <div class="form-group row" style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-right"> Specialization </label>
                                <div class="col-lg-9">
                                    <select class="form-control" id="specialization" name="specialization">
                                        <option selected value="0" Selected="true">طب أسنان عام</option>
                                        <option value="1">جراحة أسنان</option>
                                        <option value="2">تقويم أسنان</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">
                                    Working days </label>
                                <div style="margin-top: 11px;
    margin-left: 6px;" class="col-lg-9">
                                    <label class="m-checkbox">
                                        <input type="checkbox" value="1" name="TimeForWork"> Saturday
                                        
                                        <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                        <input type="checkbox" value="2" name="TimeForWork">
                                        Sunday - Monday - Tuesday - Wednesday-  Thursday
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">
                                    Address </label>
                                <div class="col-lg-8">
                                    <input style="    margin-left: 28px;" type="text" class="form-control"
                                           placeholder="عنوان السكن "
                                           value="" name="addres"/>
                                </div>

                            </div>

                            <div class="m-form__group form-group">
                                <label style="margin-left: 15px;margin-top: 10px;" for="">Gender</label>
                                <div style="margin-left: 120px;
    margin-top: -26px;" class="m-radio-inline">
                                    <label class="m-radio">
                                        <input type="radio" name="gender" value="1"> Female
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="gender" value="0"> Male
                                        <span></span>
                                    </label>

                                </div>
                            </div>

                            {{--<div class="col-4">--}}
                                {{--<label for="exampleInputEmail1">أختر صوره العرض</label>--}}
                                {{--<input type="file"  class="form-control" name="file"/>--}}
                                {{--<small id="photo_error" class="form-text text-danger"></small>--}}
                            {{--</div>--}}

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Create</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="tab-pane" id="patients">
                    <form action="{{route ('admin.patients.store')}}" method="get">
                        <div class="card-body">
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-right">:
                                    Name </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="الاسم "
                                           value="" style="margin-left: 50px;"
                                           name="name"/>
                                </div>
                            </div>
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">Email</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"
                                           placeholder="البريد الالكتروني "
                                           value="" style="margin-left: 52px;"
                                           name="email"/>
                                </div>

                            </div>

                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">Phone Number </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control"
                                           placeholder="رقم الهاتف"
                                           value="" name="phone"/>
                                </div>
                                <label class="col-lg-auto col-form-label text-left">Date Of Birth </label>
                                <div class="col-lg-3">
                                    <input type="date" class="form-control"
                                           placeholder="تاريخ ميلاد المريض"
                                           value="" name="DataOfBirth"/>
                                </div>

                            </div>
                            <div class="form-group row " style="
    margin-left: 0px;">
                                <label class="col-lg-auto col-form-label text-left">Address </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control"
                                           placeholder="عنوان السكن " style="margin-left: 43px;"
                                           value="" name="addres"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row " style="
    margin-left: 0px;">
                            <label class="col-lg-auto col-form-label text-left" style="margin-left: 10px;
    margin-top: -10px;">
                                chronic Diseases </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control"
                                       placeholder="الأمراض المزمنة "  style="margin-left: -13px;
    margin-top: -10px;"
                                       value="" name="chronicDiseases"/>
                            </div>
                        </div>
                        {{--to save data in dataBase use 1 for femal and 0 for male--}}
                        <div class="m-form__group form-group">
                            <label style="margin-left: 27px;
    margin-top: 10px;" for="">Gender</label>
                            <div style="margin-left: 140px;
    margin-top: -25px;" class="m-radio-inline">
                                <label class="m-radio">
                                    <input type="radio" name="gender" value="1"> Female
                                    <span></span>
                                </label>
                                <label class="m-radio">
                                    <input type="radio" name="gender" value="0"> Male
                                    <span></span>
                                </label>

                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Create</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--end::Portlet-->

@endsection
