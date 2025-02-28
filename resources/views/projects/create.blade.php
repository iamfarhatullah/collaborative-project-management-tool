@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="row">   
        <div class="col-md-6 col-sm-6 col-4">
            <h3 class="box-title">Create Project</h3>
        </div>
    </div>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label>Name:</label>
                <input class="form-field" type="text" name="name" placeholder="Enter project name" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Start Date:</label>
                <input class="form-field" type="date" name="start_date" required>
            </div>
            <div class="col-md-4">
                <label>End Date:</label>
                <input class="form-field" type="date" name="end_date">
            </div>
            <div class="col-md-4">
                <label>Status:</label>
                <select class="form-field" name="status">
                    <option value="Pending">Pending</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Description:</label>
                <textarea class="textarea-field" rows="5" name="description" placeholder="Write something..."></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
            <button type="submit" class="success-btn">Save</button><br><br>
            </div>
        </div>
    </form>
</div>
@endsection
