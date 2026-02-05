<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function show() {
        return Project::all();
    }

    public function delete($id){
        $target_project = Project::findOrFail($id);
        $target_project->delete();
        return response()->json('Project Deleted Successfully', 200);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|string',
            'deadline' => 'required|string',
            'members' => 'nullable|string',
            'is_completed' => 'required|boolean',
        ]);

        Project::create($validated);

        return response()->json($request, 200);

    }

    public function update($id, Request $request){
        $data = Project::findOrFail($id);

        $data->name = $request->name;
        $data->deadline = $request->deadline;
        $data->start_date = $request->start_date;
        $data->members = $request->members;
        $data->is_completed = $request->is_completed;
         
        $data->save();

        return response()->json('Edited Successfully', 201);
    }
}
