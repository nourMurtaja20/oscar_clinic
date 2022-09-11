@extends('layouts.ReciptionLayouts.layout_Reciption')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header" style="font-weight: bold">Doctor Page</div>
                <div class="card-body">
                    <br/>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>name</th>
                                <th>email</th>
                                {{--هنا بيتم تحديد اذا بيعمل تقويم(2) أولا جراحة أسنان(1) أو بيعمل حشوة (0) --}}
                                <th>specialization</th>
                                <th>More..</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach ($doctors as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item->user ? $item->user->name : '' }}</td>
                                    <td>{{ $item->user ? $item->user->email : '' }}</td>

                                    @if($item->specialization ==0)
                                        <td>طب أسنان عام</td>
                                    @elseif($item->specialization ==1)
                                        <td>جراحة أسنان</td>
                                    @elseif($item->specialization ==2)
                                        <td>تقويم أسنان</td>

                                    @endif
                                    <td>
                                        <a href="#view" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="عرض بيانات الدكتور"
                                           data-target="#showdoctorInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-eye icon-primary"></i>
                                        </a>

                                        <a href="#Edit" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="تعديل بيانات الدكتور"
                                           data-target="#EditdoctorInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-edit icon-primary"></i>
                                        </a>
                                        <form method="POST" action="{{route ('Reciption.Doctre.delete',$item->id)}}"
                                              style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Doctor"
                                                    onclick="return confirm('Are you want to delete this ?')"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{--start show information about doctor--}}
    @foreach($doctors as $doctor)
        <!-- begin::view Info -->
            <div class="modal fade" id="showdoctorInformation_{{$doctor->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Doctor Page</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    margin-right: 0px;
">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-right">:
                                            Doctor
                                            Name </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="اسم الدكتور"
                                                   value="{{ $doctor->user ? $doctor->user->name : ''  }}"
                                                   name="DoctorName" disabled="true"/>
                                        </div>

                                    </div>
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Doctor
                                            email </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="البريد الالكتروني للدكتور"
                                                   value="{{ $doctor->user ? $doctor->user->email : ''  }}" name="email"
                                                   disabled="true"/>
                                        </div>

                                    </div>
                                    <div class="form-group row" style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-right"> : specialization</label>
                                        @if($doctor->specialization ==0)
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                       placeholder="تخصص الدكتور"
                                                       value="طب أسنان عام" name="specialization" disabled="true"/>
                                            </div>
                                        @elseif($doctor->specialization ==1)
                                            <input type="text" class="form-control"
                                                   placeholder="تخصص الدكتور"
                                                   value="جراحة أسنان" name="specialization" disabled="true"/>
                                        @elseif($doctor->specialization ==2)
                                            <input type="text" class="form-control"
                                                   placeholder="تخصص الدكتور"
                                                   value="تقويم أسنان" name="specialization" disabled="true"/>

                                        @endif
                                    </div>
                                    <div class="m-form__group form-group" style="
    margin-left: 0px;">
                                        <label for="">working days</label>
                                        <div class="m-checkbox-inline">
                                            <label class="m-checkbox">
                                                <input type="checkbox" checked="true">{{$doctor->TimeForWork}}
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="m-form__help"></span>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{--End show informtion about doctor--}}

        {{--start Edit information about doctor--}}
        @foreach($doctors as $doctor)
            <div class="modal fade" id="EditdoctorInformation_{{$doctor->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Doctor Page</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    margin-right: 0px;
">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route ('Reciption.Doctre.update',$doctor->id)}}" method="get">

                                <div class="card-body">
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-right">:
                                            Doctor Name :</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="اسم الدكتور"
                                                   value="{{ $doctor->user ? $doctor->user->name : ''  }}"
                                                   name="DoctorName" disabled="true"/>
                                        </div>

                                    </div>
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Doctor email: </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="البريد الالكتروني للدكتور"
                                                   value="{{ $doctor->user ? $doctor->user->email : '' }}"
                                                   name="email"/>
                                        </div>

                                    </div>
                                    <div class="form-group row" style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-right"> specialization :</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="specialization" name="specialization">
                                                @if( $doctor->specialization=0 )
                                                    <option selected value="0" Selected="true">طب أسنان عام</option>
                                                    <option value="1">جراحة أسنان</option>
                                                    <option value="2">تقويم أسنان</option>

                                                @elseif($doctor->specialization=1)
                                                    <option value="1" Selected="true">جراحة أسنان</option>
                                                    <option selected value="0">طب أسنان عام</option>
                                                    <option value="2">تقويم أسنان</option>
                                                @elseif($doctor->specialization=2)
                                                    <option value="2" Selected="true">تقويم أسنان</option>
                                                    <option selected value="0">طب أسنان عام</option>
                                                    <option value="1">جراحة أسنان</option>

                                                @endif
                                            </select>

                                        </div>

                                    </div>
                                    <div class="m-form__group form-group" style="
    margin-left: 0px;">

                                        <label for="">working days :</label>
                                        <div class="m-checkbox-inline">
                                            @if($doctor->TimeForWork=='Saturday - Monday - Wednesday')
                                                <label class="m-checkbox">
                                                    <input type="checkbox" value="1" name="TimeForWork" checked="true">Saturday
                                                    - Monday -
                                                    Wednesday
                                                    <span></span>
                                                </label>
                                                <label class="m-checkbox">
                                                    <input type="checkbox" value="2" name="TimeForWork"> Sunday -
                                                    Tuesday -
                                                    Thursday
                                                    <span></span>
                                                </label>
                                            @elseif($doctor->TimeForWork=='Sunday - Tuesday - Thursday')
                                                <label class="m-checkbox">
                                                    <input type="checkbox" value="1" name="TimeForWork">Saturday -
                                                    Monday -
                                                    Wednesday
                                                    <span></span>
                                                </label>
                                                <label class="m-checkbox">
                                                    <input type="checkbox" value="2" name="TimeForWork" checked="true">
                                                    Sunday - Tuesday -
                                                    Thursday
                                                    <span></span>
                                                </label>
                                            @else
                                                <label class="m-checkbox">
                                                    <input type="checkbox" value="1" name="TimeForWork" checked="true">Saturday
                                                    - Monday -
                                                    Wednesday
                                                    <span></span>
                                                </label>
                                                <label class="m-checkbox">
                                                    <input type="checkbox" value="2" name="TimeForWork" checked="true">
                                                    Sunday - Tuesday -
                                                    Thursday
                                                    <span></span>
                                                </label>
                                            @endif
                                        </div>

                                        <span class="m-form__help"></span>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{--End Edit informtion about doctor--}}

    </div>
@endsection
