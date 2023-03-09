<?php

namespace App\Http\Controllers;
use DB;
use App\Course;
use App\Material;
use App\MyCourse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function myCourses($user_id)
    {
        $my_course =  MyCourse::where('user_id', $user_id)->first(); 
        $courses = DB::table('courses')
                    ->where([
                        ['dept_id', '=', $my_course->dept_id],
                        ['semester', '=', $my_course->semester],
                        ['level', '=', $my_course->level]
                    ])
                    ->get();
        return response()->json($courses);
    }
    public function updateMyCourse(Request $request, $user_id)
    {
        MyCourse::where('user_id', $user_id)->update([
            'level' => $request->level,
            'semester' => $request->semester
        ]);
    }
    public function myMaterials($course_id)
    {
        $course = Course::where('id', $course_id)->first();
        $materials = Material::where('course_id', $course_id)->get();
        return response()->json(['course' => $course, 'materials' => $materials]);
    }
}
