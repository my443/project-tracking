@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
            </div>
        </div>
    </div>
<div class="row">
			<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="40%">Field</th>
                                <th width="60%">Value</th>
                            </tr>
                        </thead>
                        
                        <tbody>
						@foreach ($fields as $feildname => $fieldtitle)
                            <tr>
                                <td>{{ $fieldtitle }}</td>
                                <td>{{ $project->$feildname }}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td>Text</td>
                                <td>                
									@if ($project->active == 1)
										Active
									@else
										Inactive
									@endif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

   
   
@endsection
