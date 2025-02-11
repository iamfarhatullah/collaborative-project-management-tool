@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    @if(auth()->user()->isAdmin())
        <h2>Admin Section</h2>
        <p>Welcome, Admin! You can manage users, projects, and tasks.</p>
        <a href="{{ route('admin.users') }}">Manage Users</a>
        <a href="{{ route('dashboard') }}">Manage Projects</a>
    @endif

    @if(auth()->user()->isManager())
        <h2>Manager Section</h2>
        <p>Welcome, Manager! You can assign tasks and manage projects.</p>
        <a href="{{ route('dashboard') }}">View Projects</a>
        <a href="{{ route('dashboard') }}">Assign Tasks</a>
    @endif

    @if(auth()->user()->isUser())
        <h2>User Section</h2>
        <p>Welcome, User! You can complete assigned tasks.</p>
        <a href="{{ route('dashboard') }}">View My Tasks</a>
    @endif
@endsection
