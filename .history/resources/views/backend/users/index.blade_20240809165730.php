@extends('backend.layout.layout')

@section('title', 'User List')

@section('content')

<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>User List</h5>
                <div class="ibox-tools">

                <a class="btn btn-primary btn-rounded" href="#">Primary</a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>

                   
                </div>

                
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            // $('.dataTables-example').DataTable({
            //     pageLength: 25,
            //     responsive: true,
            //     dom: '<"html5buttons"B>lTfgitp',
            //     buttons: [
            //         { extend: 'copy'},
            //         {extend: 'csv'},
            //         {extend: 'excel', title: 'ExampleFile'},
            //         {extend: 'pdf', title: 'ExampleFile'},

            //         {extend: 'print',
            //          customize: function (win){
            //                 $(win.document.body).addClass('white-bg');
            //                 $(win.document.body).css('font-size', '10px');

            //                 $(win.document.body).find('table')
            //                         .addClass('compact')
            //                         .css('font-size', 'inherit');
            //         }
            //         }
            //     ]

            // });
        });

        $(document).ready(function() {
        $('.dataTables-example').DataTable({
            processing: true,
            serverSide: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
            ],
            ajax: "{{ route('admin.users') }}",
            columns: [
                { data: 'name'},
                { data: 'email'},
                { data: 'created_at'},
                // { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });

    </script>

@endpush