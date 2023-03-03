@extends('Layout.master')
@section('title','Role Permissions')
@section('Title','User Management')
@section('URL',route("usermanagement.role.list"))
@section('PageName','Role Permissions')
@section('content')
<style>
.checkbox{
    display:contents
}
.as-space{
    height:50px;
}

</style>
<div class="page-content">
    <div class="page-header">
        <h1>
            Roles
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Permssions
            </small>
        </h1>
    </div><!-- /.page-header -->
    @include('Layout.alerts')
    <div class="row">
        <div class="col-xs-12">

            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" method="POST" action="{{route('usermanagement.role.permissionStore',['id'=>$roleId])}}">
                        @csrf
                        <div class="control-group">
                            <label class="control-label bolder blue" style="height: 50px;" ><span style="color: green">{{$role->name}}</span>`s Permissions</label>
<?php 
    $index = 1;
?>
                            @foreach ($permissions as $permission )


                            <?php if( ($index % 5 ) == 1 ){ ?> <div class="control-group as-space"> <?php } ?>



                            <div class="checkbox ">
                                <label>
                                    <input type="checkbox" name="permissions[]" class="ace" value="{{$permission->id}}" {{in_array($permission->id,$rolePermissions)?'checked':''}} />
                                    <span class="lbl"> {{$permission->description}}</span>
                                </label>
                            </div>

                            <?php if( ($index % 5 ) == 0 ){ ?> </div> <?php } $index++; ?>

                            @endforeach
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
