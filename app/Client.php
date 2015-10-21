<?php

namespace autoecole;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected  $guarded = ['id'];
    protected $table = 'client';

    public $timestamps = false;

    public function examen(){
        return $this->belongsTo('autoecole\Examens','examen_id');
    }

    public  function autoecole(){
        return $this->belongsTo('autoecole\Autoecoletable','autoecoletable_id');
    }

    public function cours(){
        return $this->belongsToMany('autoecole\Cours','Client_Cours','client_id','cour_id');
    }

}
