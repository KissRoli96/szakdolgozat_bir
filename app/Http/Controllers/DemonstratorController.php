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
        $demonstrator = new Demonstrator();

        $specs = Specialist::all();
        $specializations = Specialization::all();
        $courses = Course::all();

        if ($request->post() && $request->has('_token')) {
            $request->validate([
                'user' => 'required',
                'specs' => 'required',
                'specialization' => 'required',
                'semester' => 'required',
                'min' => 'required',
                'max' => 'required',
                'corr' => 'required',
            ]);


            $demonstrator->fill($request->all());

            if ($demonstrator->save()) {

                $request->session()->flash('success', 'A demonstártort sikeresen mentettem');

                return redirect('/demonstrators');
            }
                $request->session()->flash('error', 'Belső hiba történt.');
        }

        return view('demonstrators.create',
            [
            'demonstrator' => $demonstrator,
            'specializations' => $specializations,
            'courses' => $courses,
            'specs' => $specs
            ],
        );
    }


}
