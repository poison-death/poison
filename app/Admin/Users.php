<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function Userinfo()
	    {
	        return $this->hasOne('App\Admin\Usersall','uid');
	    }
}
