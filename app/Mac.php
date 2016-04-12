<?php

namespace goiaba;

use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $table = 'mac';
    protected $fillable = array('mac','id_user','id_dev','ticket','nome_eq','ativo');
    
    /** Salva o campo mac com letra maiuscula */
    public function setMacAttribute($value)
	{       
		$this->attributes['mac'] = strtoupper($value);
	}
}
