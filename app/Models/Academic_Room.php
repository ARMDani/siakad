<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic_Room extends Model
{
    protected $table  = 'academic_room';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'code_room'];

    public function lecture_scheduling()
    {
        return $this->hasOne('App\Models\LectureScheduling');
    }
}
