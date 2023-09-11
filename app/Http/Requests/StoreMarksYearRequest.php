<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarksYearRequest extends FormRequest
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
            'mark' => 'required|max:10',
            'type' => 'required|in:' . implode(",", array_keys(config('app.select_mark_year_type'))),
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
        ];
    }
}
