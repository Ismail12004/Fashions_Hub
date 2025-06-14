@extends('layouts.app')

@section('content')
    <h2>Users</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role ?? 'N/A' }}</td> <!-- اضفت عمود role في الترويسة فلازم تعرضه -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection