<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Theses;
use App\Models\Departments;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ThesesController extends Controller
{
    public function index()
    {
        $theses = Theses::all();
        $departments = Departments::all();

        $teachers = DB::select(DB::raw('SELECT DISTINCT(t.user_mail), u.`name` FROM teachers as t
        LEFT JOIN users as u ON t.user_mail = u.email;'));


        return view('theses.index',[
            'theses' => $theses,
            'departments' => $departments,
            'teachers' => $teachers
        ]);
    }


    public function view($id)
    {
        $thesis = $this->findById($id);

        return view('theses.profile', ['thesis' => $thesis]);

    }


    public function delete($id)
    {
        if (Auth::hasRole('student')) {
            throw new AuthorizationException("kicsi a pöcsöd");
        }

        $thesis = $this->findById($id);
        if ($thesis->delete()) {
            request()->session()->flash('success','A szakdolgozat sikeresen törölve');
            return redirect('theses');
        }
            request()->session()->flash('error','Belső hiba történt');
            return back();
    }


    public function insert(Request $request)
    {
        if (Auth::hasRole('student')) {
            throw new AuthorizationException('Nincs jogosultságod ezt a funkciót használni!');
        }

        $thesis = new Theses();

        $departments = Departments::all();

        $courses = Course::all();

        if ($request->post() && $request->has('_token')) {
            $request->validate([
                'user' => 'required',
                'department' => 'required',
                'task_name' => 'required',
                'task_name_en' => 'required',
                'headcount' => 'required',
                'task_description' => 'required',
                'type' => 'required',
                'day' => 'required',
                'corr' => 'required',
            ]);

            $thesis->fill($request->all());

            if ($thesis->save()) {
                $request->session()->flash('success', 'A szakdolgozatot sikeresen mentettem');
                return redirect('/theses/view/' . $thesis->id);
            }
                $request->session()->flash('error', 'Belső hiba történt');
        }

        return view('theses.create', ['thesis' => $thesis,'departments' => $departments, 'courses' => $courses]);
    }

    public function update($id)
    {
        $thesis = $this->findById($id);

        $departments = Departments::all();

        if (request()->post() && request()->has('_token')) {

            request()->validate([
                'user' => 'required',
                'department' => 'required',
                'task_name' => 'required',
                'task_name_en' => 'required',
                'headcount' => 'required',
                'task_description' => 'required',
                'type' => 'required',
            ]);

            $thesis->fill(request()->all());

            if ($thesis->save()) {
                request()->session()->flash('success', 'A szakdolgozatot sikeresen mentettem');
                return redirect("/theses/view/{$id}");
            }

            request()->session()->flash('error', 'Belső hiba történt');
        }


        return view('theses.update', ['thesis' => $thesis, 'departments' => $departments]);

    }

    private function findById($id)
    {
        $thesis = Theses::where('id', $id)->first();

        if (empty($thesis)) {
            throw new NotFoundHttpException("A szakdolgozat nem található");
        }
        return $thesis;
    }

    public function search()
    {
        $name = request()->get('name');
        $user = request()->get('user');
        $department = request()->get('department');

        if(empty($name) AND empty($user) AND empty($department)) {
            request()->session()->flash('error', 'Nem töltötted ki a keresési mezőket!');
            return redirect("/theses/");

        }

        $result = $this->find($name, $user, $department);

        return view("/theses/search",[
            'name' => $name,
            'result' => $result
        ]);

    }

    private function find($name,$user,$department)
    {
        $theses = Theses::query()
            ->where('task_name', 'LIKE', "%$name%")
            ->where('user', 'LIKE', "%$user%")
            ->where('department', 'LIKE', "%$department%")
            ->get();

        if (empty($theses)) {
            throw new NotFoundHttpException("A szakdolgozat nem található!");
        }

        return $theses;
    }

}
