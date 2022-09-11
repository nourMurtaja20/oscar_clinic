@extends('layouts.AdminLayouts.layout_Admin')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Pateints Page</div>
                <div class="card-body">

                    <br/>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Date of Bearth</th>
                                <th>Address</th>
                                <th>phone Number</th>
                                <th>gender</th>
                                <th>More..</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pateints as $item)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item->user ? $item->user->name : '' }}</td>
                                    <td>{{ $item->user ? $item->user->email : '' }}</td>

                                    <td>{{ $item->DataOfBirth }}</td>
                                    <td>{{ $item->addres }}</td>
                                    <td>{{ $item->phone }}</td>

                                    @if($item->gender==1)
                                        <td>أنثى</td>
                                    @elseif($item->gender==0)
                                        <td>ذكر</td>
                                    @endif
                                    <td>
                                        <a href="#view" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="عرض بيانات المرضى"
                                           data-target="#showPatientInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-eye icon-primary"></i>
                                        </a>
                                        <a href="#Edit" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="تعديل بيانات المرضى"
                                           data-target="#EditPatientInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-edit icon-primary"></i>
                                        </a>
                                        <form method="POST" action="{{route ('admin.Patient.delete',$item->id)}}"
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

        {{-- Start Show information about Patient--}}

        @foreach ($pateints as $pateint)
            <div class="modal fade" id="showPatientInformation_{{$pateint->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Patient Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    margin-right: 0px;">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-right">:
                                            Patient Name </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="اسم المريض"
                                                   value="{{$pateint->user ? $pateint->user->name : ''  }}"
                                                   name="PatientName" disabled="true"/>
                                        </div>

                                    </div>
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Patient email </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="البريد الالكتروني للمريض"
                                                   value="{{$pateint->user ? $pateint->user->email : ''  }}"
                                                   name="email"
                                                   disabled="true"/>
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Phone Number </label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control"
                                                   placeholder="رقم الهاتف"
                                                   value="{{$pateint->phone}}" name="phone"
                                                   disabled="true"/>
                                        </div>
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Date Of Bearth </label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control"
                                                   placeholder="تاريخ ميلاد المريض"
                                                   value="{{$pateint->DataOfBirth }}" name="DataOfBirth"
                                                   disabled="true"/>
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            chronic Diseases </label>
                                        <input type="text" class="form-control col-8"
                                               placeholder="الأمراض المزمنة"
                                               name="chronicDiseases"
                                               value="{{$pateint->chronicDiseases}}"
                                               disabled="true"/>
                                    </div>


                                </div>
                                <div class="form-group row " style="
    margin-left: 0px;">
                                    <label class="col-lg-auto col-form-label text-left">:
                                        Address </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"
                                               placeholder="عنوان سكن المريض"
                                               value="{{$pateint->addres}}" name="addres"
                                               disabled="true"/>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{-- End Show information about Patient--}}

        {{-- Start Edit information about Patient--}}
        @foreach ($pateints as $pateint)
            <div class="modal fade" id="EditPatientInformation_{{$pateint->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Patient Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    margin-right: 0px;">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route ('admin.Patient.update',$pateint->id)}}" method="get">
                                <div class="card-body">
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-right">:
                                            Patient Name </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="اسم المريض"
                                                   value="{{$pateint->user ? $pateint->user->name : ''  }}"
                                                   name="PatientName"/>
                                        </div>

                                    </div>
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Patient email </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="البريد الالكتروني للمريض"
                                                   value="{{$pateint->user ? $pateint->user->email : ''  }}"
                                                   name="email"
                                            />
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Phone Number </label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control"
                                                   placeholder="رقم الهاتف"
                                                   value="{{$pateint->phone}}" name="phone"
                                            />
                                        </div>
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Date Of Bearth </label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control"
                                                   placeholder="تاريخ ميلاد المريض"
                                                   value="{{$pateint->DataOfBirth }}" name="DataOfBirth"
                                            />
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            chronic Diseases </label>
                                        <input type="text" class="form-control col-8"
                                               placeholder="الأمراض المزمنة"
                                               name="chronicDiseases"
                                               value="{{$pateint->chronicDiseases}}"
                                        />
                                    </div>


                                </div>
                                <div class="form-group row " style="
    margin-left: 0px;">
                                    <label class="col-lg-auto col-form-label text-left">:
                                        Address </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"
                                               placeholder="عنوان سكن المريض"
                                               value="{{$pateint->addres}}" name="addres"
                                        />
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{-- End Edit information about Patient--}}
    </div>
@endsection
