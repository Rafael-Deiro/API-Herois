<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heroi extends Model
{
    public $timestamps = false;
    protected $table = 'herois';
    protected $guarded = ['id'];
}
