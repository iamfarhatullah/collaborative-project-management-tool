@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Start Date:</label>
        <input type="date" name="start_date" required>

        <label>End Date:</label>
        <input type="date" name="end_date">

        <label>Status:</label>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Ongoing">Ongoing</option>
            <option value="Completed">Completed</option>
        </select>

        <label>Description:</label>
        <textarea name="description"></textarea>

        <button type="submit">Save</button>
    </form>
@endsection
