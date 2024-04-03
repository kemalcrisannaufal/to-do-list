@extends('layout.main')

@section('content')

<div class="container mt-5">
    <div  class="border rounded p-3">
        <div class="d-flex flex-column">
            <h4 class="mb-3 fs-2">Personal Information</h4>
            <form action="/profile/edit/{{ $user_data->id }}" method="POST" enctype="multipart/form-data" class="w-100">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="photo" class="label">Profile Picture</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="mb-3">
                    <label for="name" class="label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $user_data->name }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ $user_data->phone }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user_data->email }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $user_data->address }}">
                </div>
                <button type="submit" class="btn w-100 mt-2 border-light" style="background: #194050">
                    <h5 class="text-white">Edit</h5>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
