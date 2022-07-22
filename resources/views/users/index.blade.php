@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table bg-white table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-success">View</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    @if ($user->id != auth()->id())
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            id="delete-{{ $user->id }}-user" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirm('Are you sure you want to delete {{ $user->name }} ?') ? document.getElementById('delete-{{ $user->id }}-user').submit() : null">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
