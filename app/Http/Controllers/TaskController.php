<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends TaskBaseController
{
    public function index(FilterRequest $request)
    {

        return $this->service->index($request->validated());
    }

    public function store(TaskRequest $request)
    {
        $task = $this->service->store($request);

        return $task;
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $taskRes = $this->service->update($request->validated(), $task);

        return new TaskResource($taskRes);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json();
    }
}
