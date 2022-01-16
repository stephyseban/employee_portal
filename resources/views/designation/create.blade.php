@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Designation Add</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item active">Designation Add</li>
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

               <form action="{{route('designation.store')}}" id="myform" method="post">
                  @csrf
                  <div class="card-body">
                     <div class="form-group">
                        <label for="inputName">Designation Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Designation" autocomplete="off">
                        @if($errors->has('name'))
                        <span1>{{ $errors->first('name') }} </span1>
                        @endif
                     </div>

                     <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="status" name="status" class="form-control custom-select">
                           <option selected disabled>Select one</option>
                           <option value="1"> Active</option>
                           <option value="2">In Active</option>

                        </select>
                        @if($errors->has('status'))
                        <span1>{{ $errors->first('status') }} </span1>
                        @endif
                     </div>

                  </div>
                  <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>

      </div>
      <div class="row">
         <div class="col-12">
            <input type="submit" value="Create " class="btn btn-success ">
         </div>
      </div>
      </form>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection