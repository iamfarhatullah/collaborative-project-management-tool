@extends('layouts.app')

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}">Create Project</a>
    
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a> - {{ $project->status }}
                <a href="{{ route('projects.edit', $project) }}">Edit</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
