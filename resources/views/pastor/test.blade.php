@extends('pages.main')
@section('contents')
    <form role="form" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" value="{{ $memberDetails->first_name }}" class="form-control" value=""
                            placeholder="Jacob" name="first_name" autocomplete="off">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" placeholder="James" name="middle_name">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Lomell" name="last_name">
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
                    <input type="Address" class="form-control" placeholder="Jam224@gmail.com" name="email">
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
                        <input type="date" name="date_of_birth" class="form-control datetimepicker-input"
                            data-target="#reservationdate" />

                    </div>
                </div>


            </div>
            <div class="row">
                {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                <div class="col-sm-3 form-group">
                    <label>Place of Birth</label>
                    <input type="Address" name="place_of_birth" class="form-control" placeholder="Mabibo">
                </div>
                <div class="col-sm-5 form-group">
                    <label for="category" class=" col-form-label "
                        style="color: black">{{ __('Marrital Status') }}</label>

                    <select id="category" class="form-control" name="marital_status" required autocomplete="job_title"
                        autofocous>

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
                        <input type="text" class="form-control" placeholder="Lomell" name="spouse_name">
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
@endsection






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
        <form role="form" enctype="multipart/form-data">
            @csrf
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
                            <input type="text" class="form-control" value="{{ $user->first_name }}"
                                name="middle_name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="{{ $user->first_name }}"
                                name="last_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                    <div class="col-sm-4 form-group">
                        <label>Username</label>
                        <input type="Address" class="form-control" value="{{ $user->first_name }}" name="username">
                    </div>
                    <div class="col-sm-3 form-group">
                        <label>email (optional)</label>
                        <input type="Address" class="form-control" value="{{ $user->first_name }}" name="email">
                    </div>


                    <div class="form-group col-sm-2">
                        <label for="">Gender</label>
                        @if ($user->gender == 'M')
                            <input class="form-check-input" type="text" value="Male" name="gender" disabled>
                        @elseif ($user->gender == 'F')
                            <input class="form-check-input" type="text" value="Female" name="gender" disabled>
                        @endif


                    </div>
                    <div class="col-sm-3 form-group">
                        <label>Date of Birth:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" name="date_of_birth" class="form-control datetimepicker-input"
                                data-target="#reservationdate" />

                        </div>
                    </div>


                </div>
                <div class="row">
                    {{-- <span class="text-danger">{{ $errors->first('title') }}</span> --}}
                    <div class="col-sm-3 form-group">
                        <label>Place of Birth</label>
                        <input type="Address" name="place_of_birth" class="form-control" placeholder="Mabibo">
                    </div>
                    <div class="col-sm-5 form-group">
                        <label for="category" class=" col-form-label "
                            style="color: black">{{ __('Marrital Status') }}</label>
                        <input type="text" name="marital_status" class="form-control" placeholder="Mabibo">
                        <span class="text-danger">{{ $errors->first('role') }}</span>
                        @if ($errors->any())
                            <p style="color: red">{{ $errors->first() }}</p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Spouse Name(Optional)</label>
                            <input type="text" class="form-control" placeholder="Lomell" name="spouse_name">
                        </div>
                    </div>
                </div>

            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Address Details</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">District</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Ward</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Street</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">House No:</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="132"
                                    max="4000" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Block No:</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="123"
                                    max="4000" min="0">
                            </div>
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

