@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Employee Add</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Employee Add</li>
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
                  <h3 class="card-title">Empployee</h3>

               </div>
               <!-- @if(count($errors) > 0 )
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
               @endif -->

               <form action="{{route('employee.store')}}" id="myform" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="form-group">
                        <label for="inputName"> Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Employee Name" class="form-control" value="{{old('name')}}">

                        @if ($errors->has('name'))
                        <span class="invalid feedback error" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                     </div>

                     <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="{{old('email')}}">
                        @if ($errors->has('email'))
                        <span class="invalid feedback error" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                     </div>

                     <div class="form-group">
                        <label for="inputName">Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Choose File" id="file">
                        @if ($errors->has('image'))
                        <span class="invalid feedback error" role="alert">
                           <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                     </div>


                     <div class="form-group">
                        <label for="inputStatus">Designation</label>
                        <select id="designation" name="designation" class="form-control custom-select">
                           <option selected disabled>Select one</option>
                           @foreach($designation as $desig)
                           <option value="{{$desig->id}}"> {{$desig->designation_name}}</option>
                           @endforeach

                        </select>
                        @if ($errors->has('designation'))
                        <span class="invalid feedback error" role="alert">
                           <strong>{{ $errors->first('designation') }}</strong>
                        </span>
                        @endif
                        
                     </div>

                     <div class="form-group">
                        <label for="inputStatus">status</label>
                        <select id="status" name="status" class="form-control custom-select">
                           <option selected disabled>Select one</option>
                           <option value="1"> Active</option>
                           <option value="2">Inactive</option>

                        </select>
                        @if ($errors->has('status'))
                        <span class="invalid feedback error" role="alert">
                           <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                     </div>

                  </div>
                  <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>

      </div>
      <div class="row">
         <div class="col-12" style="  margin-bottom: 15px;">
            <input type="submit" value="Create " class="btn btn-success ">
         </div>
      </div>
      </form>
   </section>
   <!-- /.content -->
</div>


@endsection