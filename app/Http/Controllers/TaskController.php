<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }


    public function index(Request $request)
    {
        return view('task.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
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
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

