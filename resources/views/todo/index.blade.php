@extends('layouts.app')
 
@section('content')

        <div class="row">
            <div class="col">
				<div class="pull-left">
                <h1>Tasks</h1>
                </div>
				<div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.index') }}"> Back to Project View</a>
            </div></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th style="text-align:center;">Complete</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

						@foreach ($todos as $todo)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $todo->project->projectname }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                
                                <td style="text-align:center;">
									@if ($todo->complete == 1)
										<input type="checkbox" id="complete" name="complete" value="1" checked>
									@elseif ($todo->complete == 0)
										<input type="checkbox" id="complete" name="complete" >
									@endif
								</td>
                                <td>                
									<form action="{{ route('todos.destroy',$todo->id) }}" method="POST">
   
									<a class="btn btn-info" href="{{ route('todos.show',$todo->id) }}"><i class="far fa-eye"></i></a>
    
									<a class="btn btn-primary" href="{{ route('todos.edit', $todo->id) }}"><i class="far fa-edit" ></i></a>
   
									@csrf
									@method('DELETE')
					  
									<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt" ></i></button>
								</form></td>
                            </tr>
						@endforeach
						
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

