<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table  = 'class';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    public function student()
    {
        return $this->hasOne('App\Models\Student');
    }
}
