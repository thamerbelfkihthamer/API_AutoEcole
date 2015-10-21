<?php

namespace autoecole;

use Illuminate\Database\Eloquent\Model;

class ExamensType extends Model
{

    protected  $guarded = ['id'];
    protected $table = 'examenstype';
    public $timestamps = false;


    public function  examens(){

        return $this->hasMany('autoecole\Examens');
    }
}
