<?php


namespace App\Http\Controllers;

use App\Models\Classrooms;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;


class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classrooms::all();

        return view('classrooms.index', ['classrooms' => $classrooms]);

    }

    public function search()
    {
        $name = request()->get('name');
        if (!empty($name)) {
            $result = $this->findByName($name);

            return view("/classrooms/search", [
                'name' => $name,
                'classrooms' => $result
            ]);
        }
    }

    public function view($id)
    {
        $classroom = $this->findbyId($id);

        return view('classrooms.view', ['classroom' => $classroom]);
    }

    protected function findById($id) {
        $classroom = Classrooms::where('classroom_id', $id)->first();

        if (empty($classroom)) {
            throw new NotFoundHttpException("A tanterem nem található");
        }
        return $classroom;
    }

    protected function findByName($name)
    {
         $classrooms = Classrooms::query()
         ->where('full_name', 'LIKE', "%$name%")
         ->get();

        if (empty($classrooms)) {
            throw new NotFoundHttpException("A tanterem nem található");
        }

        return $classrooms;

    }


}
