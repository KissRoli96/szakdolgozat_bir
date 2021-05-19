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
        if (Auth::hasRole('student') or Auth::hasRole('teacher') ) {
            throw new AuthorizationException("Nincs jogosultságot erre , csak tanszékvezető képes új kurzusokat létrehozni !");
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

        $course = $this->findByid($id);

        $departments = Departments::all();

        if (request()->post() && request()->has('_token')) {

            request()->validate([
                'neptun_id' => 'required',
                'unique_name' => 'required',
                'full_name' => 'required',
                'type' => 'required',
                'school' => 'required',
                'hour' => 'required',
                'default_headcount' => 'required',
                'department' => 'required',
            ]);

            $course->fill(request()->all());
            if ($course->save()) {
                request()->session()->flash('success', 'A kurzust sikeresen mentettem');

                return redirect("/courses/view/{$id}");

            }
                request()->session()->flash('error', 'Belső hiba történt');
        }
        return view('courses.update',['course' => $course, 'departments' => $departments]);
    }



    public function delete($id)
    {
        $course = $this->findByid($id);
        if ($course->delete()) {
            request()->session()->flash('success', 'A kurzust sikeresen töröltem');
            return redirect('courses');
        }
        request()->session()->flash('error', 'Belső hiba történt');
        return back();
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
