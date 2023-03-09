<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['dept_id', 'course_code', 'course_title', 'level', 'semester', 'status', 'credits'];
}
