<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table  = 'grade';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'name', 
        'bobot', 
        'poin', 
        'keterangan', 
    ];
    public function study_value()
    {
        return $this->hasMany('App\Models\Study_Value');
    }
}
