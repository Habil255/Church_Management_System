@extends('pages.main')
@section('contents')
    <div class="wrapper">

        @include('parts.navbar')
        <!-- Left side column. contains the logo and sidebar -->


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

                {{-- //The Cards Area --}}
                @include('parts.left-sidebar')

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">

                        <div class="box box-primary" id="create-roles">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create Roles</h3>
                            </div>
                            <!-- /.box-header -->
                            @if (Session::has('Role_added'))
                                <div class="alert alert-success" role="alert">
                                    <p>{{ Session::get('Role_added') }}</p>
                                </div>
                            @endif
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('create.roles') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Role Title" name="title">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Role Description" name='description'>
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="exampleInputFile">

                                        {{-- <p class="help-block">Example block-level help text here.</p> --}}
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Check me out
                                        </label>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>




                        <!-- Custom tabs (Charts with tabs)-->
                        {{-- <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                    style="position: relative; height: 300px;"></div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                </div>
                            </div>
                        </div> --}}
                        <!-- /.nav-tabs-custom -->

                        <!-- Chat box -->

                        <!-- /.box (chat box) -->

                        <!-- TO DO List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>

                                <h3 class="box-title">To Do List</h3>

                                <div class="box-tools pull-right">
                                    <ul class="pagination pagination-sm inline">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                                <ul class="todo-list">
                                    <li>
                                        <!-- drag handle -->
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <!-- checkbox -->
                                        <input type="checkbox" value="">
                                        <!-- todo text -->
                                        <span class="text">Design a nice theme</span>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="">
                                        <span class="text">Make the theme responsive</span>
                                        <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="">
                                        <span class="text">Check your messages and notifications</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix no-border">
                                {{-- <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i>
                                    Add item</button> --}}
                                <a href="#assign-roles" class="btn btn-default pull-right"><i class="fa fa-plus"></i>
                                    Add item</a>
                                {{-- <a href="" class="btn btn-success">View</a> --}}
                            </div>
                        </div>
                        <!-- /.box -->

                        <!-- quick email widget -->


                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map box -->

                        <!-- /.box -->

                        <!-- solid sales graph -->




                        {{-- <div class="box box-solid bg-teal-gradient">
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
                            <div class="box-footer no-border">
                                <div class="row">
                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <input type="text" class="knob" data-readonly="true" value="20"
                                            data-width="60" data-height="60" data-fgColor="#39CCCC">

                                        <div class="knob-label">Mail-Orders</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <input type="text" class="knob" data-readonly="true" value="50"
                                            data-width="60" data-height="60" data-fgColor="#39CCCC">

                                        <div class="knob-label">Online</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-xs-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="30"
                                            data-width="60" data-height="60" data-fgColor="#39CCCC">

                                        <div class="knob-label">In-Store</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-footer -->
                        </div> --}}





                        <!-- /.box -->

                        <!-- Calendar -->




                        <div class="box box-solid bg-green-gradient">

                            <div class="box box-info col-md-5">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Assign Roles</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                @if (Session::has('role_assigned'))
                                    <div class="alert alert-success" role="alert">

                                        <p>{{ Session::get('role_assigned') }}</p>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('roles.assign') }} " class="form-horizontal">
                                    @csrf
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label style="color :black">The User Name:</label>
                                            <input type="text" class="typeahead form-control" placeholder="Search a user..."
                                                name="username" id="assign-roles" autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="category" class=" col-form-label "
                                                style="color: black">{{ __('Role') }}</label>

                                            <select id="category" class="form-control" name="role" required
                                                autocomplete="job_title" autofocous>
                                                @foreach ($roles as $role)
                                                    <option value="" disabled selected hidden>Choose a Role</option>
                                                    <option>{{ $role->title }}</option>
                                                @endforeach
                                            </select>

                                            <span class="text-danger">{{ $errors->first('role') }}</span>
                                            @if ($errors->any())
                                                <p style="color: red">{{ $errors->first() }}</p>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-info pull-right">Save</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>

                            </div>


                            {{-- CALENDER SECTION --}}


                            {{-- <div class="box-header">
                                <i class="fa fa-calendar"></i>

                                <h3 class="box-title">Calendar</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#">Add new event</a></li>
                                            <li><a href="#">Clear events</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">View calendar</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div> --}}
                            <!-- /.box-body -->


                            {{-- TASK EVENTS SECTION --}}


                            {{-- <div class="box-footer text-black">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Progress bars -->
                                        <div class="clearfix">
                                            <span class="pull-left">Task #1</span>
                                            <small class="pull-right">90%</small>
                                        </div>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                                        </div>

                                        <div class="clearfix">
                                            <span class="pull-left">Task #2</span>
                                            <small class="pull-right">70%</small>
                                        </div>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="clearfix">
                                            <span class="pull-left">Task #3</span>
                                            <small class="pull-right">60%</small>
                                        </div>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                                        </div>

                                        <div class="clearfix">
                                            <span class="pull-left">Task #4</span>
                                            <small class="pull-right">40%</small>
                                        </div>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div> --}}
                        </div>

                        <!-- /.box -->


                    </section>

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Striped Full Width Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">55%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-yellow">70%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light-blue">30%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">90%</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
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
    @endsection
