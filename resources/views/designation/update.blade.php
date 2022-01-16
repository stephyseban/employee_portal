@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Designation Edit</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Designation Edit</li>
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
                  <h3 class="card-title">Designation</h3>

               </div> <br>
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

               <form action="{{route('designation.update')}}" id="myform" method="post">
               @csrf
                     {{method_field('put')}}
                     <input type="hidden" name="id" value="{{$designation->id}}">
                  <div class="card-body">
                     <div class="form-group">
                        <label for="inputName">Designation Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$designation->designation_name}}" autocomplete="off">
                     </div>

                     <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="status" name="status" class="form-control custom-select">
                           <option selected disabled>Select one</option>
                           <option value="1" {{'1'== $designation->status?'selected':''}}>Active</option>
                              <option value="2" {{'2'== $designation->status?'selected':''}}>IN Active</option>

                        </select>
                     </div>

                  </div>
                  <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>

      </div>
      <div class="row">
         <div class="col-12">
            <input type="submit" value="Update" class="btn btn-success ">
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

$(document).ready(function () {

$('#myform').validate({ // initialize the plugin
    rules: {
      status: {
            required: true,
        },
        
         name: {
            required: true,
            
        }, 
        
            
       
    },
    submitHandler: function (form) { // for demo
      $('#myform').submit();
    }
});

});


</script>
@endsection