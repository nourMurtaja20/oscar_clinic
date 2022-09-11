@extends('layouts.DoctorsLayoouts.layout_Doctor')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Appointment Page</div>
                <div class="card-body">

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Service</th>
                                <th>Data</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($Appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach($appointment->Patients as $info)
                                        <td>{{$info->name}}</td>
                                    @endforeach
                                    @foreach($appointment->services as $u)
                                        <td>{{$u->title}}</td>
                                    @endforeach
                                    <td>{{date('d-m-Y', strtotime($appointment->start))}}</td>

                                    <td>{{date('h:s', strtotime($appointment->start))}}</td>
                                    @if($appointment->status==0)
                                        <td nowrap="nowrap"><span
                                                    class="label label-lg label-inline mr-2 label-rounded m-btn--label-warning"
                                                    style="color: #ffc215;">
                                      Coming </span>
                                        </td>
                                    @elseif($appointment->status==1)
                                        <td nowrap="nowrap"><span
                                                    class="label label-lg label- mr-2 label-rounded label-success"
                                                    style="color: #1A73B7;">
                                      Completed </span>
                                        </td>
                                    @elseif($appointment->status==2)
                                        <td nowrap="nowrap"><span
                                                    class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                                    style="color: #c42a20;">
                                      Bloked </span>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="#view" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="عرض"
                                           data-target="#showappointmentInformation_{{$appointment->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-eye icon-primary"></i>
                                        </a>
                                        <a href="#Edit" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="تعديل "
                                           data-target="#edit{{$appointment->id}}">
                                            <i class="icon-x1 text-info text-primary-40  flaticon-edit icon-primary"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{route ('Doctor.Appointment.delete',$appointment->id)}}"
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
    </div>
        {{--start show information about appointment--}}
        @foreach($Appointments as $appointment)
            <div class="modal fade" id="showappointmentInformation_{{$appointment->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Appointment Page</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" margin-left: 294px;">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form">
                                @foreach($appointment->Patients as $info)
                                <p class="card-text">patient name :{{$info->name}}</p>
                                @endforeach
                                <div class="separator separator-dashed my-5"></div>
                                @foreach($appointment->services as $service)
                                    <p class="card-text">Service Name : {{$service->title}}</p>
                                @endforeach
                                <div class="separator separator-dashed my-5"></div>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Date : {{date('d-m-Y', strtotime($appointment->start))}}</p>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Time : {{date('h:s', strtotime($appointment->start))}}</p>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text" style="
                                        margin-bottom: 35px;">Status :

                                    @if($appointment->status==0)
                                        <span
                                                class="label label-lg label-inline mr-2 label-rounded m-btn--label-warning"
                                                style="color: #ffc215;">
                                      Coming </span>

                                    @elseif($appointment->status==1)
                                        <span
                                                class="label label-lg label- mr-2 label-rounded label-success"
                                                style="color: #1A73B7;">
                                      Completed </span>
                                <p class="card-text">Notes  :
                                        <textarea class="form-control" style="width: 300px;
                                            margin-left: 55px;
                                            margin-top: -15px;
                                        ">
                                        {{($appointment->Notes->noteText)}}
                                        </textarea>


                                </p>
                                @elseif($appointment->status==2)
                                    <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                          style="color: #c42a20;">
                                      Bloked </span>
                                @endif
                                    <div class="separator separator-dashed my-5"></div>
                                    <div class="separator separator-dashed my-5"></div>
                                    {{--@foreach($appointment->Notes as $note)--}}

                                    {{--<p class="card-text">Note : {{$note->noteText}}</p>--}}

                                    {{--@endforeach--}}
                                    <div class="separator separator-dashed my-5"></div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                    data-dismiss="modal">اغلاق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--End show information about appointment--}}


        {{--start Edit information about appointment--}}
        @foreach($Appointments as $appointment)
            <div class="modal fade" id="edit{{$appointment->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Appointment Page</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    margin-right: 1px;">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route ('Doctor.Appointment.update',$appointment->id)}}" method="get">
                                @foreach($appointment->Patients as $info)
                                <p class="card-text">patient name :
                                    <input type="text"
                                     name="name" value=" {{$info->name}}" class="form-control"
                                     style="
                                        margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px;
                                    " >
                                </p>
                                @endforeach

                                <div class="separator separator-dashed my-5"></div>
                                @foreach($appointment->services as $service)
                                    <p class="card-text">Service Name :
                                        <input type="text" name="name" 
                                        value="{{$service->title}}" class="form-control" style="margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px;">

                                    </p>
                                @endforeach
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Date :
                                    <input type="text" name="name" class="form-control"
                                           value="{{date('d-m-Y', strtotime($appointment->start))}}" 
                                        style="  margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px;  " > 
                                </p>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Time :
                                    <input type="text" name="name" class="form-control"
                                           value="{{date('h:s', strtotime($appointment->start))}}"
                                          Style="margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px; ">

                                </p>
                                <div class="separator separator-dashed my-5"></div>

                                <div class="m-form__group form-group">
                                    <label for="">Status:</label>
                                    <div class="m-radio-inline">
                                        @if($appointment->status==0)
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="0" checked="true"
                                            Style="    margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px;" > Coming
                                                <span></span>
                                            </label>
                                            <label class="m-radio" Style=" margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px;">
                                                <input  type="radio" name="status" value="1"> Completed
                                                <span style="
    margin-right: 445px;
"></span>
                                            </label>
                                            <label class="m-radio">
                                                <input Style=" margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px;" type="radio" name="status" value="2"> Bloked
                                                <span></span>
                                            </label>
                                        @elseif($appointment->status==1)

                                            <label class="m-radio " Style=" margin-left: 150px;
                                        width: 550px;
                                        margin-top: -28px;">
                                                <input type="radio" name="status" value="1" checked="true"> Completed
                                                <span style="
    margin-right: 445px;
"></span>
                                            </label>
                                            <div class="separator separator-dashed my-5"></div>
                                            <div class="col-md-8">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label>Note:</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <input type="text" style="margin-left: 130px;
                                        width: 550px;
                                        margin-top: -28px;"
                                                               class="form-control m-input--fixed-large"
                                                               placeholder="Enter full Notes"
                                                               name="noteText">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                @elseif($appointment->status==2)
                                    <label class="m-radio">
                                        <input type="radio" name="status" value="2" checked="true"> Bloked
                                        <span></span>
                                    </label>
                                @endif
                                <!--<label class="m-radio">
                                    <input type="radio" name="NoteText">
                                    <span></span>
                                </label>-->
                                <div class="separator separator-dashed my-5"></div>
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
        {{--End Edit information about appointment--}}




@endsection
