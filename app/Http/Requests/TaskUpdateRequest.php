<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'deadline' => ['nullable', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field required',
            'description.required' => 'Description field required',
            'status.required' => 'Status field required',
            'deadline.required' => 'Deadline field required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
