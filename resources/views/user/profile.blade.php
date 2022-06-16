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

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                    <div class="col-md-12">

                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">User Profile</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-remove"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <form role="form" method="POST" enctype="multipart/form-data"
                                action="{{ route('profile.settings', $user->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4 pull right">
                                        <div class="box-body box-profile">
                                            <img class="profile-user-img img-responsive img-circle"
                                                src="{{ asset('images/' . $user->profile_picture) }}"
                                                alt="User profile picture">
                                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                            <p class="text-muted text-center">{{ $user->email }}</p>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>

                                            @if ($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif

                                            
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-8">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#settings"
                                                        data-toggle="tab">Settings</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>



                                <div class="box-header with-border">
                                    <b>
                                        <h3 class="box-title">Personal Details</h3>
                                    </b>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" value="{{ $user->first_name }}" class="form-control"
                                                    name="first_name" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" class="form-control" value="{{ $user->middle_name }}"
                                                    name="middle_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" value="{{ $user->last_name }}"
                                                    name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                                        <div class="col-sm-4 form-group">
                                            <label>Username</label>
                                            <input type="Address" class="form-control" value="{{ $user->username }}"
                                                name="username">
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>email (optional)</label>
                                            <input type="email" class="form-control" value="{{ $user->email }}"
                                                name="email">
                                        </div>


                                        <div class="form-group col-sm-2">
                                            <label for="">Gender</label>
                                            @if ($user->gender == 'M')
                                                <input class="form-control" type="text" value="Male" name="gender"
                                                    disabled enabled>
                                            @elseif ($user->gender == 'F')
                                                <input class="form-control" type="text" value="Female" name="gender"
                                                    disabled enabled>
                                            @endif


                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Date of Birth:</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="date" name="date_of_birth"
                                                    class="form-control datetimepicker-input" data-target="#reservationdate"
                                                    value="{{ $user->date_of_birth }}" disabled/>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                                        <div class="col-sm-3 form-group">
                                            <label>Place of Birth</label>
                                            <input type="Address" name="place_of_birth" class="form-control"
                                                value="{{ $user->place_of_birth }}">
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <label for="category" class=" col-form-label "
                                                style="color: black">{{ __('Marrital Status') }}</label>
                                            <input type="text" name="marital_status" class="form-control"
                                                value="{{ $user->marital_status }}" disabled>
                                            <span class="text-danger">{{ $errors->first('role') }}</span>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Spouse Name(Optional)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $user->spouse_name }}" name="spouse_name">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-header with-border">
                                    <b>
                                        <h3 class="box-title">Address Details</h3>
                                    </b>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">District</label>
                                                {{-- {{isset($user) ? $user : 'Habil'}} --}}
                                                {{-- {{dd($user->physicalAddresses->district)}} --}}
                                                @if (isset($user->physicalAddresses->district))
                                                    <div class="col-sm-10">
                                                        <input type="text"
                                                            value="{{ $user->physicalAddresses->district }}"
                                                            name="district" class="form-control" id=""
                                                            placeholder="Ubungo">
                                                    </div>
                                                @else
                                                    <div class="col-sm-10">
                                                        <input type="text" name="district" class="form-control" id=""
                                                            placeholder="Ubungo" required>
                                                    </div>
                                                @endif


                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Ward</label>
                                                @if (isset($user->physicalAddresses->ward))
                                                    <div class="col-sm-10">
                                                        <input type="text" value="{{ $user->physicalAddresses->ward }}"
                                                            name="ward" class="form-control" id="" placeholder="Makoka">
                                                    </div>
                                                @else
                                                    <div class="col-sm-10">
                                                        <input type="text" name="ward" class="form-control" id=""
                                                            placeholder="Ward">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Street</label>
                                                @if (isset($user->physicalAddresses->street))
                                                    <div class="col-sm-10">
                                                        <input type="text" value="{{ $user->physicalAddresses->street }}"
                                                            name="street" class="form-control" id="inputEmail3"
                                                            placeholder="Mikongeni">
                                                    </div>
                                                @else
                                                    <div class="col-sm-10">
                                                        <input type="text" name="street" class="form-control" id=""
                                                            placeholder="Mikongeni">
                                                    </div>
                                                @endif
                                                {{-- {{isset($user) ? $user : 'Habil'}} --}}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-6 control-label">House No:</label>
                                                @if (isset($user->physicalAddresses->house_number))
                                                    <div class="col-sm-10">
                                                        <input type="number" name="house_number"
                                                            value="{{ $user->physicalAddresses->house_number }}"
                                                            class="form-control" id="inputEmail3"
                                                            placeholder="Mikongeni">
                                                    </div>
                                                @else
                                                    <div class="col-sm-10">
                                                        <input type="number" name="house_number" class="form-control"
                                                            id="" placeholder="Mikongeni">
                                                    </div>
                                                @endif
                                                {{-- {{isset($user->physicalAddress) ? dd($user) : 'Habil'}} --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Block No:</label>
                                                @if (isset($user->physicalAddresses->block_number))
                                                    <input type="number" name="block_number"
                                                        value="{{ $user->physicalAddresses->block_number }}"
                                                        class="form-control" id="" placeholder="Makoka">
                                                @else
                                                    <div class="col-sm-10">
                                                        <input type="number" name="block_number" class="form-control"
                                                            id="inputEmail3" placeholder="123" max="4000" min="0">
                                                    </div>
                                                @endif
                                                {{-- {{isset($user->physicalAddress) ? $user : 'Habil'}} --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="box-header with-border">
                                    <h3 class="box-title">Contact Details</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-6 control-label">Phone
                                                    number:</label>

                                                @if (isset($user->contactAddresses->phonenumber))
                                                    <div class="col-sm-10">
                                                        <input type="text" name="phonenumber"
                                                            value="{{ $user->contactAddresses->phonenumber }}"
                                                            class="form-control" id="inputEmail3" placeholder="897"
                                                            max="4000" min="0">
                                                    </div>
                                                @else
                                                    <div class="col-sm-10">
                                                        <input type="text" name="phonenumber" class="form-control"
                                                            id="inputEmail3" placeholder="+255 756 577 234" max="4000"
                                                            min="0">
                                                    </div>
                                                @endif
                                                {{-- value="{{$user->contactAddresses->phonenumber}}" --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Postal
                                                    address:</label>

                                                @if (isset($user->contactAddresses->postal_address))
                                                    <div class="col-sm-10">
                                                        <input type="text"
                                                            value="{{ $user->contactAddresses->postal_address }}"
                                                            class="form-control" id="inputEmail3" max="4000" min="0">
                                                    </div>
                                                @else
                                                    <div class="col-sm-10">
                                                        <input type="text" name="postal_address" class="form-control"
                                                            id="inputEmail3" placeholder="P.o Box 2443" max="4000" min="0">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

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
    @endsection
