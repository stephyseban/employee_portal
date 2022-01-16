@extends('layouts.master')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Employee</li>
          </ol>
        </div>

      </div>

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a class="btn btn-primary btn-sm" href="{{route('employee.create')}}">
                Add Employee
              </a>
            </li>
          </ol>
        </div>

      </div>
    </div>
  </section>
  @if (session('create'))
  <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> {{ session('create') }} </strong>
  </div>
  @endif
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Employee List</h3>
            </div>
            <form action="{{route('employee_search')}}" method="GET">
              <div class="card-header flthd">

                <div class="form-group row">

                  <div class="col boxspace">
                    <a href="{{ route('employee.index')}}" title="Clear filter"><i class="fa fa-filter flt"></i></a>
                  </div>
                  <div class="col boxspace">
                    <input type="text" name="name" id="name" class="form-control boxbrd hgt" placeholder="Enter Employee Name" value="{{old('name', request('name'))}}">
                  </div>
                  <div class="col boxspace">
                    <input type="text" name="email" id="email" class="form-control boxbrd hgt" placeholder="Enter Email" value="{{old('email', request('email'))}}">
                  </div>
                  <div class="col boxspace">
                    <select name="designation" id="designation" class="form-control boxbrd hgt" >
                      <option value="" >--Select Designation--</option>

                      @foreach($designation as $desig)
                      <option value="{{$desig->id}}" {{ (old('designation', request('designation')) == $desig->id ? "selected":"") }}> {{$desig->designation_name}}</option>
                      @endforeach
                    </select>
                  </div>
                 
                  <div class="col-sm-1 boxspace">
                    <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
                  </div>
                </div>

              </div>

            </form>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th> Status</th>
                    <th> Created Date</th>
                    <th>action</th>


                  </tr>
                </thead>
                <tbody>
                  <?php $i =  1; ?>
                  @foreach($employees as $employee)

                  <tr>
                    <td> {{$i}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->getDesignation->designation_name}}</td>
                    @if($employee->status==1)
                    <td>Active </td>
                    @else
                    <td>Not Active </td>
                    @endif

                    <td>{{$employee->created_at}}</td>
                    <td>
                      <a href="{{url('employee_edit/'.$employee->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                      <a href="{{url('employee_show/'.$employee->id)}}" class="btn btn-info"><i class="fa fa-eye"></i> </a>
                      <a href="{{url('employee_delete/'.$employee->id)}}"  onclick="return confirm('Are you sure you want to delete?')";  class="btn btn-danger"><i class="fas fa-trash"></i> </a>
                    </td>
                  </tr>
                  <?php $i++ ?>
                  @endforeach

                </tbody>

              </table>
            </div>

          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>

  </section>
  <!-- /.content -->
</div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>



<!-- Page specific script -->
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


@endsection