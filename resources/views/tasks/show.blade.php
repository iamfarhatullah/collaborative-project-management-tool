@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-4">
            <h3 class="box-title">Tasks Details</h3>
        </div>
        <div class="col-md-6 col-sm-6 col-4"><br>
            @if(!auth()->user()->isUser())
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3 pull-right">Create new</a>
            @endif
        </div>
    </div>
    <hr>
    <div>
        <h4 class="text-primary"><strong>Title:</strong> {{ $task->title }}</h4><br>
        <p><strong>Project:</strong> {{ $task->project->name ?? 'N/A' }}</p>
        <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
        <p><strong>End Date:</strong> {{ $task->end_date }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Assigned Users:</strong></p>
        <ul>
            @foreach($task->users as $user)
            <li>{{ $user->name }}</li>
            @endforeach
        </ul>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <br>
        <a href="{{ route('tasks.index') }}" class="btn btn-default">Back</a><br><br>
    </div>
</div>
@endsection