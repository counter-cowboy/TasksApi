<?php

namespace App\Services;

use App\Http\Filters\TaskFilter;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Validator;

class TaskService
{


    public function store(TaskRequest $request)
    {
        $rules = [
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'deadline' => ['required'],
        ];
        $validator=Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $responseArr =  [];
            $responseArr['status']=false;
            $responseArr['data']=[];
            $responseArr['message'] = $validator->errors();
            return response()->json($responseArr, ResponseAlias::HTTP_BAD_REQUEST);
        }
        else
        {
            $task=Task::firstOrCreate($request->validated());
            return new TaskResource($task);
        }
    }

    public function update($data ,Task $task)
    {
        $task->update($data);

       return $task;
    }

    public function index($data)
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
