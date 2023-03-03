@extends('layout.app')

@section('title', __('Permissions List'))

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Tables</h3>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row align-item-center">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3  bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Permission List</h6> 
                            </div>
                            <div class="card-body">
                            <table id="simple-table" class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th class="center">SR</th>
                                        <th class="center">Permission Name</th>
                                        <th class="center">Permission Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- Row end  -->

            </div>
        </div>
    <!-- Jquery Page Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script> 




    <script src="{{ asset('js/template.js') }}"></script>

    


     

@endsection


@push('after-scripts')
<script>
        $(document).ready(function() {

            var table = $('#simple-table').dataTable({

             //   dom: 'lBfrtip',
                processing: true,
                serverSide: true,
                paginate: true,
              //  ajax: "{{ route('usermanagement.permission.list') }}",
                ajax: {
                        url: "{{ route('usermanagement.permission.postlist') }}",
                        method:"POST",
                        data: {
                        '_token': '{{ csrf_token() }}',
                        },
                    },
                columns: [
                    {data: 'DT_RowIndex', searchable: false, orderable: false,"width": "2%"},
                    {data: 'name', name: 'name', "className": "dt-center" },
                    {data: 'description', name: 'description', "className": "dt-center" },
                ] 
            });




        });
    </script>  
@endpush


