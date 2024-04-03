@extends('layout.main')

@section('css', '/css/home.css')

@section('content')
    <div class="container mt-5">
        <div class="px-4 pt-3 text-center border rounded">
            <img class="d-block mx-auto mb- border border-light"
                src="{{ asset('storage/users/profile/' . auth()->user()->photo) }}" alt="main-image" width="100"
                style="backdrop-filter: blur(100px);">
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
        @if (count($tasks) == 0)
            <div class="d-flex align-items-center justify-content-center border w-100 p-3 rounded"
                style="background: radial-gradient(#0f2027, #203a43, #2c5364)">
                <h5>There are no tasks that need to be completed.</h5>
            </div>
        @else
            <h3>List Task</h3>
            <div class="main-task">
                @foreach ($tasks->reverse() as $task)
                    <div class="task">
                        <div class="d-flex flex-column justify-content-start">
                            <h5>{{ $task->title }}</h5>
                            <p>{{ $task->description }}</p>
                        </div>
                        <div class="d-flex align-items-center gap-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <p>{{ $task->due_date }}</p>
                                <p class="fs-5">{{ $task->status }}</p>
                            </div>
                            <div class="d-flex gap-3">
                                <form action="/task/{{ $task->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn-action-subtask"><i class="fa fa-check"></i></button>
                                </form>
                                <form action="/task/{{ $task->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-action-subtask"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="/add-subtask/{{ $task->id }}" class="btn-action"><i class="fa fa-plus"></i>Add
                                    Subtask</a>
                            </div>
                            <div>
                                <i class="fa fa-chevron-down" data-task-id="{{ $task->id }}"
                                    style="font-size: 20px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="subtask bg-secondary" data-subtask-id="{{ $task->id }}">
                        @if ($task->subtasks->count() == 0)
                            <h5 class="mb-3 text-dark">There are no subtasks.</h5>
                        @else
                            <h5 class="mb-3 text-dark">Subtask</h5>
                            @foreach ($task->subtasks as $subtask)
                                <div class="d-flex align-items-center justify-content-between border border-light p-3 rounded mb-3"
                                    style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364)">
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
                                            <form action="/subtask/{{ $subtask->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn-action-subtask"><i class="fa fa-check"></i></button>
                                            </form>
                                            <form action="/subtask/{{ $subtask->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-action-subtask"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
