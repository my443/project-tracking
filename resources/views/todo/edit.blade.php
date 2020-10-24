@extends('layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Task</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('todos.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Task Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Name" value="{{ $todo->title }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Task Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $todo->description }}</textarea>
            </div>
        </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				<div class="pull-left" style="width:40%; text-align:right;margin-right:25px"><strong>Complete</strong></div>
                <div class="pull-right" style="width:40%;margin-left:25px">
					@if ($todo->complete == 1)
						<input type="checkbox" id="complete" name="complete" value="1" checked>
					@else 
						<input type="checkbox" id="complete" name="complete" value="1">
					
					@endif
					
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

    
@endsection
