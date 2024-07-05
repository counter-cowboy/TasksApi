<?php

namespace App\Services;

use App\Http\Filters\TaskFilter;
use App\Models\Task;

class TaskService
{
    public function index($data)
    {
        $filter = app()->make(TaskFilter::class, ['queryParams' => array_filter($data)]);

        return Task::filter($filter)->get();
    }

    public function store($data)
    {
        return Task::create($data);
    }

    public function update($data ,Task $task)
    {
       return $task->update($data);
    }

}
