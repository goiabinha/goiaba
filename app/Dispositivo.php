<?php

namespace goiaba;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = 'dispositivo';
    protected $fillable = ['descricao'];
    public $timestamps = false;
}
