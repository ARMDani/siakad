<?php


namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use HasApiTokens, HasFactory, Notifiable;
    // protected $table = 'tb_user';
    // protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'roles_id',
        'remember_token'
    ];
    public function student()
    {
        return $this->hasMany('App\Models\Student');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }
    protected function roles(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["Administrator", "Prodi", "Dosen", "Mahasiswa"][$value],
        );
    }
}
