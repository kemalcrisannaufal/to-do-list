<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        $task = Task::with(['subtasks', 'user'])->get();
        return view('dashboard', ['tasks' => $task]);
    }

    public function create()
    {
        return view('addTask');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:100',
            'due_date' => 'required',
        ]);

        $task = new Task();
        $task = $task->fill($request->all());
        $task->user_id = auth()->user()->id;
        $task = $task->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'status' => 'complete',
        ]);
        return redirect('/');
    }
}
