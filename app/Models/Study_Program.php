<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_Program extends Model
{
    protected $table  = 'study_program';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'code_prodi', 'name', 'study_faculty_id'];
    public function study_faculty()
    {
        return $this->belongsTo('App\Models\Study_Faculty');
    }
    public function student()
    {
        return $this->hasOne('App\Models\Student');
    }
    public function lectureScheduling()
    {
        return $this->hasOne('App\Models\LectureScheduling');
    }
}
