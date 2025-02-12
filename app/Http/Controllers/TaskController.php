<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show all tasks
    public function index()
    {
        $tasks = Task::with('project', 'users')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show form to create a task
    public function create()
    {
        $projects = Project::all(); // Fetch all projects
        $users = User::all(); // Fetch all users

        return view('tasks.create', compact('projects', 'users'));
    }

    // Store the new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Pending,In Process,Completed',
            'description' => 'nullable|string',
            'users' => 'required|array', // Users must be selected
            'users.*' => 'exists:users,id',
        ]);

        $task = Task::create($request->only(['title', 'project_id', 'start_date', 'end_date', 'status', 'description']));

        // Assign users to the task
        foreach ($request->users as $user_id) {
            TaskDetail::create([
                'task_id' => $task->id,
                'user_id' => $user_id
            ]);
        }

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Show the edit form
    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();
        $assignedUsers = $task->users->pluck('id')->toArray();

        return view('tasks.edit', compact('task', 'projects', 'users', 'assignedUsers'));
    }

    // Update the task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Pending,In Process,Completed',
            'description' => 'nullable|string',
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);

        $task->update($request->only(['title', 'project_id', 'start_date', 'end_date', 'status', 'description']));

        // Remove old assignments & add new ones
        TaskDetail::where('task_id', $task->id)->delete();
        foreach ($request->users as $user_id) {
            TaskDetail::create([
                'task_id' => $task->id,
                'user_id' => $user_id
            ]);
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        TaskDetail::where('task_id', $task->id)->delete();
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
