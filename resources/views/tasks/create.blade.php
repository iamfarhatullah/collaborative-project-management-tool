@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3 class="box-title">Create Task</h3>
        </div>
    </div>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" name="title" class="form-field" placeholder="Enter task title" required>
                <label for="project_id" class="form-label">Project</label>
                <select name="project_id" class="form-field" required>
                    <option value="">Select a Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-field" required>
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-field" required>
            </div>
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-field" required>
                    <option value="Pending">Pending</option>
                    <option value="In Process">In Process</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" rows="5" class="textarea-field"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="form-label">Assign Users</label>
                @foreach($users as $user)
                    <div class="form-check">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input">
                        <label class="form-check-label">{{ $user->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="success-btn">Create Task</button><br><br>
            </div>
        </div>
    </form>
</div>
@endsection
