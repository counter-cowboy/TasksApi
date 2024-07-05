<?php

namespace App\Http\Controllers;

use App\Services\TaskService;

class TaskBaseController extends Controller
{
    protected $service;
    public function __construct(TaskService $service)
    {
        $this->$service=$service;
    }

}
