<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table="student";
    protected $primarykey="s_id";
    public $timestamps=false;
    protected $guarded=[];
}
