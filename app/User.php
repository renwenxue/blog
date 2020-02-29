<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table="user";
    protected $primarykey="uid";
    public $timestamps=false;
    protected $guarded=[];
}
