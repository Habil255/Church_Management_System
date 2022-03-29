@extends('pages.main')
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
                {{-- <div class="row">
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
                                <h3></h3>

                                <p>Church Members</p>
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
                </div> --}}
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">



                    <section class="content">
                        <div class="row ">
                            <div class="col-xs-12">
                                <form action="{{ route('pastor.singleMember') }}">

                                    <div class="card col-md-6" style="margin-top: 3%; margin-left: 20%;">
                                        <div class="card-header">
                                            Search For student
                                        </div>
                                        <div class="input-group mb-3"
                                            style="padding-top: 2%; padding-left: 2%; padding-right: 2%;">
                                            <input type="text" id="member-search" class="typeahead form-control"
                                                autocomplete="off" name="member" placeholder="Search..."
                                                aria-label="Search..." aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Search</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                            <!-- /.box -->
                        
                            
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
    @endsection
