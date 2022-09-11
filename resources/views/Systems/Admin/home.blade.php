@extends('layouts.AdminLayouts.layout_Admin')
@section('content')
   <h1 style="margin-left: 250px;">Dashboard</h1>

   <div style="position: absolute;width: 290px;height: 100px;left: 284px;top: 178px;background: #1A73B7;border-radius: 4px;">
       <h6 style="margin-left: 22px;
    margin-top: 22px;width: 153.86px;height: 24px;left: 308.14px;top: 205px;font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 13px;line-height: 24px;text-transform: capitalize;color: white;">Total Appointment</h6>
       <p style="margin-left: 29px;
font-family: 'Poppins';
font-style: normal;color: white;font-size: 13px;">{{count($Appointments)}}</p>
   </div>

       <div style="position: absolute;width: 290px;height: 100px;left: 620px;top: 178px;background: #00989D;;border-radius: 4px;">
           <h6 style="margin-left: 22px;
    margin-top: 22px;width: 153.86px;height: 24px;left: 308.14px;top: 205px;font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 13px;line-height: 24px;text-transform: capitalize;color: white;">Total Patient</h6>
          
           <p style="margin-left: 29px;
font-family: 'Poppins';
font-style: normal;color: white;font-size: 13px;">{{count($patients)}}</p>
           
       </div>


    {{--<div style="position: absolute;width: 290px;height: 100px;left: 950px;top: 178px;background: #FFB932;border-radius: 4px;">--}}
        {{--<h6 style="margin-left: 22px;--}}
    {{--margin-top: 22px;width: 153.86px;height: 24px;left: 308.14px;top: 205px;font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 13px;line-height: 24px;text-transform: capitalize;color: white;">Total Notification</h6>--}}
        {{--<p style="margin-left: 29px;--}}
{{--font-family: 'Poppins';--}}
{{--font-style: normal;color: white;font-size: 13px;">{{count($notifications)}}</p>--}}
    {{--</div>--}}
    <div class="m-portlet" style="margin-left: 255px;margin-right: -200px;margin-top: 170px;">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Upcoming Appointment
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin::Section-->
            <div class="m-section">
                <div class="m-section__content">
                    <table class="table table-striped m-table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Doctore Name</th>
                            <th>Patient Name</th>
                            <th>Service</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Appointments as $appointment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @foreach($appointment->users as $info)
                                    <td>{{$info->name}}</td>
                                @endforeach
                                @foreach($appointment->Patients as $info)
                                    <td>{{$info->name}}</td>
                                @endforeach
                                @foreach($appointment->services as $u)
                                    <td>{{$u->title}}</td>
                                @endforeach
                                <td>{{date('d-m-Y', strtotime($appointment->start))}}</td>

                                <td>{{date('h:s', strtotime($appointment->start))}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection