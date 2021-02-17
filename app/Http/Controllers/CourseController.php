<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class CourseController extends Controller
{
    public function index()
    {
        $data['course'] = DB::table('course')->get();

        return view("course", compact('data'));
    }

    public function courseInsert()
    {
        return view('courseInsert');
    }

    public function courseInsertPost(Request $request)
    {
        $request->validate(['course_title' => 'required', 'course_content' => 'required', 'course_must' => 'required']);
        // validate = boş olup olmadığını kontrol ediyor

        $course = DB::table('course')->insert(
            [
                'course_title' => $request->course_title,
                'course_content' => $request->course_content,
                'course_must' => $request->course_must
            ]
        );
        if ($course) {
            return back()->with('status', 'Add successful');
        }

    }

    public function courseUpdate($id)
    {
        $course = DB::table('course')->find($id);   // 'find' id ye göre çekiyor

        return view('courseUpdate', compact('course'));
    }

    public function courseUpdatePost(Request $request, $id)
    {
        $request->validate(['course_title' => 'required', 'course_content' => 'required', 'course_must' => 'required']);

        $course = DB::table('course')->where('id', $id)
            ->update(
                [
                    'course_title' => $request->course_title,
                    'course_content' => $request->course_content,
                    'course_must' => $request->course_must
                ]
            );

        if ($course) {
            return back()->with('status', 'Update successful');
        }
    }

    public function courseDelete($id)
    {
        $course = DB::table('course')
            ->where('id', $id)
            ->delete();                   // -delete($id);

        if ($course) {
            return back();
        }
    }
}
