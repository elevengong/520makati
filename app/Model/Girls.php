<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Girls extends Model
{
    protected $table = 'girls';
    protected $primaryKey = 'id';
    //public $timestamps = '';

    protected $fillable = ['name','nation_id','cover','intro','service','videolist','views','status'];
}
