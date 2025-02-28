@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-4">
            <h2 class="box-title">Manage Users</h2>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><strong>{{ $user->name }}</strong></td>
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
                        <button type="submit" class="btn btn-xs btn-primary">Update</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
