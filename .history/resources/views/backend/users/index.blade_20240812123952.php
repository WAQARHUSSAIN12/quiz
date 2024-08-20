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
                    <button class="btn btn-info" id="add_user_btn"> Add User  </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>

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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<!-- bootstrap modal code end -->

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


$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

    });



    </script>

@endpush