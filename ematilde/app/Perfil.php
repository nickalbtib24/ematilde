<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;



class Perfil extends Model
{
    protected $table = 'perfiles';

    protected $fillable = [
        'id'
    ];

    public function users()
    {
        return $this->hasMany(User::class,'id_perfil','id');
    }
}
