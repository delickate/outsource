@extends('Layout.master')

@section('title')
Change Password
@endsection

@section('content')


<div class="page-content">
<div class="page-header"><h1>Change Password</h1></div>

<div class="row ">
    <div class="col-12 col-lg-12" style="margin-top:20px;">

        <div class="card radius-10 border-top border-0 border-4 border-danger">


            @include('Layout.alerts')


<form method="post" action="{{ route('profile.save_password') }}" novalidate class="form-horizontal">
@csrf
            <div class="row">

            


                <div class="col-xs-12 col-sm-12">
                    <div class="widget-box">
                        {{-- <div class="widget-header">
                            <h4 class="widget-title">Create</h4>
                        </div> --}}
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">


                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Current Password </label>
                                    <div class="col-sm-9">
                                        <input type="password" class="col-xs-10 col-sm-5 form-control"  name="current_password" id="current_password" placeholder="Current Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> New Password </label>
                                    <div class="col-sm-9">
                                        <input type="password" class="col-xs-10 col-sm-5 form-control"  name="password" id="password" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Confirm Password </label>
                                    <div class="col-sm-9">
                                        <input type="password" class="col-xs-10 col-sm-5 form-control"  name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>



                                

                                

                            </div>
                        </div>
                        <div class="widget-footer">
                        <div class="clearfix form-actions" style="margin-bottom:0px;">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
                        </div>

                    </div>
                </div><!-- /.span -->
            </div>
</form>




        </div>
    </div>
</div>
<!--end row-->

</div>

@endsection

@section('script')
<script>
   


    function selectChild(type){
        if( type == 'CI' ){
            $('#province_id_sel').show();
            $('#country_id_sel').show();
        }else if(type == 'PR'){
            $('#province_id_sel').hide();
            $('#country_id_sel').show();
        }else if(type == 'CO'){
            $('#province_id_sel').hide();
            $('#country_id_sel').hide();
        }
    }


    function getProvince(country_id){
        var type = $('#type').val();
        if(type == 'CI'){
            $.ajax({
            // dataType: 'json',
            type:'get',
            url : "{{ url('ajax_view/get_province') }}?country_id="+country_id,
            success:function(res){
                $('#province_id').html(res);
                // console.log(res);
            }
        });
        }
        
    }





    $(document).ready(function() {
        //   update_all_account_balance();
        selectChild($('#type').val());
    });
</script>
@endsection