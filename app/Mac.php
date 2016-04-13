<?php

namespace goiaba;

use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $table = 'mac';
    protected $fillable = array('mac','id_user','id_dev','ticket','nome_eq','ativo');
    
    /** Converte o campo mac em letra maiuscula */
    public function setMacAttribute($value)
	{       
		$this->attributes['mac'] = strtoupper($value);
	}
	
     /** Converte o campo ativo para 0 ou 1 */
     public function setAtivoAttribute($value)
     	{
     		if ($value == 'on')
		{
			$this->attributes['ativo'] = 1;
		}
		else
		{
			$this->attributes['ativo'] = 0;
		}
     	}		
}
