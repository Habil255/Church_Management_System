<!DOCTYPE html>
<html>
<head>
    <title>List Of Registered Users</title>
</head>
<body>
    <h1>List of Registered Users</h1>
    <p>Church Management System</p>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of Registered Users</h3>
                {{-- <span>
                    <button type="button" class="btn btn-default pull-right" data-toggle="modal"
                        data-target="#modal-default">
                        Add User
                    </button>
                </span> --}}

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
                        {{-- @foreach ($userInfos ?? '' as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->first_name }}</td>
                                    <td>{{ $data->last_name }}</td>
                                    <td>{{ $data->email }}</span></td>
                                    <td>
                                    
                                        {{ $data->spouse_name }}
                                    </td>
                                   
                                </tr>
                            @endforeach --}}
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
    </section>
</body>
</html>