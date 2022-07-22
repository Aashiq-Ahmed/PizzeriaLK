@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('users.index') }}" class="btn btn-primary mt-4 mb-4">
                    Back
                </a>
            </div>
        </div>
        <div class="row">
            <div class="bg-white col p-4 rounded rounded-2 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $user->name }}
                            <small class="float-end text-info">{{ $user->email }} | {{ $user->role }}</small>
                        </h5>
                        <p class="card-text">{{ $user->landmark }}</p>

                        <h5 class="mt-4">Personal Information</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Title : {{ ucfirst($user->title) }}</li>
                            <li class="list-group-item">Gender : {{ ucfirst($user->gender) }}</li>
                            <li class="list-group-item">Birthday : {{ $user->birthday }}</li>
                            <li class="list-group-item">E-Mail : {{ $user->email }}</li>
                        </ul>

                        <h5 class="mt-4">Address</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Addres : {{ $user->address }}</li>
                            <li class="list-group-item">City : {{ $user->city }}</li>
                            <li class="list-group-item">Phone : {{ $user->phone }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
