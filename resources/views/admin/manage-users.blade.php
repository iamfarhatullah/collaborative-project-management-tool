@extends('layouts.app')

@section('content')
    <h1>Manage Users</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="{{ route('admin.updateRole', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="role">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="inactive" {{ $user->role == 'inactive' ? 'selected' : '' }}>In-Active</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
