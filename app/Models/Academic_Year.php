<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic_Year extends Model
{
    protected $table  = 'academic_year';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'academic_year', 'semester', 'start_time_value', 'end_of_time_value', 'start_time_bidding', 'end_of_time_bidding', 'active'];

    public function lecture_scheduling()
    {
        return $this->hasOne('App\Models\LectureScheduling');
    }
    public function sksmhs()
    {
        return $this->hasMany('App\Models\Sksmhs');
    }
}
