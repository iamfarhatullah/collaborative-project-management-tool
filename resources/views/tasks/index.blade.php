@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tasks List</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>
    <table class="table table-bordered">
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
                    <td>{{ $task->title }}</td>
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
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
