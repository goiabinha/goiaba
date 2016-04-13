<?php

namespace goiaba;

use Illuminate\Database\Eloquent\Model;

class Discovery extends Model
{
    protected $table = 'discovery';
    protected $fillable = array('mac');

    public function setMacAttribute($value)
    {
        $this->attributes['mac'] = strtoupper($value);
    }

}
