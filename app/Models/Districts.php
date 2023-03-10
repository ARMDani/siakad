<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $table  = 'districts';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    public function student()
    {
        return $this->hasOne('App\Models\Student');
    }
}
