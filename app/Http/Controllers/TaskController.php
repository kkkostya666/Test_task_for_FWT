<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $tasks = auth()->user()?->tasks ?? collect();
        return view('task.index', compact('tasks'));
    }


    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data['user_id'] = auth()->id();
        Task::create($data);
        return redirect()->route('tasks.index');
    }


    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}

