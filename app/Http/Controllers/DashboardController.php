<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $pendingTasks = Task::where('status', 'Pending')->count();
        $inProcessTasks = Task::where('status', 'In Process')->count();
        $completedTasks = Task::where('status', 'Completed')->count();
        $totalUsers = User::count();
        return view('dashboard', compact('totalUsers', 'pendingTasks', 'totalProjects', 'inProcessTasks', 'completedTasks'));
    }
}
