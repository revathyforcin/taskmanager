<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display all tasks
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show form to create a new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in-progress,completed',
        ]);

        Task::create($request->all());

        return redirect()->route('admin.tasks')->with('success', 'Task created successfully!');
    }

    // Show a specific task for editing
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update the task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in-progress,completed',
        ]);

        $task->update($request->all());

        return redirect()->route('admin.tasks')->with('success', 'Task updated successfully!');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks')->with('success', 'Task deleted successfully!');
    }
}
