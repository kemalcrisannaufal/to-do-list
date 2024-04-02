@extends('layout.main')

@section('css', '/css/task/add-task.css')

@section('content')

    <div class="container mt-5">
        <div class="w-100 rounded border border-light p-3 d-flex justify-content-between" style="background: #194050">
            <div>
                <h5 class="text-white">{{ $task->title }}</h5>
                <p>{{ $task->description }}</p>
            </div>
            <p>{{ $task->due_date }}</p>
        </div>
        <h1 class="mt-5">Tambahkan SubTask</h1>
        <form action="" method="POST" class="add-task">
            @csrf
            <div class="mb-3">
                <label for="title" class="label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Tambahkan Judul Task">
            </div>
            <div class="mb-3">
                <label for="description" class="label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Tambahkan Deskripsi Task"></textarea>
            </div>
            <div class="mb-3">
                <label for="due_date" class="label">Deadline</label>
                <input type="date" class="form-control" id="due_date" name="due_date">
            </div>
            <button type="submit" class="btn-add">
                <h5><i class="fa fa-plus me-3"></i>Add SubTask</h5>
            </button>

        </form>

    </div>

@endsection
