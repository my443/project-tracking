@extends('layouts.app')
 
@section('content')

        <div class="row">
            <div class="col">
				<div class="pull-left">
					<h1>Projects</h1>
                </div>
                </div>
                <div class="col">
				<div class="pull-right">
					<a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
				</div>	
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="4%">#</th>
                                <th width="15%">Project Name</th>
                                <th width="15%">Description</th>
                                <th width="10%" style="text-align:center;">Due Date</th>
                                <th width="10%" style="text-align:center;">Active</th>
                                <th width="15%" style="text-align:center;">Project Action</th>
                                <th width="15%" style="text-align:center;">Task Action</th>
                            </tr>
                        </thead>
                        <tbody>

						@foreach ($projects as $project)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $project->projectname }}</td>
                                <td>{{ $project->projectdesc }}</td>
                                <td style="text-align:center;">{{ $project->duedate }}</td>
                                
                                <td style="text-align:center;">
									@if ($project->active == 1)
										<input type="checkbox" id="complete" name="complete" value="1" checked disabled>
									@elseif ($project->active == 0)
										<input type="checkbox" id="complete" name="complete" disabled>
									@endif
								</td>
                                <td style="text-align:center;">                
									<form action="{{ route('projects.destroy',$project->id) }}" method="POST">
   
									<a class="btn btn-primary" href="{{ route('projects.show',$project->id) }}"><i class="far fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}"><i class="far fa-edit" ></i></a>

									@csrf
									@method('DELETE')
					  
									<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt" ></i></button>

								</form></td>
								<td style="text-align:center;">
								   	<a class="btn btn-primary" href="{{ url('todos/project', ['projectid' => $project->id])  }}"><i class="fas fa-tasks" ></i></a>
									<a class="btn btn-primary" href="{{ route('todos.create', ['projectid' => $project->id]) }}"><i class="fas fa-plus" ></i></a>
								</td>
                            </tr>
						@endforeach
						
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

