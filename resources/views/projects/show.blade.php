@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3 class="box-title"><strong>{{ $project->name }}</strong></h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
            <p><strong>End Date:</strong> {{ $project->end_date }}</p>
            <p><strong>Status:</strong> {{ $project->status }}</p>
            <p><strong>Description:</strong> {{ $project->description }}</p>
        </div>
    </div>
    <h5 class="box-title"><strong>Tasks</strong></h5>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Assigned Users</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($project->tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        @foreach($task->users as $user)
                            <span class="badge bg-info">{{ $user->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-xs btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
