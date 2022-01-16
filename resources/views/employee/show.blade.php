@extends('layouts.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Employee Show</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Employee Show</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Employee</h3>

               </div>
               @if(count($errors) > 0 )
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="p-0 m-0" style="list-style: none;">
                     @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                     @endforeach
                  </ul>
               </div>
               @endif

               <form action="{{route('employee.store')}}" id="myform" method="post">
                  @csrf
                  <div class="card-body">
                     <div class="form-group">
                        <label for="inputName">employee Name</label>
                        <input type="text" id="name" name="name" class="form-control"  value="{{$employee->name}}" readonly="">
                     </div>
                     <div class="form-group">
                        <label for="inputName">email </label>
                        <input type="text" id="name" name="name" class="form-control"  value="{{$employee->email}}" readonly="">
                     </div>



                     <div class="form-group">
                        <label for="inputStatus">Designation</label>
                        <input type="text" name="categpry_name" value="{{$employee->getDesignation->designation_name?$employee->getDesignation->designation_name:''}}" class="form-control" placeholder="Enter Number of Running sections" readonly="">
                     </div>

                     @if($employee->photo)
                     <div class="form-group">
                        <label for="inputStatus">Image</label>
                        <img src="{{asset('employee-image/'.$employee->photo)}}" style="width:25%">                     </div>
                        @endif

                     <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="status" name="status" class="form-control custom-select" disabled="">
                           <option selected disabled>Select one</option>
                           <option value="1" {{'1'== $employee->status?'selected':''}}>active</option>
                              <option value="2" {{'2'== $employee->status?'selected':''}}>Inactive</option>

                        </select>
                     </div>

                  </div>
                  <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>

      </div>
      <div class="row">
         <div class="col-12" style="margin-bottom: 12px;">
         <a  href="{{route('employee.index')}}" class="btn btn-success waves-effect waves-light">Back</a>
         </div>
      </div>
      </form>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection