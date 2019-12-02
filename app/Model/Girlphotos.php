<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Girlphotos extends Model
{
    protected $table = 'girlphotos';
    protected $primaryKey = 'id';
    public $timestamps = '';

    protected $fillable = ['g_id','photo'];
}
