@extends('layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Project</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
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
   
<form action="{{ route('projects.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Name:</strong>
                <input type="text" name="projectname" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Description:</strong>
                <textarea class="form-control" style="height:150px" name="projectdesc" placeholder="Description"></textarea>
            </div>
        </div>
         <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group text-center">
				<strong>Added Date</strong></br>
				<input type="date" name="addeddate" />
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group text-center">
				<strong>Started Date</strong></br>
				<input type="date" name="startdate" />
            </div>
        </div> 
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group text-center">
				<strong>Due Date</strong></br>
				<input type="date" name="duedate" />
            </div>
        </div>  
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group text-center">
				<strong>Actual Completion Date</strong></br>
				<input type="date" name="actualcompletiondate" />
            </div>
        </div>          
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				<div class="pull-left" style="width:40%; text-align:right;margin-right:25px"><strong>Project is Active</strong></div>
                <div class="pull-right" style="width:40%;margin-left:25px"><input type="checkbox" id="active" name="active" value="1" checked></div>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

    
@endsection
