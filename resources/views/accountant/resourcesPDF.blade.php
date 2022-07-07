<!DOCTYPE html>
<html>

<head>
    <title>List Of Registered Resources</title>
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
                    {{-- <div class="row">
                        <img src="{{URL::asset('/images/image1.png')}}" alt="profile Pic" height="10px" width="200">
                    </div> --}}
                    <div class="card card-primary">
                        
                            <center><h3> EVANGELICAL LUTHERAN CHURCH IN TANZANIA</h3><center>
                            <center><h4> EASTERN AND COAST DIOCESE</h4><center>
                            <center><h4> NORTHERN PROVINCE</h4><center>
                            <center><h4> MWENGE CHURCH</h4><center>
                                <u><center><h5> DATE:   {{date('Y-m-d');}}</h5><center></u>
                        <div class="card-header">
                            <center><h3 class="card-title center">LIST OF MEMBERS RESOURCES</h3><center>
                        </div>
                        {{-- <!-- /.card-header -->
                        <div class="card-body"> --}}
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Buyer PhoneNumber</th>
                                        <th>Value</th>
                                        <th>Date Bought</th>
                                        <th>Picture</th>
                                    </tr>
                                </thead>
                      @foreach ($resources as $resource)
    
                                    <tr>
                                        <td>{{ $resource->name }}</td>
                                        <td>{{ $resource->category }}</td>
                                        <td>{{ $resource->buyer_number }}</td>
                                        <td>{{ number_format($resource->price) }} Tsh</td>
                                        {{-- <td> <img src="resources/{{$resource->picture}}" width="50px" height="50px" alt=""></td> --}}
                                        <td>{{ $resource->date}}</td>
                                        <td><img src="resources/{{$resource->picture}}" width="100px" height="100px" alt=""></td>


                                    </tr>
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
