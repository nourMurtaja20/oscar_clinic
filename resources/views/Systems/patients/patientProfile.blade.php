@extends('layouts.patientLayouts.patientLayouts')
@section('content')
<div class="divflex">
    <a href="#" class="div3" onclick="Functionopen()">تعديل</a>
    <img src="{{ asset('assets/images/image4.png')}}" class="div2">
    <div class="divflex2S">
        @foreach($patients as $item)
            <h1 class="h1">{{ $item->user ? $item->user->name : '' }}</h1>
            <div class="divflex4">
                <div class="divflex5">
                    <img class="img2" src="{{ asset('assets/images/vector6.png')}}">
                    <h1 class="h2">{{ $item->user ? $item->user->email : '' }}</h1>
                </div>
                <div class="divflex5">
                    <img class="img2" style="left: 918px;" src="{{ asset('assets/images/vector5.png')}}">
                    <h1 class="h2" style="left: 792px;">{{$item->phone}}</h1>
                </div>
                <div class="divflex5">
                    <img class="img2" style="left: 744px;" src="{{ asset('assets/images/vector4.png')}}">
                    <h1 class="h2" style="left: 650px;">{{$item->addres}}</h1>
                </div>
                @endforeach
            </div>
    </div>
</div>

<div class="dflex">
    <a href="#" class="div4" onclick="FunctionReservations()">الحجوزات </a>
    <a href="#" class="div4" style="left: 1100px;" onclick="Functioncoming()">القادم </a>
    <a href="#" class="div4" style="left: 1017px;" onclick="FunctionNotes()">الملاحظات </a>
</div>
@foreach($appointments as $appointment)
    <div id="Reservations">
        {{--<h1 class="h3">اليوم</h1>--}}
        <div class="div5">
            <h1 class="h4">موعد رقم
                {{$loop->iteration}}</h1>
            <a href="/patintAppointment/Delete/{{$appointment->id}}" class="h11">حذف</a>
            <h1 class="h5">التاريخ:{{date('d-m-Y', strtotime($appointment->start))}} </h1>
            <h1 class="h5" style="top: 75px;">الوقت:{{date('H:i', strtotime($appointment->start))}} </h1>

            @foreach($appointment->users as $info)
                <h1 class="h5" style="top: 110px;">الطبيب:{{$info ->name? $info ->name:''}} </h1>
            @endforeach

            <h1 class="h5" style="top: 145px; width: 200px; left: 410px;"> نوع الموعد:{{$appointment->title}}</h1>
        </div>
    </div>

@endforeach

@foreach($appointments as $appointment)
    @if($appointment->status==0)
        <div id="coming" hidden>
            <div class="div5">
                <h1 class="h4">موعد رقم
                    {{$loop->iteration}}</h1>
                <a href="/patintAppointment/Delete/{{$appointment->id}}" class="h11">حذف</a>
                <h1 class="h5">التاريخ:{{date('d-m-Y', strtotime($appointment->start))}} </h1>
                <h1 class="h5" style="top: 75px;">الوقت:{{date('H:i', strtotime($appointment->start))}} </h1>

                @foreach($appointment->users as $info)
                    <h1 class="h5" style="top: 110px;">الطبيب:{{$info ->name? $info ->name:''}} </h1>
                @endforeach

                <h1 class="h5" style="top: 145px; width: 200px; left: 410px;"> نوع الموعد:{{$appointment->title}}</h1>
            </div>

        </div>
    @endif
@endforeach

@foreach($appointments as $appointment)
@if($appointment->status ==1)
    <div id="Notes" hidden>
        <h1 class="h3">اليوم</h1>
        <div class="div5">
            <h1 class="h4">موعد رقم
                {{$loop->iteration}}</h1>
            <a href="/patintAppointment/Delete/{{$appointment->id}}" class="h11">حذف</a>
            <h1 class="h5">التاريخ:{{date('d-m-Y', strtotime($appointment->start))}} </h1>
            <h1 class="h5" style="top: 75px;">الوقت:{{date('H:i', strtotime($appointment->start))}} </h1>

            @foreach($appointment->users as $info)
                <h1 class="h5" style="top: 110px;">الطبيب:{{$info ->name? $info ->name:''}} </h1>
            @endforeach

            <h1 class="h5" style="top: 145px; width: 300px; left: 410px;"> نوع الموعد:{{$appointment->title}}</h1>

            <h1 class="h5" style="top: 145px; width: 400px; left: 410px;"> نوع الملاحظة
                :{{$appointment->Notes->noteText}}
                </h1>
        </div>

    </div>
    @endif
@endforeach

<div class="div11" id="back">
    @foreach($patients as $item)
        <div id="div7">
            <form action="{{route ('patient.profile.update',$item->id)}}" method="get">
                <p class="h6">تعديل البيانات الشخصية</p>
                <img src="{{ asset('assets/images/cros.png')}}" id="img7" onclick="Functionclose()">
                <h1 class="h7">الاسم</h1>
                <input class="username" type="text" value="{{ $item->user ? $item->user->name : '' }}" name="username"
                       disabled>
                <h1 class="h8">البريد الالكتروني</h1>
                <input class="email" type="email" value="{{ $item->user ? $item->user->email : '' }}" name="email">
                <h1 class="h9"> رقم الهاتف</h1>
                <input class="phoneno" type="text" value="{{$item->phone}}" name="phoneno">
                <h1 class="h10">عنوان السكن</h1>
                <input class="address" type="text" value="{{$item->addres}}" name="address">

                <div class="card-footer">
                <input type="submit" class="submit" value=" تعديل">
                    <!-- <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                </div>
            </form>
        </div>
    @endforeach
</div>
@endsection
