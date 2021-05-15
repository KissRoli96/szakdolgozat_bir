<?php

namespace App\Http\Controllers;

use App\Models\Theses;
use App\Models\Departments;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
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
        $thesis = new Theses();

        if ($request->post() && $request->has('_token')) {
            $request->validate([
                'user' => 'required',
                'department' => 'required',
                'task_name' => 'required',
                'task_name_en' => 'required',
                'headcount' => 'required',
                'task_description' => 'required',
            ]);

            $thesis->fill($request->all());

            if ($thesis->save()) {
                $request->session()->flash('success', 'A szakdolgozatot sikeresen mentettem');
                return redirect('/theses/view/' . $thesis->id);
            }
                $request->session()->flash('error', 'Belső hiba történt');
        }

        return view('theses.create', ['thesis' => $thesis]);
    }

    public function update($id)
    {
        $thesis = $this->findById($id);

        if (request()->post() && request()->has('_token')) {

            request()->validate([
                'user' => 'required',
                'department' => 'required',
                'task_name' => 'required',
                'task_name_en' => 'required',
                'headcount' => 'required',
                'task_description' => 'required',
            ]);

            $thesis->fill(request()->all());

            if ($thesis->save()) {
                request()->session()->flash('success', 'A szakdolgozatot sikeresen mentettem');
                return redirect("/theses/view/{$id}");
            }

            request()->session()->flash('error', 'Belső hiba történt');
        }


        return view('theses.update', ['thesis' => $thesis]);

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


        if (!empty($name)) {
            $result = $this->findByName($name);


            return view("/theses/search",[
                'name' => $name,
                'result' => $result
            ]);
        }
    }

    private function findByName($name)
    {
        $theses = Theses::query()
            ->where('task_name', 'LIKE', "%$name%")
            ->get();

        if (empty($theses)) {
            throw new NotFoundHttpException("A szakdolgozat nem található!");
        }

        return $theses;
    }

}
