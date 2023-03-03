@extends('Layout.master')
@section('title','User Create')
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
                Create
            </small>
        </h1>
      

        @include('Layout.alerts')


    </div><!-- /.page-header -->
    

    <div class="row">
        <div class="col-xs-12">

            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" method="POST" action="{{route('usermanagement.user.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Person Name</b></label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder=" Person Name" class="form-control"  />
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Enter Email</b></label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Abc@gmail.com" class="form-control"  />
                            </div>

                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Mobile</b></label>
                                <input type="text" name="mobile" placeholder="Mobile"  value="{{ old('mobile') }}"  class="form-control"  />
                            </div>

                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>CNIC</b></label>
                                <input type="text" name="cnic" placeholder="CNIC"  value="{{ old('cnic') }}"  class="form-control"  />
                            </div>


                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Enter User Name</b></label>
                                <input type="text" name="userName" value="{{ old('userName') }}" autocomplete="off" placeholder="name@pitb.gov.pk" class="form-control"  />
                            </div>
                           
                            <!-- <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Upload Picture</b></label>
                                <input type="file" name="image" class="form-control" />
                            </div> -->
                            
                           

                            <div class="col-md-3" style="margin-top:10px;">
                                <label><b>Select Role</b></label>
                              <select class="form-control" name="roleId" >
                                <option value="" hidden selected>Choose Role</option>
                                @foreach ($roles as $role )
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="col-md-3" style="margin-top:10px;">
                                <label><b>Select Designation</b></label>
                              <select class="form-control" name="designation" >
                                <option value="" hidden selected>Choose Designation</option>
                                @foreach ($designations as $key => $val )
                                <option value="{{$key}}" {{ ( old('designation') == $key)?'selected="selected"':'' }} >{{$key}}</option>
                                @endforeach
                              </select>
                            </div>


                      

                        </div>

                        <div class="row">
                        <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Enter Password</b></label>
                                <input type="password" name="password"  value="{{ old('password') }}" placeholder="******" class="form-control"  />
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;">
                                <label><b>Confirm Password</b></label>
                                <input type="password" name="password_confirmation" placeholder="******" class="form-control"  />
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
