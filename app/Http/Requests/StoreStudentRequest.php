<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|unique:students,id',
            'password' => 'required|min:8',
            'first_name' => 'required|string|max:32',
            'last_name' => 'required|string|max:32',
            'father_name' => 'required|string|max:32',
            'mother_name' => 'required|string|max:32',
            'birth_date' => 'required|date',
            'gender' => 'required|in:' . implode(",", array_keys(config('app.select_gender'))),
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
        ];
    }
}
