@extends('layout.auth')

@section('content')
<div class="container mt-5 d-flex vh-100 justify-content-center align-items-center">
    <div class="col-md-4">
        <div class="border  border-light p-3 mt-3 rounded">
            <h1>Login</h1>
            <form action="/login" method="POST" class="w-100">
                @csrf
                <div class="mb-3">
                    <label for="email" class="label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn w-100 mt-2 border-light" style="background: #194050">
                    <h5 class="text-white">Login</h5>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
