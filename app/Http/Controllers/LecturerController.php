<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Course;
use App\Lecturer;
use App\LecturerCourse;
use App\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function departments(){
        $departments = Department::all();
        return response()->json($departments);
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'department' => 'required',
            'gender' => 'required|string',
            'password' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2
        ]);
        Lecturer::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'dept_id' => $request->department
        ]);
    }
    public function index(){
        $lecturers = DB::table('users')
                        ->leftJoin('lecturers', 'lecturers.user_id', '=', 'users.id')
                        ->where('users.role', 2)
                        ->select('users.name', 'users.email', 'lecturers.*')
                        ->get();
        return response()->json($lecturers);
    }

   public function course($dept_id){
        $course = Course::where('dept_id', $dept_id)->get();
        return response()->json($course);
   }

   public function storeCourseLecturer(Request $request){
    $this->validate($request, [
        'department' => 'required',
        'course' => 'required',
        'lecturer' => 'required'
    ]);
    LecturerCourse::create([
        'course_id' => $request->course,
        'user_id' => $request->lecturer
    ]);
   }
   public function courseLecturers(){
    $lecturers = DB::table('lecturer_courses')
                    ->leftJoin('users', 'users.id', '=', 'lecturer_courses.user_id')
                    ->leftJoin('courses', 'courses.id', '=', 'lecturer_courses.course_id')
                    ->select('users.name', 'users.email', 'courses.*')
                    ->get();
    return response()->json($lecturers);
   }
   public function getUser($id)
   {
        $user = User::where('id', $id)->first();
        return response()->json($user);
   }
   public function lecturerCourses($id)
   {
    $lecturers = DB::table('lecturer_courses')
                    ->leftJoin('courses', 'courses.id', '=', 'lecturer_courses.course_id')
                    ->where('lecturer_courses.user_id', $id)
                    ->select('courses.*')
                    ->get();
    return response()->json($lecturers);
   }
   
}
