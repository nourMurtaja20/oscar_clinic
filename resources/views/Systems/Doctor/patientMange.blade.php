@extends('layouts.DoctorsLayoouts.layout_Doctor')
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
                                <th>Address</th>
                                <th>phone Number</th>
                                <th>gender</th>
                                {{--<th>date of visitors</th>--}}
                                {{--<th>Reason Visit</th>--}}
                                <th>More..</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($informations as $information)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach($information->Patients as $item)
                                        <td>{{ $item->name ? $item->name : '' }}</td>
                                        <td>{{ $item->email ? $item->email : '' }}</td>
                                    @endforeach
                                    @foreach($information->patientInfo as $item)
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
                                                   title="عرض تفاصيل الزيارة"
                                                   data-target="#showPatientInformation_{{$information->id}}">
                                                    <i class="icon-x1 text-info text-primary-40 flaticon-eye icon-primary"></i>
                                                </a>

                                                <form method="POST"
                                                      action="{{route ('Doctore.Patient.delete',$item->id)}}"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Doctor"
                                                            onclick="return confirm('Are you want to delete this ?')"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Start Show information about Patient--}}

        @foreach($informations as $information)
            <div class="modal fade" id="showPatientInformation_{{$information->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Appintment Information</h5>
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
                                        @foreach($information->Patients as $item)

                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="اسم المريض"
                                                       value="{{ $item->name ? $item->name : '' }}"
                                                       name="PatientName" disabled="true"/>
                                            </div>
                                        @endforeach
                                    </div>

                                    @foreach($countPatinnt as $value)
                                        @if($value->patientID == $information->patientID)
                                            <label class="col-lg-auto col-form-label text-left">:
                                                Title  </label>
                                            <p style="
                                                margin-left: 165px;
                                                margin-top: -33px;
                                            ">
                                                {{$value->title}}
                                            </p>

                                            <label class="col-lg-auto col-form-label text-left">:
                                            Date Appointment </label>
                                            <p style="
                                                margin-left: 165px;
                                                margin-top: -33px;
                                            "> 
                                                {{date('d-m-Y', strtotime($value->start))}}
                                            </p>
                                            <label class="col-lg-auto col-form-label text-left">:
                                                Time Appointment </label>
                                            <p style="
                                                margin-left: 165px;
                                                margin-top: -33px;
                                            ">
                                                {{date('H:i', strtotime($value->start))}}
                                            </p>
                                                    <hr>


                                            @endif
                                        @endforeach

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

    </div>
@endsection
