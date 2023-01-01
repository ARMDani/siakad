<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureScheduling extends Model
{
    use HasFactory;
    protected $table  = 'lecture_schedulings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'academic_year_id', 
        'class_id', 
        'subject_course_id', 
        'lecturer_id', 
        'academic_day_id', 
        'start_time',
        'hour_over',
        'academic_room_id'
    ];
    public function academic_year()
    {
        return $this->belongsTo('App\Models\Academic_Year');
    }
    public function class()
    {
        return $this->belongsTo('App\Models\ClassModel');
    }

    public function subject_course()
    {
        return $this->belongsTo('App\Models\Subject_Course');
    }
    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }
    public function academic_day()
    {
        return $this->belongsTo('App\Models\Academic_Day');
    }
    public function academic_room()
    {
        return $this->belongsTo('App\Models\Academic_Room');
    }
   
    
}
