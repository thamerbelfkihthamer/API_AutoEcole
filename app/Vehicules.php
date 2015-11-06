<?php

namespace autoecole;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vehicules extends Model
{
    //use Illuminate\Database\Eloquent\SoftDeletes;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected  $guarded = ['id'];
    protected $table = 'vehicules';

    public $timestamps = false;

    public function  autoecole(){
        return $this->belongsTo('autoecole\Autoecoletable','autoecoletable_id');
    }

    public function cours(){
        return $this->hasMany('autoecole\cours');
    }
}
