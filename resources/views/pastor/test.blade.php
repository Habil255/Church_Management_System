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
                    <input type="text" value="{{ $memberDetails->first_name}}" class="form-control" value=""
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