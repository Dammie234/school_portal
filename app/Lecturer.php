<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['user_id', 'phone_number', 'gender', 'dept_id', 'description', 'profile_picture'];
}
