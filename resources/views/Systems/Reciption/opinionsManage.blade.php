@extends('layouts.ReciptionLayouts.layout_Reciption')
@section('content')

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Opinions Page</div>
                <div class="card-body">

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach ($opinions as $opinion)

                                <tr>

                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$opinion->user->name}}</td>

                                    <td>{{$opinion->Content}}</td>

                                    @if($opinion->status == 0)
                                        <td> <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                                   style="color: #ffaa33;">
                                      preview </span>
                                        </td>
                                    @elseif($opinion->status == 1)
                                        <td> <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                                   style="color: #2fa81f;">
                                      on view </span>
                                        </td>
                                    @elseif($opinion->status == 2)
                                        <td> <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                                   style="color: #a8382b;">
                                      unacceptable</span>
                                        </td>

                                    @endif
                                    <td>
                                        <a href="#view" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="عرض التفاصيل "
                                           data-target="#showOpinionInformation_{{$opinion->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-eye icon-primary"></i>
                                        </a>

                                        <a href="#Edit" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="تعديل تعديل حالة الظهور "
                                           data-target="#EditOpinionInformation_{{$opinion->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-edit icon-primary"></i>
                                        </a>
                                        <form method="POST" action="{{route ('Reciption.opinion.delete',$opinion->id)}}"
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

    {{--start show information about opinion--}}
    @foreach ($opinions as $opinion)
        <!-- begin::view Info -->
            <div class="modal fade" id="showOpinionInformation_{{$opinion->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Opinion Page</h5>
                            <button type="button" style="
    margin-left: 300px;
    margin-top: 0px;
" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body" style=" margin-top: -40px;">
                            <form class="form">

                                <p class="card-text">User Name : {{$opinion->user->name}}</p>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Content: {{ $opinion->Content}}</p>
                                <div class="separator separator-dashed my-5"></div>

                                <p class="card-text">Status :

                                    @if($opinion->status == 0)
                                        <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                              style="color: #ffaa33;">
                                      preview </span>

                                    @elseif($opinion->status == 1)
                                        <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                              style="color: #2fa81f;">
                                      on view </span>

                                    @elseif($opinion->status == 2)
                                        <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                              style="color: #a8382b;">
                                      unacceptable</span>

                                </p>
                                @endif
                                <div class="separator separator-dashed my-5"></div>
                                <div class="modal-footer" >
">
                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                            data-dismiss="modal">اغلاق
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{--End show informtion about opinion--}}

        {{--start Edit information about opinion--}}
    @foreach ($opinions as $opinion)
            <div class="modal fade" id="EditOpinionInformation_{{$opinion->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Opinion Page</h5>
                            <button type="button" style="
    margin-left: 300px;
    margin-top: 0px;
"  class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="{{route ('Reciption.Opinion.update',$opinion->id)}}" method="get">

                                <p class="card-text">User Name : {{$opinion->user->name}}</p>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Content: {{ $opinion->Content}}</p>
                                <div class="separator separator-dashed my-5"></div>

                                <div class="m-form__group form-group">
                                    <!-- <label for="">Status:</label> -->
                                    <div class="m-radio-inline" style="margin-top: -10px; margin-left: -15px;">
                                        @if($opinion->status==0)
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="0" checked="true"> preview
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="1"> on view
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="2"> unacceptable
                                                <span></span>
                                            </label>
                                        @elseif($opinion->status==1)

                                            <label class="m-radio">
                                                <input type="radio" name="status" value="0" > preview
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="1" checked="true"> on view
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="2"> unacceptable
                                                <span></span>
                                            </label>
                                            @elseif($opinion->status==1)
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="0" > preview
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="1" > on view
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="status" value="2" checked="true"> unacceptable
                                                <span></span>
                                            </label>
                                    </div>
                                    @endif
                                </div>

                                <p class="card-text" style=" margin-top: 30px;">Status :

                                    @if($opinion->status == 0)
                                        <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                              style="color: #ffaa33;">
                                      preview </span>

                                    @elseif($opinion->status == 1)
                                        <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                              style="color: #2fa81f;">
                                      on view </span>

                                    @elseif($opinion->status == 2)
                                        <span class="label label-lg label-inline mr-2 label-rounded m-btn--label-danger"
                                              style="color: #a8382b;">
                                      unacceptable</span>

                                </p>
                                @endif
                                <div class="separator separator-dashed my-5"></div>
                                <div class="modal-footer" style="
    margin-right: 288px;
    margin-top: -32px;
    margin-bottom: -37px;">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>

                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                            data-dismiss="modal">اغلاق
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach
        {{--End Edit information about opinion--}}


        {{--<!--start: modal for Add service -->--}}

        {{--<div class="modal fade" id="ServiceAdd" tabindex="-1" role="dialog"--}}
        {{--aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-dialog-centered modal-xl" role="document">--}}
        {{--<div class="modal-content">--}}
        {{--<div class="modal-header">--}}
        {{--<h5 class="modal-title" id="exampleModalLabel"> Service Page</h5>--}}
        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
        {{--<i aria-hidden="true" class="ki ki-close"></i>--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--<div class="modal-body">--}}
        {{--<form action="{{route ('Reciption.Service.store')}}" method="get">--}}

        {{--<div class="form-group row" style="--}}
        {{--margin-left: 0px;">--}}
        {{--<label class="col-lg-auto col-form-label text-right"> Dr. Name :</label>--}}
        {{--<div class="col-lg-9">--}}
        {{--<select class="form-control" id="name" name="name">--}}
        {{--@foreach($doctors as $doctor)--}}
        {{--<option selected value="{{$doctor->id}}" Selected="true">{{$doctor->user ? $doctor->user->name : ''}}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}

        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="separator separator-dashed my-5"></div>--}}

        {{--<p class="card-text">title :--}}
        {{--<input type="text" name="title" value="">--}}
        {{--</p>--}}
        {{--<div class="separator separator-dashed my-5"></div>--}}
        {{--<p class="card-text">Discription :--}}
        {{--<input type="text" name="discription" value="">--}}
        {{--</p>--}}
        {{--<div class="separator separator-dashed my-5"></div>--}}
        {{--<p class="card-text">Duration :--}}
        {{--<input type="text" name="Duration" value="">--}}

        {{--</p>--}}
        {{--<div class="separator separator-dashed my-5"></div>--}}

        {{--<div class="modal-footer">--}}
        {{--<button type="submit" class="btn btn-primary mr-2">Add</button>--}}
        {{--<button type="button" class="btn btn-light-primary font-weight-bold"--}}
        {{--data-dismiss="modal">اغلاق--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<!--End: modal for Add service -->--}}

    </div>
@endsection