<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic_Day extends Model
{
    use HasFactory;
    protected $table  = 'academic_day';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'aname'];

    public function lecture_scheduling()
    {
        return $this->hasOne('App\Models\LectureScheduling');
    }
}
