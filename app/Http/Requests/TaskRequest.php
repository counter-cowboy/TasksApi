<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required', 'string'],
            'deadline' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'title.required'=> 'Title field required',
            'description.required'=> 'Description field required',
            'status.required'=> 'Status field required',
            'deadline.required'=> 'Deadline field required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
