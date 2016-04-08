<?php

namespace goiaba;

use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $table = 'mac';
    protected $fillable = array('mac','id_user','id_dev','ticket','nome_eq','ativo');
}
