<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    public $fillable = array('branch_id','cname');
}
