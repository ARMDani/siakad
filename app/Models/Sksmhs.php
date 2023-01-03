<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sksmhs extends Model
{
    protected $table  = 'sksmhs';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'student_id', 'academic_year_id', 'sks'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function academic_year()
    {
        return $this->belongsTo('App\Models\Academic_Year');
    }
}
