<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidding_Time extends Model
{
    protected $table  = 'bidding_time';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'start bidding', 'end of bidding'];

    public function Academic_Year()
    {
        return $this->hasOne('App\Models\Academic_Year');
    }
}
