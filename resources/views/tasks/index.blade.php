@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-4">
            <h3 class="box-title">Tasks List</h3>
        </div>
        <div class="col-md-6 col-sm-6 col-4"><br>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3 pull-right">Create new</a>
        </div>
    </div>
    <div class="table-responsive">
        @if($tasks->isEmpty())
            <br><p>No Task available</p>
        @else
        <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Project</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Assigned Users</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td><strong>{{ $task->title }}</strong></td>
                        <td>{{ $task->project->name }}</td>
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
        @endif
    </div>
</div>
@endsection
