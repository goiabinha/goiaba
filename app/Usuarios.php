<?php

namespace goiaba;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'user';
    public $timestamps = false;

    protected $fillable = [
        'matricula',
        'nome',
        'lotacao',
    ];
}
