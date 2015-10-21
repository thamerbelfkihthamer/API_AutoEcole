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
        return $this->hasMany('autoecole\Client','id');
    }

    public function examentype(){

        $this->belongsTo('autoecole\ExamensType');
    }

    public function autoecole(){
        return $this->belongsTo('autoecole\Autoecoletable','autoecoletable_id');
    }
}
