@extends('layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('updatestudent/'.$result->id)}}" method="post" enctype="multipart/form-data">
	@csrf

	


<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" value="{{ $result->name }}" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">

			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control"  value="{{ $result->email }}" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">

				 

			  </div>
			  <input type="hidden" name="old_photo" value="{{ $result->image }}">

			  <div class="form-group">
			    <label for="phone">Phone</label>
			    <input type="number" class="form-control" value="{{ $result->phone }}" name="phone" id="phone" placeholder="Enter Phone">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1"> Insert Image</label>
			    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
			  </div>
			  <input type="submit" class="btn btn-success" value="Update">
      </div>

      </form>

 @endsection
