@extends('layouts.app')

@section('content')
<!-- <div class="row">
    <div class="content-box"> -->
        <div class="form-wrapper">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-4">
                    <h3 class="box-title">Projects</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-4"><br>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3 pull-right">Create new</a>
                </div>
            </div>
            <div class="table-responsive">
                @if($projects->isEmpty())
                    <br><p>No project available</p>
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        @php
                        $badge = "";
                            if($project->status == "Pending"){
                                $badge = "background-color: #6c757d;";
                            }elseif($project->status == "Ongoing"){
                                $badge = "background-color: #337ab7;";
                            }elseif($project->status == "Completed"){
                                $badge = "background-color: #28a745;";
                            }
                        @endphp
                        <tr>
                            <td>{{$loop->index+1}}</td>
                        <td><strong>{{ $project->name }}</strong></td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td><span class="badge" style="{{$badge}}">{{ $project->status }}</span></td>
                        <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-xs btn-primary">View</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-xs btn-warning">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                            </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
