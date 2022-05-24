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
                <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title"><b>{{$user->first_name." ". $user->last_name}}</b> <small>Profile</small></h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                      </div>
                      
                    </div>
                    <!-- /.box-body -->
                    <form role="form" method="POST" action="{{ route('pastor.addMember') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Jacob" name="first_name" value="{{$user->first_name}}"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" placeholder="James" name="middle_name" value="{{$user->first_name}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Lomell" name="last_name" value="{{$user->middle_name}}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                                    <div class="col-sm-4 form-group">
                                        <label>Username</label>
                                        <input type="Address" class="form-control" placeholder="Jam224" name="username" value="{{$user->last_name}}"
                                            required>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>email (optional)</label>
                                        <input type="Address" class="form-control" placeholder="Jam224@gmail.com" value="{{$user->email }}"
                                            name="email">
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="">Gender</label>
                                        @if ($user->gender == 'M')
                                            <input class="form-check-input" type="text" value="Male" name="gender"
                                                enabled>
                                        @elseif ($user->gender == 'F')
                                            <input class="form-check-input" type="text" value="Female" name="gender"
                                                enabled>
                                        @endif
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
                                {{-- <button type="submit" class="btn btn-primary swalDefaultSuccess">Activate</button> --}}
                                @if ($user->status == '0')
                                                        <a href="{{ route('pastor.approve', $user->id) }}"
                                                            class="btn btn-warning swalDefaultSuccess">Activate</a>
                                                    @elseif ($user->status == '1')
                                                        <a class="btn btn-success swalDefaultSuccess">Activated</a>
                                                    @endif
                            </div>
                        </form>
                  </div>
                
                <div class="row">



                    <section class="content">
                        

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

        



        {{-- The Modal to View a single user details --}}
    @endsection
