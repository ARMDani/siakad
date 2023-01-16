<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table  = 'lecturer';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'nidn', 'study_program_id','gender', 'religion', 'address', 'photo'];


    public function subjectCourse()
    {
        return $this->hasOne('App\Models\Subject_Course');
    }
    public function lectureScheduling()
    {
        return $this->hasMany('App\Models\LectureScheduling');
    }
    public function study_program()
    {
        return $this->belongsTo('App\Models\Study_Program');
    }
}
