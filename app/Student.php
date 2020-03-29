<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
        'student_first_name', 'student_second_name', 'student_last_name','student_gender','student_year_of_birth','student_priviliege','student_address','student_region','student_pin','student_faculty','student_group','student_email',
    ];
}
