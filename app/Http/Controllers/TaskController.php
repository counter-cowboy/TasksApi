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
        // If you want to use search for all items but without pagination
        // with some smart filter method

//        $tasks = $this->service->index($request->validated());
//        return TaskResource::collection($tasks);

        // With pagination
        return $this->service->search($request->validated() );
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
