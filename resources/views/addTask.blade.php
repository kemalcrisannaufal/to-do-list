@extends('layout.main')

@section('css', '/css/task/add-task.css')

@section('content')

    <div class="container mt-5">
        <h1>Tambahkan Task</h1>
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
                <h5><i class="fa fa-plus me-3"></i>Add Task</h5>
            </button>

        </form>

    </div>

@endsection
