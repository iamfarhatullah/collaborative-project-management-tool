@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="row">   
        <div class="col-md-6 col-sm-6 col-4">
            <h3 class="box-title">Edit Project</h3>
        </div>
    </div>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <label>Name:</label>
                <input class="form-field" type="text" value="{{ $project->name }}" name="name" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Start Date:</label>
                <input class="form-field" type="date" value="{{ $project->start_date }}" name="start_date" required>
            </div>
            <div class="col-md-4">
                <label>End Date:</label>
                <input class="form-field" type="date" value="{{ $project->end_date }}" name="end_date">
            </div>
            <div class="col-md-4">
                <label>Status:</label>
                <select class="form-field" name="status">
                    <option value="Pending" {{ $project->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Ongoing" {{ $project->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ $project->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Description:</label>
                <textarea class="textarea-field" rows="5" name="description">{{ $project->description }}</textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
            <button type="submit" class="success-btn">Update</button><br><br>
            </div>
        </div>
    </form>
@endsection
