<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_Value extends Model
{
    use HasFactory;
    protected $table  = 'study_value';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'student_id',
        'lecture_schedulings_id',
        'grade_id',
    ];
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function lecture_schedulings()
    {
        return $this->belongsTo('App\Models\LectureScheduling');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }
    public function academic_year()
    {
        return $this->belongsTo('App\Models\Academic_Year');
    }
}
