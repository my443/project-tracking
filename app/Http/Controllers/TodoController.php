<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Project;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        
        return view('todo.index', compact('todos'))->with('i', 0);
    }

    /**
     * Display a listing of the resource by a specific project as defined by projectid.
     *
     * @return \Illuminate\Http\Response
     */    
    public function showByProject($projectid){
        $todos = Todo::where('project_id', $projectid)->get();
        
        return view('todo.index', compact('todos'))->with('i', 0);		
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
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
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $r = $request->all();
        
        // This will someday be changed to the actual project #
        //$r['project_id'] = 6;
        
        // If the checkbox is not checked, it doesn't post any value. 
        // So if it exists, it is a 1 in the database, otherwise it is a zero.
        if (!$request->has('complete')){
			$r['complete'] = 0;
			}
        
        //$request->has('complete') ? $request->complete = 1 : $request->complete = 0;
    
        Todo::create($r);
     
        return redirect()->route('todos.index')
                        ->with('success','Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
		return view('todo.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $r = $request->all();
        
        // This will someday be changed to the actual project #
        $r['project_id'] = 1;
        
        // If the checkbox is not checked, it doesn't post any value. 
        // So if it exists, it is a 1 in the database, otherwise it is a zero.
        if (!$request->has('complete')){
			$r['complete'] = 0;
			}
        
        //$request->has('complete') ? $request->complete = 1 : $request->complete = 0;
    
        $todo->update($r);
     
        return redirect()->route('todos.index')
                        ->with('success','Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    
        return redirect()->route('todos.index')
                        ->with('success','Task with ID# '.$todo->id.' deleted successfully');
    }
}
