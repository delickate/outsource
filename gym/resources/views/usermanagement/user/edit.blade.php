@extends('Layout.master')
@section('title','User Edit')
@section('Title','User Management')
@section('URL',route("usermanagement.user.list"))
@section('PageName','User')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>
            User
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Edit
            </small>
        </h1>
        {{-- <a href="{{route('category.parent.create')}}"><button class="btn btn-primary" style="position:absolute;right:20px;top:15px;">Add New</button></a> --}}
    </div><!-- /.page-header -->
    @include('Layout.alerts')
    <div class="row">
        <div class="col-xs-12">

            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" method="POST" action="{{route('usermanagement.user.update',['id'=>$obj->id])}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Person Name</b></label>
                                <input type="text" name="name" placeholder=" Person Name" value="{{$obj->name}}" class="form-control" required/>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Enter Email</b></label>
                                <input type="email" name="email" placeholder="Abc@gmail.com" value="{{$obj->email}}" class="form-control" required/>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Mobile</b></label>
                                <input type="email" name="mobile" placeholder="03134222___" value="{{$obj->mobile}}" class="form-control" required/>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>CNIC</b></label>
                                <input type="email" name="cnic" placeholder="35202453____" value="{{$obj->cnic}}" class="form-control" required/>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Enter User Name</b></label>
                                <input type="text" name="username" placeholder="name@pitb.gov.pk" value="{{$obj->userName}}" class="form-control"  required/>
                            </div>
                            
                            <!-- <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Upload Picture</b></label>
                                <input type="file" name="image" class="form-control" />
                            </div> -->
                            <div class="col-md-3" style="margin-top:10px;">
                                <label><b>Select Role</b></label>
                              <select class="form-control" name="roleId" required>
                                <option value="" hidden selected>Choose Role</option>
                                @foreach ($roles as $role )
                                <option value="{{$role->id}}"{{$obj->roles[0]->id == $role->id?'selected':'' }}>{{$role->name}}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="col-md-3" style="margin-top:10px;">
                                <label><b>Select Designation</b></label>
                              <select class="form-control" name="roleId" required>
                                <option value="" hidden selected>Choose Role</option>
                                @foreach ($designations as $key => $val )
                                <option value="{{$key}}"{{$obj->designation == $key?'selected':'' }}>{{$key}}</option>
                                @endforeach
                              </select>
                            </div>

                        </div>


                        <div class="row">
                        <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Enter Password</b></label>
                                <input type="password" name="password" placeholder="******" class="form-control" required/>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Confirm Password</b></label>
                                <input type="password" name="password_confirmation" placeholder="******" class="form-control" required/>
                            </div>
                        </div>


                        <div style="margin-top:10px;">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div><!-- /.span -->
            </div><!-- /.row -->

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.page-content -->
@stop

@section('script')

@stop
