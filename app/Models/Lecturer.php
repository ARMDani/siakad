<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table  = 'lecturer';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'nidn', 'gender', 'religion', 'address', 'photo'];


    public function subjectCourse()
    {
        return $this->hasOne('App\Models\Subject_Course');
    }
    public function lectureScheduling()
    {
        return $this->hasOne('App\Models\LectureScheduling');
    }
}
