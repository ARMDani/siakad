<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureSchedulueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'study_program_id' => 'integer',
            'academic_year_id' => 'integer',
            'subject_course_id' => 'required|integer',
            'class_id' => 'required|integer',
            'lecturer_id' => 'required|integer',
            'academic_day_id' => 'required|integer',
            'start_time' => 'required|time',
            'hour_over' => 'required|time',
            'academic_room_id' => 'required|integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
        ];
    }
}
