<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Departments;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();

        return view('courses.index', ['courses' => $courses]);

    }


    public function view($id)
    {
            $course = $this->findByid($id);

            return view('courses.profile', ['course' => $course]);
    }


    public function insert(Request $request)
    {
        if (Auth::hasRole('student')) {
            throw new AuthorizationException("kicsi a pöcsöd");
        }
        $course = new Course();


        $departments = Departments::all();


        if ($request->post() && $request->has('_token')) {
            $request->validate([
                'neptun_id' => 'required',
                'unique_name' => 'required',
                'full_name' => 'required',
                'type' => 'required',
                'school' => 'required',
                'hour' => 'required',
                'default_headcount' => 'required',
                'department' => 'required',
            ]);


            $course->fill($request->all());

            if ($course->save()) {
                $request->session()->flash('success', 'A kurzust sikeresen mentettem');

                return redirect('/courses/view/' . $course->course_id);
            }

            $request->session()->flash('error', 'Belső hiba történt');
        }

        return view('courses.create', ['course' => $course, 'departments' => $departments]);

    }

    public function update($id)
    {

    }


    public function delete($id)
    {

    }

    private function findByid($id)
    {
        $course = Course::where('course_id', $id)->first();

        if (empty($course)) {
            throw new NotFoundHttpException("A kurzus nem található");
        }

        return $course;
    }
}
