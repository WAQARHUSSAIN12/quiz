@extends('backend.layout.layout')

@section('title', 'User List')

@section('content')

<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">


<div class="row">

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>User List</h5>
                <div class="ibox-tools">

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo"> Add User </button>

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

<!-- bootstrap modal end -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                @csrf <!-- Include the CSRF token -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">User Name:</label>
                                <input type="text" class="form-control" id="user-name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">First Name:</label>
                                <input type="text" class="form-control" id="first-name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Last Name:</label>
                                <input type="text" class="form-control" id="user-name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="gender" class="col-form-label">Gender:</label>
                                <div class="radio">
                                    <input type="radio" name="gender" id="male" value="male" checked="">
                                    <label for="radio1">
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="gender" id="femal" value="female">
                                    <label for="radio2">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-normal">Basic example</label>
                                <div>
                                    <select data-placeholder="chose actvie de-active" class="chosen-select"
                                        tabindex="2">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">De-active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- bootstrap modal code end -->

@endsection

@push('script')

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>

<!-- Chosen -->
<script src="{{asset('assets/js/plugins/chosen/chosen.jquery.js')}}"></script>

<!-- Page-Level Scripts -->
<script>
$(document).ready(function() {
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
        buttons: [{
                extend: 'copy'
            },
            {
                extend: 'csv'
            },
            {
                extend: 'excel',
                title: 'ExampleFile'
            },
            {
                extend: 'pdf',
                title: 'ExampleFile'
            },

            {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ],
        ajax: "{{ route('admin.users') }}",
        columns: [{
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'created_at'
            },
            // { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });


    $('#exampleModal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)

    })


    $('.chosen-select').chosen({
        width: "100%"
    });

});
</script>

<script>
$(document).ready(function() {
    $('#myForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting in the traditional way

        // Gather form data
        var formData = $(this).serialize();

        $.ajax({
            url: '{{ route("your.route.name") }}', // Replace with your route
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle the successful response
                alert('Form submitted successfully!');
                console.log(response);
            },
            error: function(xhr) {
                // Handle the error response
                alert('Something went wrong!');
                console.log(xhr.responseText);
            }
        });
    });
});
</script>

@endpush