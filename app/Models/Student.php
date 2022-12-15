<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table  = 'student';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'nim', 'gender', 'religion', 'study_program_id', 'districts_id', 'class_id', 'generations_id', 'photo', ''];

    public function study_program(){
    	return $this->hasMany('App\Study_Program');
    }
}
