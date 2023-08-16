<?php

namespace App\Http\Controllers;

use App\DataTables\TaskDataTable;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Interfaces\TaskServiceInterface;
use App\Utils\FileUploader;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, TaskDataTable $dtaTable)
    {
        return $dtaTable->render('tasks.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->store($request->validated());

        // return response()->json('Task created successfully');
        return back()->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = $this->taskService->find($id);
        // $task = Task::find($id);
        $task->image = (str_starts_with($task->image, 'http')) ? $task->image : asset('uploads/task/' . $task->image);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $update = Task::find($id);
        $update->name = $request->name;
        $update->phone = $request->phone;
        $update->description = $request->description;

        $update->save();

        return back()->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json('Deleted successfully!');
    }

    public function changeStatus($id)
    {

    }


}
