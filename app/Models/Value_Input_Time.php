<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value_Input_Time extends Model
{
    protected $table  = 'academic_year';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'academic_year', 'semester', 'value_input_time_id', 'bidding_time_id', 'active'];
}
