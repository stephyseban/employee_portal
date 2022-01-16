
@extends('layouts.master')
@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Designation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Designation</li>
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
                  <a class="btn btn-primary btn-sm" href="{{route('designation.create')}}">
                             Add Designation
                    </a></li>
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
                <h3 class="card-title">Desinagtion List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Designation Name</th>
                    <th> Status</th>
                    <th>  Created Date</th>
                    <th>action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i =  1; ?>
                    @foreach($designations as $designation)
                   
                  <tr>
                  <td> {{$i}}</td>
                    <td>{{$designation->designation_name}}</td>
                    @if($designation->status==1)
                    <td>Active </td>
                      @else
                      <td>Not Active </td>
                      @endif
                    
                    <td>{{$designation->created_at}}</td>
                    <td>
                  <a href="{{url('designation_edit/'.$designation->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                  <a href="{{url('designation_show/'.$designation->id)}}" class="btn btn-info"><i class="fa fa-eye"></i> </a>
                  <a href="{{url('designation_delete/'.$designation->id)}}" onclick="return confirm('Are you sure you want to delete?')";  class="btn btn-danger"><i class="fas fa-trash"></i> </a>
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
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
