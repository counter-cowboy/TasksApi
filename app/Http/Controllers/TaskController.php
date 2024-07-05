<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends TaskBaseController
{
    public function Index()
    {
        return TaskResource::collection(Task::all());
    }

    public function Store(TaskRequest $request)
    {
        $task = $this->service->store($request->validated());
        return new TaskResource($task);
    }

    public function Show(Task $task)
    {
        return new TaskResource($task);
    }

    public function Update(TaskRequest $request, Task $task)
    {
        $taskRes = $this->service->update($request->validated(), $task);

        return new TaskResource($taskRes);
    }

    public function Destroy(Task $task)
    {
        $task->delete();

        return response()->json();
    }
}
