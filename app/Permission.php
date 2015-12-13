<?php
/**
 * Created by PhpStorm.
 * User: ThamerBelfki
 * Date: 07/12/2015
 * Time: 16:05
 */

namespace autoecole;
use Zizaco\Entrust\EntrustPermission;


class Permission extends EntrustPermission
{
    protected  $guarded = ['id'];

}