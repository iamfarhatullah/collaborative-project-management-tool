@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $project->name }}" required>
        <input type="date" name="start_date" value="{{ $project->start_date }}" required>
        <input type="date" name="end_date" value="{{ $project->end_date }}">
        <select name="status">
            <option value="Pending" {{ $project->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Ongoing" {{ $project->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
            <option value="Completed" {{ $project->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
        <textarea name="description">{{ $project->description }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
