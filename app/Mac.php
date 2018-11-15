<?php

namespace goiaba;

use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
	/** Nome da tabela  */
    protected $table = 'mac';
    /** Campos com atribuição em massa  */
    protected $fillable = ['mac','id_user','id_dev','ticket','sei','nome_eq','ativo','expira'];
    /** Convertendo atributos em tipo especifico */
    protected $casts = [
        'mac' => 'string',
        'expira' => 'datetime',
        'id_user' => 'integer',
        'id_dev' => 'integer',
        'ticket' => 'string',
        'sei' => 'string',
        'nome_eq' => 'string',
        'ativo' => 'boolean',
    ];
    
    /** Converte o campo mac em letra maiuscula */
    public function setMacAttribute($value)
	{       
		$this->attributes['mac'] = strtoupper($value);
	}

    /**
     * Relacionamento com Usuários
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function usuarios()
     {
         return $this->belongsTo(Usuarios::class, 'id_user');
     }

    /**
     * Relacionamento com Dispositivo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dispositivo()
     {
         return $this->belongsTo(Dispositivo::class, 'id_dev');
     }
}
