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


    public function view($name)
    {
        $classroom = $this->findbySearch($name);

        return view('classrooms.index', ['classroom' => $classroom]);
    }

    public function findbySearch($name)
    {

         $classroom = Classrooms::query()
         ->where('full_name', 'LIKE', $name);

        if (empty($classroom)) {
            throw new NotFoundHttpException("A tanterem nem található");
        }

        return $classroom;

    }


}
