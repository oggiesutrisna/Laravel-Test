<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'completed' => ['required'],
        ]);

        return Task::create($request->validated());
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'completed' => ['required'],
        ]);

        $task->update($request->validated());

        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json();
    }
}
