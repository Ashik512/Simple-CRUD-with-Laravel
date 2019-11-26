@extends('layout')

@section('content')
@if (session('status'))

     <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	     <span aria-hidden="true">&times;</span>
	  </button>
</div>

    
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">	
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">phone</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $row)
    <tr>
      <th scope="row">{{ $row->id }}</th>
      <td>{{ $row->name }}</td>
      <td>{{ $row->email }}</td>
      <td>{{ $row->phone }}</td>
      <td> <img src="{{ $row->image }} " width="100" height="60" alt="image"></td>
      <td>
      	<a href="{{ url('/editstudent/'.$row->id ) }}" class="btn btn-success">Edit</a>
      	<a href="{{ url('/deletestudent/'.$row->id) }}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('/savestudent') }}" method="post" enctype="multipart/form-data">
              @csrf
      <div class="modal-body">

        	<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">

			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
			   
			  </div>
			  <div class="form-group">
			    <label for="phone">Phone</label>
			    <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1"> Insert Image</label>
			    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
			  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
</form>
    </div>
   </div>
</div>

@endsection