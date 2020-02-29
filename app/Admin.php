<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";
    protected $primarykey="uid";
    public $timestamps=false;
    protected $guarded=[];
}
