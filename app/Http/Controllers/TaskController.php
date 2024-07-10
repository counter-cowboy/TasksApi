<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends TaskBaseController
{
    public function index(FilterRequest $request)
    {
        $tasks = $this->service->index($request->validated());
        return TaskResource::collection($tasks);
        // If you want to use pagination, uncomment the lines below and comment
        // out the lines above. But it seems that it is better to put data filtering
        // in a separate controller.

        // $tasks = Task::paginate(10);
        // return $tasks;

    }

    public function store(TaskRequest $request)
    {
        $task = $this->service->store($request->validated());
        return new TaskResource($task);
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(TaskRequest $request, Task $task)
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
