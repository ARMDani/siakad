<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table  = 'student';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'nim', 'gender', 'religion', 'study_program_id', 'districts_id', 'class_id', 'generations_id', 'photo',];

    public function study_program()
    {
        return $this->belongsTo('App\Models\Study_Program');
    }
    public function districts()
    {
        return $this->belongsTo('App\Models\Districts');
    }
    public function class()
    {
        return $this->belongsTo('App\Models\ClassModel');
    }
    public function generations()
    {
        return $this->belongsTo('App\Models\Generations');
    }
    public function sksmhs()
    {
        return $this->hasMany('App\Models\Sksmhs');
    }
    public function study_value()
    {
        return $this->hasMany('App\Models\Study_Value');
    }
    
}
