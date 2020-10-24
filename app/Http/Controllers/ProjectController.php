<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//echo $filter;
        $projects = Project::latest()->paginate(20)->where('active', 1);
    
        return view('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }
    
    public function showall(){
		$projects = Project::latest()->paginate(20);
    
        return view('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'projectname' => 'required',
            'projectdesc' => 'required',
        ]);
        
		// We need to turn the request object into an object that we can work with.
		$r = $request->all();
		
		// If there is no active flag set, set it to 0.
		if (!$request->has('active')){
			$r['active'] = 0;
			}	        
		
		Project::create($r);
	 
		return redirect()->route('projects.index')
						->with('success','Project created successfully.');        
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
		$feilds = (object) array('projectname'=>'Project Name', 'projectdesc'=>'Project Description',
								'addeddate'=>'Date Added', 'startdate'=>'Start Date', 'duedate'=>'Due Date', 
								'actualcompletiondate'=>'Date actually complete');
		
		return view('projects.show',compact('project'))->with('fields', $feilds);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'projectname' => 'required',
            'projectdesc' => 'required',
        ]);
        
		// We need to turn the request object into an object that we can work with.
		$r = $request->all();
		
		// If there is no active flag set, set it to 0.
		if (!$request->has('active')){
			$r['active'] = 0;
			}	 
			
		$project->update($r);
	 
		return redirect()->route('projects.index')
						->with('success','Project updated successfully.');  			
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //$project->delete();
        $r['active'] = 0;
        $project->update($r);
    
        return redirect()->route('projects.index')
                        ->with('success','Project with ID# '.$project->id.' archived successfully');
    }
}
