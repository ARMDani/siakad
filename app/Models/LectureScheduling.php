<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureScheduling extends Model
{
    use HasFactory;
    protected $table  = 'lecture_schedulings';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'subject_course_id', 'lecture_hours', 'lecturer_id'];

    public function subject_course()
    {
        return $this->belongsTo('App\Models\Subject_Course');
    }
    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }
    
}
