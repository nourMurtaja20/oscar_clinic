@extends('layouts.ReciptionLayouts.layout_Reciption')
@section('content')

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Service Page</div>
                <div class="card-body">
                    <button type="button" class=" btn-success btn-sm" title="Add New "
                            aria-haspopup="true" aria-expanded="false" data-toggle="modal"
                            data-target="#ServiceAdd">
                        <i class="fa fa-plus" adden="ria-hitrue"></i>
                        <span class="svg-icon svg-icon-md">
                        </span>Add Service
                    </button>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Dr. Name</th>
                                <th>Service Name</th>
                                <th>discription</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach ($services as $item)

                                <tr>

                                    <td>{{$loop->iteration}}</td>
                                    @foreach($item->users as $info)
                                        <td>{{$info->name}}</td>
                                    @endforeach
                                    <td>{{$item->title}}</td>
                                    <td>{{ $item->discription}}</td>
                                    <td>{{ $item->Duration}}</td>

                                    <td>
                                        <a href="#view" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="عرض التفاصيل "
                                           data-target="#showServiceInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-eye icon-primary"></i>
                                        </a>

                                        <a href="#Edit" data-toggle="modal"
                                           class="btn btn-sm btn-icon btn-light btn-hover-info mr-2"
                                           title="تعديل تفاصيل الخدمات "
                                           data-target="#EditServiceInformation_{{$item->id}}">
                                            <i class="icon-x1 text-info text-primary-40 flaticon-edit icon-primary"></i>
                                        </a>
                                        <form method="POST" action="{{route ('Reciption.Servece.delete',$item->id)}}"
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


        <div class="modal fade" id="ServiceAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add New Service </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route ('Reciption.Service.store')}}" method="get">
                            <div class="card-body">
                                <div class="form-group row" style="margin-left: 0px;">
                                    <label class="col-lg-auto col-form-label text-right"> Dr. Name :</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="name" name="name">
                                            @foreach($doctors as $doctor)
                                            <option selected value="{{$doctor->id}}" Selected="true">{{$doctor->user ? $doctor->user->name : ''}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left"
                                           style="margin-left: 195px;margin-top: 12px;;">
                                        Title </label>
                                    <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Title"  name="title"  value="" style="margin-left: 293px;width: 522px;margin-top: -45px;">
                                    </div>
                                </div>


                                <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left" style="margin-left: 210px;margin-top: 5px;padding-left: 0px;">Description </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" style="    
                                        margin-left: 295px;width: 519px;margin-top: -40px;"
                                               placeholder="Description" name="discription" value="" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ">
                                    <label class="col-lg-auto col-form-label text-left" style="margin-left: 224px;margin-top: -12px;padding-left: 0px;">Duration </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" style="margin-left: 310px;margin-top: -35px;width: 522px;"
                                               name="Duration" placeholder="Duration" value=""/>
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

        {{--<!--End: modal for Add service -->--}}


    {{--start show information about service--}}
    @foreach($services as $service)
        <!-- begin::view Info -->
            <div class="modal fade" id="showServiceInformation_{{$service->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Service Page</h5>
                            <button type="button" style="margin-left: 350px;" class="close" data-dismiss="modal" aria-label="Close">
                             <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form">
                                @foreach($service->users as $info)
                                    <p class="card-text">Dr.Name : {{ $info->name }}</p>
                                    <div class="separator separator-dashed my-5"></div>
                                    <p class="card-text">Dr.Email : {{ $info->email }}</p>
                                    <div class="separator separator-dashed my-5"></div>
                                @endforeach
                                <p class="card-text">title : {{ $service->title }}</p>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Discription : {{ $service->discription }}</p>
                                <div class="separator separator-dashed my-5"></div>
                                <p class="card-text">Duration : {{ $service->Duration }}</p>
                                <div class="separator separator-dashed my-5"></div>

                                <div class="modal-footer">
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
    {{--End show informtion about service--}}

    {{--start Edit information about service--}}
    @foreach($services as $service)
        <!-- begin::view Info -->
            <div class="modal fade" id="EditServiceInformation_{{$service->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Service Page</h5>
                            <button type="button" style="margin-left: 350px;" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route ('Reciption.Service.update',$service->id)}}" method="get">
                            <div class="card-body">
                            @foreach($service->users as $info)
                            <div class="form-group row ">
                                <label class="col-lg-auto col-form-label text-left" style="margin-left: 184px;
                                                margin-top: -20px;"> Dr.Name : </label>
                                <div class="col-lg-9" >
                                    <input style="margin-left: 270px;width: 330px;margin-top: -44px;"
                                      type="text" class="form-control" name="name"value="{{$info->name }}"/>
                                </div>

                            </div>
                            <div class="form-group row ">
                                <label class="col-lg-auto col-form-label text-left" style="margin-left: 184px;margin-top: 19px;">
                                Dr.Email : </label>
                                <div class="col-lg-9">
                                    <input style="margin-left: 270px;width: 330px;margin-top: -44px;" type="text" name="email" value=" {{$info->email }}" class="form-control" 
                                    placeholder="البريد الإلكتروني " />
                                </div>

                            </div>
                            @endforeach
                            <div class="form-group row ">
                                <label class="col-lg-auto col-form-label text-left" style="margin-left: 199px;
                                margin-top: 5px;padding-left: 0px;">Title :</label>
                                <div class="col-lg-9">
                                    <input style="margin-left: 270px;width: 330px;margin-top: -44px;" type="text" name="title" value="{{ $service->title }}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-lg-auto col-form-label text-left" style="margin-left: 199px;
                            margin-top: 13px;padding-left: 0px;">Discription :</label>
                                <div class="col-lg-9">
                                    <input style="margin-left: 270px;width: 330px;margin-top: -44px;" type="text" name="discription" value="{{ $service->discription }}" class="form-control"/>
                                </div>

                            </div>


                            <div class="form-group row ">
                                <label class="col-lg-auto col-form-label text-left" style="margin-left: 199px;
                                    margin-top: 15px;padding-left: 0px;">Duration :</label>
                                <div class="col-lg-9">
                                    <input style="margin-left: 270px;width: 330px;margin-top: -44px;" type="text" name="Duration" value="{{ $service->Duration}}" class="form-control" />
                                </div>

                            </div>

                        <div class="card-footer" style="margin-top: 31px;margin-left: -30px;">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                        </form>
                    </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{--End Edit information about service--}}


        {{--<!--start: modal for Add service -->--}}
<!-- 
        <div class="modal fade" id="ServiceAdd" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Service Page</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route ('Reciption.Service.store')}}" method="get">
                                <div class="form-group row" style="margin-left: 0px;">
                                    <label class="col-lg-auto col-form-label text-right"> Dr. Name :</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="name" name="name">
                                            @foreach($doctors as $doctor)
                                            <option selected value="{{$doctor->id}}" Selected="true">{{$doctor->user ? $doctor->user->name : ''}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            <div class="separator separator-dashed my-5"></div>
                        
                            <label class="card-text">title :
                                <input type="text" name="title" value="">
                            </label>
                            <div class="separator separator-dashed my-5"></div>
                            <label class="card-text">Discription :
                                <input type="text" name="discription" value="">
                            </label>
                            <div class="separator separator-dashed my-5"></div>
                            <label class="card-text">Duration :
                                <input type="text" name="Duration" value="">

                            </label>
                            <div class="separator separator-dashed my-5"></div> -->

            
    </div>
@endsection