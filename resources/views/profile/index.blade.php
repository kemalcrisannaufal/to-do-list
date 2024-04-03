@extends('layout.main')


@section('css', '/css/profile/index.css')

@section('content')
<div class="container mt-5">
    <div  class="border rounded p-3">
        <div class="d-flex flex-column gap-3 justify-content-center align-items-center">
            @if ($user_data->photo)
                <img src="{{ asset('storage/users/profile/' . $user_data->photo) }}" alt="profile-image" class="profile-image border border-light">
            @else
                <h1>Picture Not Found</h1>
            @endif
            <h5 class="mb-0 fs-2">{{ $user_data->name }}</h5>
        </div>
        <hr style="border: 1px solid white">
        <div class="d-flex flex-column">
            <h4 class="mb-3 fs-2">Personal Information</h4>
            <h5 class="mb-0">{{ $user_data->name }}</h5>
            <p class="mb-3">{{ $user_data->email }}</p>
            <p class="mb-0">{{ $user_data->phone }}</p>
            <p class="mb-3">{{ $user_data->address }}</p>
            <a href="/profile/edit/{{ $user_data->id }}" class="btn mt-4 border border-light" style="background: #194050; color:white;">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
