<?php

namespace autoecole;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autoecoletable extends Model
{
    //
    //use Illuminate\Database\Eloquent\SoftDeletes;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected  $guarded = ['id'];
    protected $table = 'autoecoletable';

    public $timestamps = false;

    public function client(){

       return $this->hasMany('autoecole\Client','id');
    }

    public function cars(){
        return $this->hasMany('autoecole\Vehicules','id');
    }

    public function cours(){
        return $this->hasMany('autoecole\Cours','id');
    }

    public  function examens(){
        return $this->hasMany('autoecole\Examens','id');
    }

    public function users(){
        return $this->hasMany('autoecole\User');
    }
}
