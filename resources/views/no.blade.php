

@if(Auth::user()->status=='0'){
<!-- @extends('layouts.ReciptionLayouts.layout_Reciption')
@section('content') -->
<div style="position: absolute;width: 1116px;height: 148px;left: 284px;top: 256px;background: #FFFFFF;border-radius: 4px;">
    @forelse($notifications as $notification)

        <img class="notificationimage" style="width: 50px;height: 50px;margin-left: 40px;margin-top: 25px;"
             src="{{asset ('assets/app/media/img/users/300_9.jpg')}}">
        <br><br>
        <h5 style="margin-left: 125px;font-size: 18px;line-height: 27px;color: #000000;margin-top: -33px;"></h5>
        <p style="font-weight: 400;font-size: 18px;margin-top: 23px;margin-left: 30px;">
            [{{ $notification->created_at }}] has new Appointment {{ $notification->data['title'] }} statrt on
            ({{ $notification->data['start'] }})
            has just send email.</p>
        <a href="{{URL('/Doctor/AppointmentManage')}}" class="float-right mark-as-read"
           data-id="{{ $notification->id }}">
            {{$notification->markAsRead()}}
            read it
        </a>
        @if($loop->last)
            <a href="{{URL('/Doctor/home')}}" id="mark-all">
                {{$notification->markAsRead()}}
                all is read
            </a>
        @endif
    @empty
        <div class="p-3 mb-2 bg-gray-300 text-black-50">
            <a href="{{URL('/Doctor/AppointmentManage')}}" class="float-right mark-as-read"
               data-id="{{ $notification->id }}">
                {{$notification->markAsRead()}}
                There are no new notifications
            </a>
        </div>

    <!-- @endforelse -->
</div>
@endsection
}@elseif (Auth::user()->status=='1'){
    @extends('layouts.DoctorsLayoouts.layout_Doctor')
    @section('content')
<div style="position: absolute;width: 1116px;height: 148px;left: 284px;top: 256px;background: #FFFFFF;border-radius: 4px;">
    @forelse($notifications as $notification)
        <img class="notificationimage"
             style="width: 50px;height: 50px;margin-left: 40px;margin-top: 25px;"
             src="{{asset ('assets/app/media/img/users/300_9.jpg')}}">
        <br><br>
        <h5 style="margin-left: 125px;font-size: 18px;line-height: 27px;color: #000000;margin-top: -33px;"></h5>
        <p style="font-weight: 400;font-size: 18px;margin-top: 23px;margin-left: 30px;">
            [{{ $notification->created_at }}] has new Appointment {{ $notification->data['title'] }}
            statrt on ({{ $notification->data['start'] }})
            has just send email.</p>
        <a href="{{URL('/Reciption/Appointment')}}" class="float-right mark-as-read"
           data-id="{{ $notification->id }}">
            {{$notification->markAsRead()}}
            read it
        </a>
        @if($loop->last)
            <a href="{{URL('/Reciption/home')}}" id="mark-all">
                {{$notification->markAsRead()}}
                all is read
            </a>
        @endif
    @empty
        <div class="p-3 mb-2 bg-gray-300 text-black-50">
            <a href="{{URL('/Reciption/Appointment')}}" class="float-right mark-as-read"
               data-id="{{ $notification->id }}">
                {{$notification->markAsRead()}}
                There are no new notifications
            </a>
        </div>

    @endforelse
</div>
@endsection
}@elseif (Auth::user()->status=='3') {
    @extends('layouts.AdminLayouts.layout_Admin')
    @section('content')
<div style="position: absolute;width: 1116px;height: 148px;left: 284px;top: 256px;background: #FFFFFF;border-radius: 4px;">

    @forelse($notifications as $notification)
        <img class="notificationimage"
             style="width: 50px;height: 50px;margin-left: 40px;margin-top: 25px;"
             src="{{asset ('assets/app/media/img/users/300_9.jpg')}}">
        <br>
        <p style="font-weight: 400;font-size: 18px;margin-top: 23px;margin-left: 30px;">
            [{{ $notification->created_at }}] has new
            Appointment {{ $notification->data['title'] }} statrt on
            ({{ $notification->data['start'] }})
            has just send email.</p>
        <a href="{{URL('/admin/Appointment')}}" class="float-right mark-as-read"
           data-id="{{ $notification->id }}">
            {{$notification->markAsRead()}}
            read it
        </a>
        <br>
        @if($loop->last)
            <a href="{{URL('/admin/home')}}" id="mark-all">
                {{$notification->markAsRead()}}
                all is read
            </a>
        @endif
    @empty
        <div class="p-3 mb-2 bg-gray-300 text-black-50">
            <a href="{{URL('/admin/Appointment')}}" class="float-right mark-as-read"
               data-id="{{ $notification->id }}">
                {{$notification->markAsRead()}}
                There are no new notifications
            </a>
        </div>

    @endforelse
</div>
@endsection
@endif


