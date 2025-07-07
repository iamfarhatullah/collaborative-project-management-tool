@extends('layouts.app')

@section('content')
@php
$isUser = auth()->user()->isUser();
@endphp

<div class="form-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3 class="box-title">Edit Task</h3>
        </div>
    </div>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" name="title" class="form-field" value="{{ $task->title }}"
                    placeholder="Enter task title" {{ $isUser ? 'readonly' : '' }} required>

                <label for="project_id" class="form-label">Project</label>
                <select name="project_id" class="form-field" {{ $isUser ? 'disabled' : '' }} required>
                    <option value="">Select a Project</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                    @endforeach
                </select>
                @if($isUser)
                <input type="hidden" name="project_id" value="{{ $task->project_id }}">
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-field" value="{{ $task->start_date }}"
                    {{ $isUser ? 'readonly' : '' }} required>
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-field" value="{{ $task->end_date }}"
                    {{ $isUser ? 'readonly' : '' }} required>
            </div>
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-field" required>
                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Process" {{ $task->status == 'In Process' ? 'selected' : '' }}>In Process</option>
                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" rows="5" class="textarea-field">{{ $task->description }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="form-label">Assign Users</label>
                @foreach($users as $user)
                <div class="form-check">
                    <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input"
                        {{ in_array($user->id, $assignedUsers) ? 'checked' : '' }}
                        {{ $isUser ? 'disabled' : '' }}>
                    <label class="form-check-label">{{ $user->name }}</label>
                </div>
                @endforeach
                @if($isUser)
                @foreach($assignedUsers as $userId)
                <input type="hidden" name="users[]" value="{{ $userId }}">
                @endforeach
                @endif
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="success-btn">Update Task</button><br><br>
            </div>
        </div>
    </form>
</div>
@endsection