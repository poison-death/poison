<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    //文章 类别
    public function cates()
    {
    	return $this->belongsTo('App\Admin\Cate','cid');
    }
    //文章 用户
    public function users()
    {
    	return $this->belongsTo('App\Admin\Users','uid');
    }
}
