@extends('layout.main')

@section('css', '/css/home.css')

@section('content')
    <div class="container mt-5">
        <div class="px-4 pt-3 text-center border rounded">
            <img class="d-block mx-auto mb- border border-light" src="{{ asset('images/foto.png') }}" alt="main-image" width="100" style="backdrop-filter: blur(100px);">
            <h1 class="display-5 fw-bold text-body-emphasis">Kemal Crisannaufal</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">1301213133 - IF-45-04</p>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h1>Dashboard</h1>
        <div class="add-task">
            <a href="/add-task" class="btn-add-task">
                <h5><i class="fa fa-plus me-3"></i>Add Task</h5>
            </a>
        </div>
    </div>

    <div class="container mt-4">
        <h3>List Task</h3>
        <div class="main-task">
            @foreach ($tasks as $task)
                <div class="task">
                    <div>
                        <h5>{{ $task->title }}</h5>
                        <p>{{ $task->description }}</p>
                    </div>
                    <div class="d-flex align-items-center gap-5">
                        <div>
                            <p>{{ $task->due_date }}</p>
                            <p>{{ $task->status }}</p>
                        </div>
                        <div class="d-flex gap-3">
                            <a href="" class="btn-action"><i class="fa fa-check"></i>Selesai</a>
                            <form action="/task/{{ $task->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-action"><i class="fa fa-trash"></i>Hapus</button>
                            </form>
                            <a href="/add-subtask/{{ $task->id }}" class="btn-action"><i class="fa fa-plus"></i>Add
                                Subtask</a>
                        </div>
                        <div>
                            <i class="fa fa-chevron-down" data-task-id="{{ $task->id }}" style="font-size: 20px"></i>
                        </div>
                    </div>
                </div>
                <div class="subtask bg-secondary" data-subtask-id="{{ $task->id }}">
                    <h5 class="mb-3 text-dark">Subtask</h5>
                    @foreach ($task->subtasks as $subtask)
                        <div class="d-flex align-items-center justify-content-between border border-light p-3 rounded" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364)">
                            <div>
                                <h5>{{ $subtask->title }}</h5>
                                <p>{{ $subtask->description }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <div>
                                    <p>{{ $subtask->due_date }}</p>
                                    <p>{{ $subtask->status }}</p>
                                </div>
                                <div class="d-flex gap-3">
                                    <a href="" class="btn-action-subtask"><i class="fa fa-check"></i></a>
                                    <form action="/subtask/{{ $subtask->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action-subtask"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection
