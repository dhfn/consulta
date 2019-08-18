<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{

	public $timestamps = false;
    protected $fillable = ['nome','fusex','telefone','observacoes'];
    protected $guarded = ['id','data','created_at','update_at','tipo','preferencia'];
    protected $table = 'consulta'; 


}

        