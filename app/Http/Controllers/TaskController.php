<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth()->id());

        if ($request->has('status')) {
            $tasks->where('status', $request->status);
        }

        if ($request->has('sort_by')) {
            $tasks->orderBy('due_date', $request->sort_by);
        }

        return $tasks->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        return Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status ?? 'Pending',
            'user_id' => auth()->id(),
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if($task==null){
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task);

    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if($task==null){
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->only(['title', 'description', 'due_date', 'status']));
        return response()->json(['message' => 'Task updated successfully']);
    }


    public function destroy($id)
    {
        $task = Task::find($id);
        if($task==null){
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
