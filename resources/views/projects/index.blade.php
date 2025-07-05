@extends('layouts.app')

@section('content')
<style>
    .project-card {
        width: 100%;
        background-color: #fff;
        border: 1px solid #e0e0e0;
        margin-bottom: 24px;
        border-radius: 8px;
        padding: 15px;
    }
</style>

<div class="form-wrapper">
    <!-- <h3 style="color: #000;">All Projects</h3><br> -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-4">
            <h3 class="box-title">Projects</h3>
        </div>
        <div class="col-md-6 col-sm-6 col-4"><br>
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3 pull-right">Create new</a>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($projects as $project)
        @php
        // Define badge style based on project status
        $badge = '';
        switch($project->status) {
        case 'Pending':
        $badge = 'background-color: orange; color: white;';
        break;
        case 'In Process':
        $badge = 'background-color: dodgerblue; color: white;';
        break;
        case 'Completed':
        $badge = 'background-color: green; color: white;';
        break;
        default:
        $badge = 'background-color: gray; color: white;';
        break;
        }
        @endphp

        <div class="col-md-4">
            <div class="project-card p-3 mb-4 border rounded shadow-sm">
                <strong>
                    <h4 style="height: 56px; color:#000; font-weight:400">{{ $project->name }}</h4>
                </strong>

                <!-- <p><strong>#{{ $loop->index + 1 }}</strong></p> -->
                <p><strong>Start:</strong> {{ $project->start_date }}</p>
                <p><strong>End:</strong> {{ $project->end_date }}</p>

                <br>
                <span class="badge" style="{{ $badge }}">{{ $project->status }}</span>
                <br><br>

                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection