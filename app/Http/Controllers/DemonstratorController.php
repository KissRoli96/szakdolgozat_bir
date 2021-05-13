<?php


namespace App\Http\Controllers;

use App\Models\Demonstrator;
use App\Models\Specialization;
use App\Models\Specialist;
use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DemonstratorController extends Controller
{

    public function index()
    {
        $demonstrators = Demonstrator::all();

        return view('demonstrators.index', ['demonstrators' => $demonstrators]);

    }

    public function view()
    {

    }

    public function insert(Request $request)
    {
        var_dump('lefut');
    }


}
