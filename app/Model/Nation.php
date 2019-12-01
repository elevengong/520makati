<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    protected $table = 'nation';
    protected $primaryKey = 'id';
    public $timestamps = '';

    protected $fillable = ['nation','flag'];
}