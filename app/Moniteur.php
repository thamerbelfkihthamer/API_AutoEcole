<?php

namespace autoecole;

use Illuminate\Database\Eloquent\Model;

class Moniteur extends Model
{
    //

    protected  $guarded = ['id'];
    protected $table = 'moniteur';

    public $timestamps = false;

    public function cours(){
        return $this->hasMany('autoecole\cours');
    }
}
