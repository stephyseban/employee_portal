@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Employee Edit</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Employee Edit</li>
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

               <form action="{{route('employee.update')}}" id="myform" method="post" enctype="multipart/form-data">
                  @csrf
                  {{method_field('put')}}
                  <input type="hidden" name="id" value="{{$employee->id}}">
                  <input type="hidden" name="designation" value="{{$employee->designation_id}}">
                  <div class="card-body">
                     <div class="form-group">
                        <label for="inputName">employee Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$employee->name}}">
                     </div>
                     <div class="form-group">
                        <label for="inputName">employee email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$employee->email}}">
                     </div>

                     <div class="form-group">
                        <label for="inputName">Image</label>
                        @if($employee->photo)
                        <img src="{{asset('employee-image/'.$employee->photo)}}" style="width:25%"> <br>
                        @endif
                              <input type="file" name="image" class="form-control" placeholder="Choose File" id="file">
                     </div>


                     <div class="form-group">
                        <label for="inputStatus">Designation</label>
                        <select id="status" name="status" class="form-control custom-select">
                           <option selected disabled>Select one</option>
                           @foreach ($designation as $desig)
                           <option value="{{$desig['id']}}" {{$desig['id']== $employee->designation_id?'selected':''}}>{{$desig['designation_name']}}</option>
                           @endforeach

                        </select>
                     </div>

                     <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="status" name="status" class="form-control custom-select">
                           <option selected disabled>Select one</option>
                           <option value="1" {{'1'== $employee->status?'selected':''}}>Active</option>
                           <option value="2" {{'2'== $employee->status?'selected':''}}>INActive</option>

                        </select>
                     </div>

                  </div>
                  <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>

      </div>
      <div class="row">
         <div class="col-6" style="margin-bottom: 12px;">
            <input type="submit" value="Update" class="btn btn-success ">
         </div>
         <div class="col-6" style="margin-bottom: 12px;" align="right">
            <input type="button" onclick="window.location.href='/employee'" value="Back" class="btn btn-success ">
         </div>
      </div>
      </form>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
<script>
   $(document).ready(function() {

      $('#myform').validate({ // initialize the plugin
         rules: {
            status: {
               required: true,
            },

            name: {
               required: true,

            },



         },
         submitHandler: function(form) { // for demo
            $('#myform').submit();
         }
      });

   });
</script>
@endsection