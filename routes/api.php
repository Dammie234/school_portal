<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::post('/student-registration', 'AuthController@registerStudent');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function () {

    Route::get('/departments', 'LecturerController@departments');
    Route::post('/lecturer', 'LecturerController@store');
    Route::get('/lecturer', 'LecturerController@index');
    Route::get('/course/{dept_id}', 'LecturerController@course');
    Route::post('/course-lecturer', 'LecturerController@storeCourseLecturer');
    Route::get('/course-lecturers', 'LecturerController@courseLecturers');
    Route::get('/users/{id}', 'LecturerController@getUser');
    Route::get('/lecturer-courses/{id}', 'LecturerController@lecturerCourses');
    Route::post('/material', 'MaterialController@store');
    Route::get('/materials/{user_id}', 'MaterialController@index');
    Route::get('/material/{id}', 'MaterialController@show');
    Route::patch('/update-material/{id}', 'MaterialController@update');
    Route::delete('/material/{id}', 'MaterialController@destroy');
    Route::get('/my-courses/{user_id}', 'StudentController@myCourses');
    Route::patch('/update-my-course/{user_id}', 'StudentController@updateMyCourse');
    Route::get('/my-materials/{course_id}', 'StudentController@myMaterials');
});

