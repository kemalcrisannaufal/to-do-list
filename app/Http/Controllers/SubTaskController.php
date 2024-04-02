<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Subtask;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function create($id)
    {
        $task = Task::find($id);
        return view('subtask.addSubTask', [
            'task' => $task
        ]);
    }

    public function store(Request $request, $id)
    {
        $subTask = new Subtask();
        $subTask->fill($request->all());
        $subTask->task_id = $id;
        $subTask->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $subTask = Subtask::findOrFail($id);
        $subTask->delete();
        return redirect('/');
    }
}
