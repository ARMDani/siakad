<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_Faculty extends Model
{
    protected $table  = 'study_faculty';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'code_faculty', 'name'];
    public function study_Program()
    {
        return $this->hasOne('App\Models\Study_Program');
    }
}
