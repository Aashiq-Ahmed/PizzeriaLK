@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="bg-white col p-4 rounded rounded-2 col-md-8">
                <form class="row g-3" method="POST" action="{{ route('users.update', $user->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Authentication</h5>
                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <label for="role" class="form-label">User Role</label>
                                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                        <option value="">Select</option>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="customer"
                                            {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>
                                            Customer</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Personal Information</h5>
                            <div class="row">
                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <label for="title" class="form-label">Title</label>
                                    <select class="form-select @error('title') is-invalid @enderror" id="title"
                                        name="title">
                                        <option value="">Select</option>
                                        @foreach (['mr', 'mrs', 'miss', 'dr', 'prof', 'etc'] as $title)
                                            <option value="{{ $title }}"
                                                {{ old('title', $user->title) == $title ? 'selected' : '' }}>
                                                {{ ucfirst($title) }}.
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-text-field field-id="name" label="Name" help-text="Your User Name" type="text"
                                        :model="$user" />
                                </div>
                                <div class="col-md-6">
                                    <x-text-field field-id="email" label="Email" help-text="Email Address" type="email"
                                        :model="$user" />
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                            name="gender" id="gender-male" value="male"
                                            {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                            name="gender" id="gender-female" value="female"
                                            {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-female">
                                            Female
                                        </label>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                            name="gender" id="gender-others" value="others"
                                            {{ old('gender', $user->gender) == 'others' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-others">
                                            Others
                                        </label>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday"
                                        value="{{ old('birthday', $user->birthday) }}" />
                                    <div id="Help" class="form-text"></div>
                                </div>

                                <div class="col mt-3">
                                    <label for="landmark" class="form-label">Land Marks</label>
                                    <textarea class="form-control" id="landmark" name="landmark">{!! old('landmark', $user->landmark) !!}</textarea>
                                    <div id="landmarkHelp" class="form-text">Land Marks to the Delivery Address</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Address</h5>

                            <div class="row">
                                <div class="col-6">
                                    <label for="address" class="form-label">Delivery Address</label>
                                    <input type="text" value="{{ old('address', $user->address) }}"
                                        class="form-control @error('address') is-invalid @enderror" id="address"
                                        name="address" />
                                    <div id="Help" class="form-text">Delivery Address</div>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" value="{{ old('city', $user->city) }}"
                                        class="form-control @error('city') is-invalid @enderror" id="city" name="city" />
                                    <div id="cityHelp" class="form-text">User City include Postal Code</div>
                                    @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="county" id="county" value="LK">

                            <div class="row pt-3">
                                <div class="col-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" value="{{ old('phone', $user->phone) }}" class="form-control"
                                        id="phone" name="phone" />
                                    <div id="phoneHelp" class="form-text"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <x-text-field field-id="password" label="Password"
                                        help-text="Password must be a minimum of 8 characters" type="password"
                                        :model="$user" />
                                </div>
                                <div class="col-md-6">
                                    <x-text-field field-id="password_confirmation" label="Confirm Password"
                                        help-text="Please confirm the password" type="password" :model="$user" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                    id="delete-{{ $user->id }}-user">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button type="button" class="btn btn-danger"
                        onclick="confirm('Are you sure you want to delete {{ $user->name }} ?') ? document.getElementById('delete-{{ $user->id }}-user').submit() : null">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
