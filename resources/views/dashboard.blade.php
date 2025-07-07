@extends('layouts.app')

@section('content')

<style>
    .widgets {
        background-color: #fff;
        box-shadow: 3px 3px 3px #f3f3f3;
        padding: 10px 0px 10px 10px;
        border: 1px solid #ededed;
    }
</style>
<h1>Dashboard</h1>


@if(auth()->user()->isAdmin())
<div class="conatiner">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-project-diagram fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $totalProjects }}</span> Projects
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-user fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $totalUsers }}</span> Users
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-tasks fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $pendingTasks }}</span> Pending Tasks
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-tasks fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $inProcessTasks }}</span> Inprocess Tasks
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-tasks fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $completedTasks }}</span> Completed Tasks
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<p>Welcome, Admin! <br> You can manage users, projects, and tasks.</p><br>
<a href="{{ route('admin.users') }}" class="btn btn-default">Manage Users</a>
<a href="{{ route('projects.index') }}" class="btn btn-primary">Manage Projects</a>
@endif

@if(auth()->user()->isManager())
<div class="conatiner">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-project-diagram fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $totalProjects }}</span> Projects
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-tasks fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $pendingTasks }}</span> Pending Tasks
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-tasks fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $inProcessTasks }}</span> Inprocess Tasks
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="widgets">
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <center>
                            <span style="padding-top: 20px;" class="widgets-span-danger fas fa-tasks fa-3x "></span>
                        </center>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h3 style="color: #73879c; padding-bottom: 8px;">
                            <span style="font-weight: 700; font-size: 32px;">{{ $completedTasks }}</span> Completed Tasks
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<p>Welcome, Manager! <br> You can only assign tasks and manage projects.</p>
<a href="{{ route('projects.index') }}" class="btn btn-info">View Projects</a>
<a href="{{ route('tasks.index') }}" class="btn btn-primary">Assign Tasks</a>
@endif

@if(auth()->user()->isUser())
<p>Welcome, User! <br> You can complete assigned tasks.</p>
<a href="{{ route('tasks.index') }}" class="btn btn-info">View My Tasks</a>
@endif
<br>
<hr>
<h3 class="text-warning">Notifications</h3>
@foreach (auth()->user()->notifications->where('is_read', false) as $notification)
<div class="alert alert-warning">
    {{ $notification->message }}
    <a href="{{ route('tasks.show', $notification->task_id) }}" class="btn btn-sm btn-warning">View</a><br>
    <p style="font-size: 10px;">{{ $notification->created_at }}</p>
</div>
@endforeach
@endsection