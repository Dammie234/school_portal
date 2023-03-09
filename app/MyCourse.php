<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyCourse extends Model
{
    protected $fillable = ['user_id', 'dept_id', 'level', 'semester'];
}
