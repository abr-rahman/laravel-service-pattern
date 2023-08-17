<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Task\DataTables\TaskDataTable;
use Modules\Task\Entities\Task;
use Modules\Task\Http\Requests\StoreTaskRequest;
use Modules\Task\Http\Requests\UpdateTaskRequest;
use Modules\Task\Interfaces\TaskServiceInterface;

class TaskController extends Controller
{
    /**
     * Task 3: Encapsulation
     * Here encapsulation is done by protected
     */
    protected $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Task 1: Class Inheritance
     * TaskDataTable is a class
     * Then Request is a class
     */
    public function index(Request $request, TaskDataTable $dtaTable)
    {
        return $dtaTable->render('task::tasks.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task::tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->store($request->validated());
        return back()->with('success', 'Task created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = $this->taskService->find($id);
        return view('task::tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->taskService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $task = $task->delete();
        $task = $this->taskService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function statusActive($id)
    {
        $task = $this->taskService->statusInactive($id);
        return response()->json(['Status change successfully!']);
    }

    public function statusInactive($id)
    {
        $task = $this->taskService->statusActive($id);
        return response()->json(['Status change successfully!']);
    }

}
