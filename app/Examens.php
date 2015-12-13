<?php

namespace autoecole;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examens extends Model
{
    //

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected  $guarded = ['id'];
    protected $table = 'examens';

    public $timestamps = false;

    public function clients(){
        return $this->belongsToMany('autoecole\Client','Client_Examen','examen_id','client_id');    }

    public function examentype(){

        $this->belongsTo('autoecole\ExamensType');
    }

    public function autoecole(){
        return $this->belongsTo('autoecole\Autoecoletable','autoecoletable_id');
    }

    public function moniteur(){
        return $this->belongsTo('autoecole\moniteur','moniteur_id');
    }

    public function vehicule(){
        return $this->belongsTo('autoecole\vehicules','vehicules_id');
    }
}
