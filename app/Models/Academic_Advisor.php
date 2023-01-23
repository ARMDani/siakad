<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic_Advisor extends Model
{
    protected $table  = 'academic_advisor';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'lecturer_id', 'student_id'];

    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
