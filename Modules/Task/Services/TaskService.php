<?php

namespace Modules\Task\Services;

use function is_integer;

use Modules\Task\Entities\Task;
use Modules\Task\Interfaces\TaskServiceInterface;
/**
 * Task 2: Interface Implementation
 * TaskServiceInterface is a interface
 */
Class TaskService implements TaskServiceInterface
{
    public function all()
    {
        $task = Task::orderBy('id', 'desc')->get();
        return $task;
    }

    public function store(array $attributes)
    {
        $task =  Task::create($attributes);
        return $task;
    }

    public function find(int $id)
    {
        $task = Task::find($id);
        return $task;
    }

    public function update(array $attributes, int $id)
    {
        $task = Task::find($id);
        $updatedTask = $task->update($attributes);
        return $updatedTask;
    }

    // Move To Delete
    public function delete(int $id)
    {
        $item = Task::find($id);
        $item->delete($item);
        return $item;
    }
    // Task Status Active
    public function statusActive(int $id)
    {
        $task = Task::find($id);
        if ($task->status == 2) {
            $task->status = 1;
        }
        $task->save();
        return $task;
    }
    // Task Status In-Active
    public function statusInactive(int $id)
    {
        $task = Task::find($id);
        if ($task->status == 1) {
            $task->status = 2;
        }
        $task->save();
        return $task;
    }

}
