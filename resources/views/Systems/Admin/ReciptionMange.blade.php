@extends('layouts.AdminLayouts.layout_Admin')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header" style="font-weight: bold">Reciption Page</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>name</th>
                                <th>email</th>
                                {{--هنا بيتم تحديد اذا بيعمل تقويم(2) أولا جراحة أسنان(1) أو بيعمل حشوة (0) --}}
                                <th>phone Number</th>
                                <th>More..</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Reciptions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user ? $item->user->name : '' }}</td>
                                    <td>{{ $item->user ? $item->user->email : '' }}</td>
                                    <td>{{ $item->phone}}</td>


                                    <td>
                                        <a href="#view" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="عرض بيانات السكرتير"
                                           data-target="#showReciptionInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-eye icon-primary"></i>
                                        </a>

                                        <a href="#Edit" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="تعديل بيانات السكرتير"
                                           data-target="#EditReciptionInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-edit icon-primary"></i>
                                        </a>
                                        <form method="POST" action="{{route ('admin.Reciption.delete',$item->id)}}"
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
    @foreach($Reciptions as $Reciption)
        <!-- begin::view Info -->
            <div class="modal fade" id="showReciptionInformation_{{$Reciption->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reception </h5>
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
                                            Reception Name </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="اسم السكرتير"
                                                   value="{{ $Reciption->user ? $Reciption->user->name : ''  }}"
                                                   name="DoctorName" disabled="true"/>
                                        </div>

                                    </div>
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Reception email </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="البريد الالكتروني "
                                                   value="{{ $Reciption->user ? $Reciption->user->email : ''  }}"
                                                   name="email"
                                                   disabled="true"/>
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Reception phone </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="رقم الهاتف  "
                                                   value="{{ $Reciption->phone}}" name="phone"
                                                   disabled="true"/>
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Reception Addres </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="العنوان"
                                                   value="{{ $Reciption->addres}}" name="addres"
                                                   disabled="true"/>
                                        </div>

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
        @foreach($Reciptions as $Reciption)
            <div class="modal fade" id="EditReciptionInformation_{{$Reciption->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reception </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    margin-right: 0px;
">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route ('admin.Reciption.update',$Reciption->id)}}" method="get">
                                <div class="card-body">
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-right">:
                                            Reception Name </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="اسم السكرتير"
                                                   value="{{ $Reciption->user ? $Reciption->user->name : ''  }}"
                                                   name="DoctorName"/>
                                        </div>

                                    </div>
                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Reception email </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="البريد الالكتروني "
                                                   value="{{ $Reciption->user ? $Reciption->user->email : ''  }}"
                                                   name="email"/>
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Reception phone </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="رقم الهاتف  "
                                                   value="{{ $Reciption->phone}}" name="phone"/>
                                        </div>

                                    </div>

                                    <div class="form-group row " style="
    margin-left: 0px;">
                                        <label class="col-lg-auto col-form-label text-left">:
                                            Reception Addres </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                   placeholder="العنوان"
                                                   value="{{ $Reciption->addres}}" name="addres"/>
                                        </div>
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