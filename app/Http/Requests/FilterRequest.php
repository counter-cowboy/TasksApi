<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string'],
            'description' => ['string'],
            'status' => ['string'],
            'deadline' => ['string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
