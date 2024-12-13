<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //ou recebe a quantidade ou usa a quantidade que definirmos
        $qtd = $request->get('qtd', 3);
        $buscar = $request->get('buscar');

        $query = auth()->user()->usersProjects()->with('status');

        if ($buscar) {
            $query->where('name', 'like', '%' . $buscar . '%');
        }

        $projects = $query->paginate($qtd);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date'
        ]);

        $project = new Project();
        $project->name = $validated['name'];
        $project->description = $validated['description'];
        $project->due_date = $validated['due_date'];
        $project->user_id = auth()->id();
        $project->status_id = 1;
        $project->save();

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        if (auth()->user()->usersProjects->contains($project)) {
            $tasks = $project->tasks()->with('status', 'tags')->get();
            return view('projects.show', compact('project', 'tasks'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $statuses = Status::all();
        return view('projects.edit', compact('project', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status_id' => 'required|integer'
        ]);
        $project->update($validated);

        return redirect()->route('projects.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        foreach($project -> tasks() -> get() as $task){
            $task -> delete();
        }

        $project->delete();
        return redirect()->route('projects.index');
    }
}
