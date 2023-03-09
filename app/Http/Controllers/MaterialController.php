<?php

namespace App\Http\Controllers;
use DB;
use Str;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'course' => 'required',
            'title' => 'required|string',
        ]);
        // dd($request);
        $data = [
            'course_id' => $request->course,
            'title' => $request->title,
            'video' => $request->video,
            'user_id' => $request->user_id,
            'content' => $request->content
        ];
        
        Material::create($data);
    }
    public function index($user_id)
    {
        $materials = DB::table('materials')
                        ->leftJoin('courses', 'courses.id', '=', 'materials.course_id')
                        ->where('materials.user_id', $user_id)
                        ->select('materials.*', 'courses.course_title', 'courses.course_code', 'courses.level', 'courses.semester', 'courses.credits')
                        ->get();
        return response()->json($materials);
    }
    public function show($id)
    {
        $material = Material::where('id', $id)->first();
        return response()->json($material);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course' => 'required',
            'title' => 'required|string',
        ]);
        // dd($request);
        $data = [
            'course_id' => $request->course,
            'title' => $request->title,
            'video' => $request->video,
            'content' => $request->content
        ];
        
        Material::where('id', $id)->update($data);
    }
    public function destroy($id)
    {
        Material::where('id', $id)->delete();
    }
}
