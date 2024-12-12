<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $projectId = $request->input('project_id');
        $statuses = Status::all();

        return view('tasks.create', compact('projectId', 'statuses'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'required|exists:statuses,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task = new Task($validated);

        $task->save();

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
   public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $tags = Tag::all();
        $statuses = Status::all();
        $tags_tasks = $task->tags()->get();
        return view('tasks.edit', compact('task', 'tags', 'statuses', 'tags_tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status_id' => 'required|integer',
        ]);
        $task->update($validated);
        $task->tags()->sync($request->tags);

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
