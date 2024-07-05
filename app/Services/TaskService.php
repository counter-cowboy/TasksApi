<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function Store($data)
    {
        return Task::create($data);
    }

    public function Update(Task $task, $data)
    {
       return $task->update($data);
    }
}
