@extends('pages.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endsection
@section('contents')
    <div class="wrapper">

        @include('parts.navbar')
        <!-- Left side column. contains the logo and sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Project Management
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                {{-- //The Cards Area --}}
                @include('parts.left-sidebar')

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-4">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total </span>
                                <span class="info-box-number">41,410</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Events</span>
                                <span class="info-box-number">41,410</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Events</span>
                                <span class="info-box-number">41,410</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                </div>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                   
                    <h3 class="page-header">Projects Created</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Kutembelea Yatima</b></h3>
                                </div>
                                <div class="box-body">
                                    {{-- <img height="50" width="50" style="background-image: url('resources/image1.jpg')"> --}}
                                    <img src="{{ asset('resources/image1.jpg') }}" class="img-thumbnail card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the
                                            bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">See Details</a>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
                    <!-- /.row (main row) -->
                    <button type="button" class="btn btn-primary"
                                    data-toggle="modal" data-target="#project-modal">
                                    Add Project
                                </button>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('parts.footer')












        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>


        <div class="modal fade" id="project-modal">
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
                        <form role="form" method="POST" action="{{ route('admin.addMember') }}"
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
                                            <input type="text" class="form-control" placeholder="James"
                                                name="middle_name" required>
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
                                            <input type="date" name="date_of_birth"
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


        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
                                                                             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    @endsection
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
    @endpush
