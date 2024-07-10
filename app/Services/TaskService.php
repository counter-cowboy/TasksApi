<?php

namespace App\Services;

use App\Http\Filters\TaskFilter;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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

    public function search($data)
    {
        $query=Task::query();

        if (isset($data['status'])) {
            $query->where('status', 'like', "%{$data['status']}%");
        }
        if (isset($data['deadline'])) {
            $query->where('deadline', 'like', "%{$data['deadline']}%");
        }

        return $query->paginate(5);
    }

}
