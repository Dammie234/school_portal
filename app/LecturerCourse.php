<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecturerCourse extends Model
{
    protected $fillable = ['course_id', 'user_id'];
}
