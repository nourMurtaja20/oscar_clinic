@extends('layouts.ReciptionLayouts.layout_Reciption')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header" style="font-weight: bold">Contact us Page</div>
                <div class="card-body">
                    <br/>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>email</th>
                                <th>date</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($masseges as $massege)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $massege->email }}</td>
                                    <td>{{ $massege->created_at->format('Y-m-d') }}</td>

                                    @if($massege->statuseReply==0)
                                        <td>
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Navigation/Waiting.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                        </td>
                                    @elseif($massege->statuseReply==1)
                                        <td>
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Navigation/Check.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
    </g>
</svg><!--end::Svg Icon--></span>
                                        </td>

                                    @endif

                                    <td nowrap="nowrap">
                                        <a href="#view" data-toggle="modal"
                                           data-target="#showmasswgeModal_{{$massege->id}}"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2" title="عرض">
                                            <i class="icon-x1 text-primary text-primary-40 flaticon-eye icon-primary"></i>
                                        </a>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->


        @foreach ($masseges as $massege)
            <div class="modal fade" id="showmasswgeModal_{{$massege->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content" style="width: 852px;left: -150px;top:70px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reply message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                        <div class="card-body" style="margin-top: -50px;">
                            <form class="form" method="get" action="{{url('/send/reply/'.$massege->id)}}">
                                <div class="card-body">
                                    <div class="form-group row">

                                        <div class="col-lg-8">
                                            <label style="margin-left: 191px;margin-top: 60px;">البريد الإلكتروني</label>
                                            <input style="margin-left: 290px;margin-top: -38px;" type="email" class="form-control" value="{{$massege->email}}"
                                                   disabled="disabled"/>
                                        </div>

                                    </div>


                                    <div class="separator separator-dashed my-5"></div>

                                    <div class="form-group row">
                                        <div style="margin-left: 191px;margin-top: 3px;" class="col-lg-8">
                                            <label>نص الرسالة</label>

                                            <textarea style="margin-left: 100px;margin-top: -38px;" name="Message" id="" cols="30" rows="5" class="form-control"
                                                      disabled="disabled">{{$massege->massage}}</textarea>
                                        </div>

                                    </div>
                                    <div class="separator separator-dashed my-5"></div>
                                    <div class="form-group row">


                                        <div class="form-group">
                                        <div style="margin-left: 191px;" class="col-lg-8">
                                            <label>الرد على الرسالة</label>    
                                                 <textarea style="margin-left: 100px;width: 640px;height: 100px;margin-top: -30px;" class="form-control" name="replyText" id="" cols="30"
                                                           rows="5"
                                                           placeholder="الـــــــــــــرد"></textarea>
                                        </div>
                                            
                                        </div>
                                    <div class="card-footer" style="margin-left: 200px;">
                                        <button type="submit" class="btn btn-primary mr-2">ارسل ردك الآن</button>
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach

@endsection
