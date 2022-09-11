@extends('layouts.ReciptionLayouts.layout_Reciption')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Appointment Page</div>
                <div class="card-body">
                    <button type="button" class=" btn-success btn-sm" title="Add New "
                            aria-haspopup="true" aria-expanded="false" data-toggle="modal"
                            data-target="#AppointmentAdd">
                        <i class="fa fa-plus" adden="ria-hitrue"></i>
                        <span class="svg-icon svg-icon-md">
                        </span>Add Appointment
                    </button>
                    <button type="button" class=" btn-success btn-sm" title="Add New "
                            aria-haspopup="true" aria-expanded="false" data-toggle="modal"
                            data-target="#AppointmentAddOrthodontics">
                        <i class="fa fa-plus" adden="ria-hitrue"></i>
                        <span class="svg-icon svg-icon-md">
                        </span>Add Appointment Orthodontics
                    </button>


                    <br/>
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <br/>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Service</th>
                                <th>Dr.Name</th>
                                <th>Data</th>
                                <th>Time</th>
                                <th>Status</th>
                                {{--<th>Note</th>--}}
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach($appointment->Patients as $info)
                                        <td>{{$info ->name? $info ->name:''}}</td>
                                    @endforeach
                                    <td>{{$appointment->title}}</td>

                                    @foreach($appointment->users as $info)
                                        <td>{{$info ->name? $info ->name:''}}</td>
                                    @endforeach
                                    <td>{{date('d-m-Y', strtotime($appointment->start))}}</td>
                                    <td>{{date('H:i', strtotime($appointment->start))}}</td>
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
                                        <a href="#Edit" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="تعديل "
                                           data-target="#EditappointmentInformation_{{$appointment->id}}">
                                            <i class="icon-x1 text-info text-primary-40  flaticon-edit icon-primary"></i>
                                        </a>
                                        <form method="POST" action="{{route ('Reciption.Appointment.delete',$appointment->id)}}"
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


        <!--start: modal for Add patient -->

        <div class="modal fade" id="AppointmentAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add New Appointment </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route ('Reciption.Appointment.store')}}" method="get">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left" style="margin-left: 184px;
                                                margin-top: -20px;"> Patient Name </label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="Pname" name="Pname"
                                                style="margin-left: 370px;width: 400px;margin-top: -51px;">
                                            <option selected></option>
                                            @foreach ($patients as $item)
                                                <option name="Pname"
                                                        value="{{$item->id}}">{{ $item->user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left"
                                           style="margin-left: 184px;margin-top: 19px;">
                                        Service </label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="Service" name="Service"
                                                style="margin-left: 370px;width: 400px;margin-top: -51px;">
                                            <option selected></option>

                                            @foreach($services as $service)
                                                @if($service->title!='تقويم الاسنان')
                                                    <option name="Service"
                                                            value="{{$service->id}}">{{$service->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>


                                    </div>

                                </div>


                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left" style="margin-left: 199px;
                            margin-top: 13px;padding-left: 0px;">Data and Start Time</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"
                                               placeholder="تاريخ الموعد" style="    
                                        margin-left: 366px;width: 405px;margin-top: -40px;"
                                               value="" name="start" id="datetimepicker1" style=" margin-left: 245px;
;"/>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Add</button>
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="AppointmentAddOrthodontics" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalSizeLg"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add Appointment Orthodontics </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route ('Reciption.Appointment.store')}}" method="get">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left" style="margin-left: 184px;
                                                margin-top: -20px;"> Patient Name </label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="Pname" name="Pname"
                                                style="margin-left: 370px;width: 400px;margin-top: -51px;">
                                            <option selected></option>
                                            @foreach ($patients as $item)
                                                <option name="Pname"
                                                        value="{{$item->id}}">{{ $item->user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left"
                                           style="margin-left: 184px;margin-top: 19px;">
                                        Service </label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="Service" name="Service"
                                                style="margin-left: 370px;width: 400px;margin-top: -51px;">
                                            <option selected></option>
                                            @foreach($services as $service)
                                                @if($service->title=='تقويم الاسنان')
                                                    <option name="Service"
                                                            value="{{$service->id}}"
                                                            selected>{{$service->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left" style="margin-left: 199px;
                            margin-top: 13px;padding-left: 0px;">Data and Start Time</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"
                                               placeholder="تاريخ الموعد" style="    
                                        margin-left: 366px;width: 405px;margin-top: -40px;"
                                               value="" name="start" id="datetimepicker2" style=" margin-left: 245px;
;"/>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Add</button>
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>


        {{--start Edit information about appointment--}}
        @foreach($Appointments as $appointment)
            <div class="modal fade" id="EditappointmentInformation_{{$appointment->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Appointment Page</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    margin-right: 1px;">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route ('Reciption.Appointment.update',$appointment->id)}}" method="get">
                               
                            @foreach($appointment->Patients as $info)

                            <p class="card-text">patient name :
                                    <input type="text" name="name" value="{{$info->name? $info->name:''}}" class="form-control" style="margin-left: 120px;width: 585px;margin-top: -30px;">
                                    
                                </p>
                                    @endforeach
                           
                                <div class="separator separator-dashed my-5"></div>
                                @foreach($appointment->services as $service)
                                    <p class="card-text">Service Name :
                                        <input type="text" name="name" value="{{$service->title}}" class="form-control" style="margin-left: 120px;width: 585px;  margin-top: -30px;">

                                    </p>
                                @endforeach
                                <div class="separator separator-dashed my-5"></div>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Date :
                                    <input type="text" name="name"
                                           value="{{date('d-m-Y', strtotime($appointment->start))}}" class="form-control" style="margin-left: 120px;width: 585px; margin-top: -30px;">
                                </p>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Time :
                                    <input type="text" name="name"
                                           value="{{date('h:s', strtotime($appointment->start))}}" class="form-control" style="margin-left: 120px;width: 585px;  margin-top: -30px;">

                                </p>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="separator separator-dashed my-5"></div>

                                <div class="m-form__group form-group">
                                    <label for="">Status:</label>
                                    <div class="m-radio-inline">
                                        @if($appointment->status==0)
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="0" checked="true"> Coming
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="1"> Completed
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="2"> Bloked
                                                <span></span>
                                            </label>
                                        @elseif($appointment->status==1)

                                            <label class="m-radio" style="margin-left: 120px;">
                                                <input type="radio" name="status" value="1" checked="true">  Completed
                                                <span></span>
                                            </label>
                                            <div class="separator separator-dashed my-5"></div>
                                            <div class="col-md-8">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label style="margin-left: -10px;">Note:</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <input type="text"
                                                               class="form-control m-input--fixed-large"
                                                               placeholder="Enter full Notes"
                                                               name="noteText" class="form-control" style="margin-left: 100px;"> 
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

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    showSeconds: false,
                    daysOfWeekDisabled: [6, 5],
                    hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7, 17, 18, 19, 20, 21, 22, 23]
                });
            });

            $(function () {
                $('#datetimepicker2').datetimepicker({
                    showSeconds: false,
                    daysOfWeekDisabled: [1, 4, 3, 2, 0, 5],
                    hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7, 17, 18, 19, 20, 21, 22, 23]
                });
            });
        </script>
    </div>
@endsection