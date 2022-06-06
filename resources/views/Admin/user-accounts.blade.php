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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                    {{-- <div class="row col-md-12">
                        <div class="col-lg-12 table-striped">
                            <div class="box ">

                                <div class="box-header">
                                    <h3 class="box-title">List of Registered Users</h3>
                                    @if (Session::has('success'))
                                        <center>
                                            <div class="center" style="color: green" role="alert">
                                                <p>{{ Session::get('success') }}</p>
                                            </div>
                                        </center>
                                        @elseif (Session::has('deleted'))
                                        <center>
                                            <div class="center" style="color: green" role="alert">
                                                <p>{{ Session::get('deleted') }}</p>
                                            </div>
                                        </center>
                                    @endif
                                    
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>User No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($userInfos as $userInfo)
                                            <tr>
                                                <td>{{ $userInfo->id }}</td>
                                                <td>{{ $userInfo->first_name }}</td>
                                                <td>{{ $userInfo->last_name }}</td>
                                                <td>{{ $userInfo->email }}</span></td>
                                                <td>{{ $userInfo->spouse_name }}</td>
                                                <td><a href="/admin/view-member/{{ $userInfo->id }}"
                                                        data-target="#singleUser-details" class="fa fa-eye"
                                                        data-toggle="modal"></a>

                                                    <a href="/admin/delete-member/{{ $userInfo->id }}"
                                                        class="fa fa-trash-o "></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    <div class="box-footer clearfix">
                                        <div>
                                            <span class="d-flex justify-content-center p-3">
                                                {{ $userInfos->links() }}
                                            </span>

                                            <style>
                                                .w-5 {
                                                    display: none;
                                                }

                                            </style>
                                            <span>
                                                <button type="button" class="btn btn-default pull-right" data-toggle="modal"
                                                    data-target="#modal-default">
                                                    Add User
                                                </button>
                                            </span>


                                        </div>
                                    </div>

                                </div>
                                
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div> --}}
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of Registered Users</h3> &nbsp;
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">Export</button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                  <span class="caret"></span>
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{{ URL::to('/pdf') }}">PDF</a></li>
                                  <li><a href="#">Excel</a></li>
                                  <li><a href="#">CSV</a></li>
                                </ul>
                              </div>
                            {{-- <span>
                                @if (Session::has('success'))
                                        <center>
                                            <div class="center" style="color: green" role="alert">
                                                <p>{{ Session::get('success') }}</p>
                                            </div>
                                        </center>
                                        @elseif (Session::has('deleted'))
                                        <center>
                                            <div class="center" style="color: green" role="alert">
                                                <p>{{ Session::get('deleted') }}</p>
                                            </div>
                                        </center>
                                    @endif
                            </span> --}}
                            {{-- <span>
                                <form action="{{ route('test.import') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" accept=".xlsx, .xls,.csv">
                                    <button type="submit">Import</button>
                                </form>
                            </span> --}}
                            <span>
                                <form action="{{ route('test.import') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="pull-right">Import</button>
                                    <input type="file" class="pull-right" name="file" accept=".xlsx, .xls,.csv">

                                </form>
                                
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userInfos as $userInfo)
                                            <tr>
                                                <td>{{ $userInfo->id }}</td>
                                                <td>{{ $userInfo->first_name }}</td>
                                                <td>{{ $userInfo->last_name }}</td>
                                                <td>{{ $userInfo->email }}</span></td>
                                                <td>
                                                
                                                    {{ $userInfo->spouse_name }}
                                                </td>
                                                <td><a href="/admin/view-member/{{ $userInfo->id }}"
                                                        data-target="#singleUser-details" class="fa fa-eye"
                                                        data-toggle="modal"></a>

                                                    <a href="/admin/delete-member/{{ $userInfo->id }}"
                                                        class="fa fa-trash-o "></a>
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
                            <button type="button" class="btn btn-default pull-right"
                                    data-toggle="modal" data-target="#modal-default">
                                    Add single User
                                </button>
                        </div>
                        <!-- /.box-body -->
                        
                    </div>
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->

                        <!-- /.nav-tabs-custom -->

                        <!-- Chat box -->

                        <!-- /.box (chat box) -->

                        <!-- TO DO List -->

                        <!-- /.box -->

                        <!-- quick email widget -->
                        <div class="box box-info">
                            <div class="box-header">
                                <i class="fa fa-envelope"></i>

                                <h3 class="box-title">Quick Email</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-info btn-sm" data-widget="remove"
                                        data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                                    </div>
                                    <div>
                                        <textarea class="textarea" placeholder="Message"
                                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="box-footer clearfix">
                                <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map box -->

                        <!-- /.box -->

                        <!-- solid sales graph -->
                        <div class="box box-solid bg-teal-gradient">
                            <div class="box-header">
                                <i class="fa fa-th"></i>

                                <h3 class="box-title">Sales Graph</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body border-radius-none">
                                <div class="chart" id="line-chart" style="height: 250px;"></div>
                            </div>
                            <!-- /.box-body -->

                            <!-- /.box-footer -->
                        </div>
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



        {{-- The Modal to View a single user details --}}
        <div class="modal fade" id="singleUser-details">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Single Member Infomations</h4>
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
                                            <p></p>
                                            {{-- <input type="text" class="form-control" value="" placeholder="Jacob" name="first_name"
                                                autocomplete="off"> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" placeholder="James"
                                                name="middle_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Lomell"
                                                name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                                    <div class="col-sm-4 form-group">
                                        <label>Username</label>
                                        <input type="Address" class="form-control" placeholder="Jam224" name="username">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>email (optional)</label>
                                        <input type="Address" class="form-control" placeholder="Jam224@gmail.com"
                                            name="email">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="******" name="password">
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
                                                class="form-control datetimepicker-input" data-target="#reservationdate" />

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
                                                name="spouse_name">
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
    @endsection
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    @endpush