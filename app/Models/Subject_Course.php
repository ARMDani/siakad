<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_Course extends Model
{
    protected $table  = 'subject_course';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'course_code', 'name', 'sk', 'semester', 'lecturer_id'];

    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }
    public function lectureScheduling()
    {
        return $this->hasOne('App\Models\LectureScheduling');
    }
}
