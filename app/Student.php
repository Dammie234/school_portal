<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'phone', 'dept_id', 'gender', 'session', 'matric_no'];
}
