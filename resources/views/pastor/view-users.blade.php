@extends('pages.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endsection
@section('contents')
    <div class="wrapper">

        @include('parts.navbar')
        <!-- Left side column. contains the logo and sidebar -->
        @include('parts.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">



                    <section class="content">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">List of Registered Users</h3>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info">Export</button>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ URL::to('pastor/pdf') }}">PDF</a></li>
                                        <li><a href="#">Excel</a></li>
                                        <li><a href="#">CSV</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-success">Import</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ URL::to('pdf') }}">PDF</a></li>
                                        <li><a href="#">Excel</a></li>
                                        <li><a href="#">CSV</a></li>
                                    </ul>
                                </div>
                                <span>
                                    <button type="button" class="btn btn-default pull-right" data-toggle="modal"
                                        data-target="#modal-default">
                                        Add User
                                    </button>
                                </span>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>User No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->id }}</td>
                                                <td>{{ $account->first_name }}</td>
                                                <td>{{ $account->last_name }}</td>
                                                <td>{{ $account->email }}</span></td>
                                                <td>{{ $account->spouse_name }}</td>
                                                <td><a href="{{ route('pastor.singleMember', $account->id) }}"
                                                        class="fa fa-eye"></a>
                                                    {{-- <a onclick= "return confirm('Are you sure you want to delete this user?')" href="{{ route('pastor.deleteMember', $account->id) }}"
                                                        class="fa fa-trash-o "></a> --}}
                                                    <a onclick=sweetalert() class="fa fa-trash-o "></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </section>

                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->

                        <!-- /.nav-tabs-custom -->

                        <!-- Chat box -->

                        <!-- /.box (chat box) -->

                        <!-- TO DO List -->

                        <!-- /.box -->

                        <!-- quick email widget -->


                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map box -->

                        <!-- /.box -->

                        <!-- solid sales graph -->

                        <!-- /.box -->

                        <!-- Calendar -->

                        <!-- /.box -->

                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('parts.footer')

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
                                                                                                                 immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>



        {{-- MODALS --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add a Church Member</h4>
                    </div>
                    <div class="box box-primary" id="create-roles">
                        <!-- /.box-header -->

                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('pastor.addMember') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Jacob" name="first_name"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" placeholder="James" name="middle_name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Lomell" name="last_name"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                                    <div class="col-sm-4 form-group">
                                        <label>Username</label>
                                        <input type="Address" class="form-control" placeholder="Jam224" name="username"
                                            required>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>email (optional)</label>
                                        <input type="Address" class="form-control" placeholder="Jam224@gmail.com"
                                            name="email">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="******" name="password"
                                            required>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- radio -->
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="M" name="gender">
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="F" name="gender">
                                                <label class="form-check-label">Female</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-3 form-group">
                                        <label>Date of Birth:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="date" name="date_of_birth" id="dob"
                                                class="form-control datetimepicker-input" data-target="#reservationdate"
                                                required />

                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                                    <div class="col-sm-3 form-group">
                                        <label>Place of Birth</label>
                                        <input type="Address" name="place_of_birth" class="form-control"
                                            placeholder="Mabibo">
                                    </div>
                                    <div class="col-sm-5 form-group">
                                        <label for="category" class=" col-form-label "
                                            style="color: black">{{ __('Marrital Status') }}</label>

                                        <select id="category" class="form-control" name="marital_status" required
                                            autocomplete="job_title" autofocous>

                                            <option value="Select Status" disabled>Marrital Status</option>
                                            <option>Married</option>
                                            <option>Not Married</option>
                                        </select>

                                        <span class="text-danger">{{ $errors->first('role') }}</span>
                                        @if ($errors->any())
                                            <p style="color: red">{{ $errors->first() }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Spouse Name(Optional)</label>
                                            <input type="text" class="form-control" placeholder="Lomell"
                                                name="spouse_name" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary swalDefaultSuccess">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



        {{-- The Modal to View a single user details --}}
    @endsection
    @push('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function sweetalert() {
                // event.preventDefault();
                swal({
                        title: "Are you sure to Delete this User?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "{{ route('pastor.deleteMember', $account->id) }}";
                            swal("Thank you!", {
                                title: "User has Deleted",
                                icon: "success",
                            });
                        } else {
                            swal("Ok, The record is safe");
                        }
                    });
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
        <script>
            $(function() {
                $('#dob').text(new Date().getFullYear());
            });
        </script>
    @endpush
