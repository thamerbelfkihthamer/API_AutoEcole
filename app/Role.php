<?php
/**
 * Created by PhpStorm.
 * User: ThamerBelfki
 * Date: 07/12/2015
 * Time: 15:46
 */

namespace autoecole;
use Zizaco\Entrust\EntrustRole;

class  Role extends EntrustRole
{
    protected  $guarded = ['id'];
    //protected $table = 'moniteur';

   // public $timestamps = false;
}