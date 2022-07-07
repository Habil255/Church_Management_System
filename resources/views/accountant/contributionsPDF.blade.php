<!DOCTYPE html>
<html>

<head>
    <title>List Of Contributions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</head>

<body>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary">
                    <center>
                        <h3> EVANGELICAL LUTHERAN CHURCH IN TANZANIA</h3>
                        <center>
                            <center>
                                <h4> EASTERN AND COAST DIOCESE</h4>
                                <center>
                                    <center>
                                        <h4> NORTHERN PROVINCE</h4>
                                        <center>
                                            <center>
                                                <h4> MWENGE CHURCH</h4>
                                                <center>
                                                    <u>
                                                        <center>
                                                            <h5> DATE: {{ date('Y-m-d') }}</h5>
                                                            <center>
                                                    </u>
                                                    <div class="card-header">
                                                        <center>
                                                            <h3 class="card-title center">LIST OF MEMBERS CONTRIBUTIONS
                                                            </h3>
                                                            <center>
                                                    </div>
                                                    {{-- <!-- /.card-header -->
                        <div class="card-body"> --}}
                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Member Name</th>
                                                                <th>Email</th>
                                                                <th>Contribution Category</th>
                                                                <th>Amount</th>
                                                                <th>Payment method</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($users as $user)
                                                                <tr>
                                                                    @foreach ($user->contributions as $contribution)
                                                                        <td>{{ $user->first_name . ' ' . $user->last_name }}
                                                                        </td>
                                                                        <td>{{ $user->email }}</td>
                                                                        <td>
                                                                            <div class="sparkbar" data-color="#00a65a"
                                                                                data-height="20">
                                                                                {{ $contribution->category }}</div>
                                                                        </td>
                                                                        <td>{{ number_format($contribution->amount) }}<small>
                                                                                Tsh</small></td>
                                                                        <td>{{ $contribution->payment_type }}</small>
                                                                        </td>
                                                                        {{-- <td><span class="label label-success">In Use</span></td> --}}
                                                                </tr>
                                                            @endforeach
                                                            @endforeach 
                                                        </tbody>
                                                    </table>
                                                    {{-- </div> --}}
                                                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->


    </section>
</body>

</html>
