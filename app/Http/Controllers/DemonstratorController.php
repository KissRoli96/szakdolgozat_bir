<?php


namespace App\Http\Controllers;

use App\Models\Demonstrator;
use App\Models\Specialization;
use App\Models\Specialist;
use App\Models\Course;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DemonstratorController extends Controller
{

    public function index()
    {
        $specs = Specialist::all();
        $specializations = Specialization::all();
        $courses = Course::all();
        $demonstrators = Demonstrator::all();

        return view('demonstrators.index',
            [
            'demonstrators' => $demonstrators,
            'specializations' => $specializations,
            'courses' => $courses,
            'specs' => $specs]);
    }

    public function view($id)
    {
        if (Auth::hasRole('student')) {
            throw new AuthorizationException('Nincs jogosultságod ezt a funkciót használni!');
        }

       $demonstrator = $this->findByID($id);

       $specs = DB::select(DB::raw('SELECT DISTINCT(s.`id_specialist`), s.`name` FROM
	                                    specialist AS s
                                        JOIN demonstrator AS d ON s.id_specialist = d.specs'));

        $specializations =  DB::select(DB::raw('SELECT DISTINCT(s.`id_specialization`), s.`name` FROM
	                                    specialization AS s
                                        JOIN demonstrator AS d ON s.id_specialization = d.specialization'));

        $courses = Course::all();

        return view('demonstrators.profile', ['demonstrator' => $demonstrator, 'specs' => $specs, 'specializations' => $specializations, '$courses' => $courses]);
    }

    public function insert(Request $request)
    {
        if (Auth::hasRole('teacher') || Auth::hasRole('department_leader') ) {
            throw new AuthorizationException('Nincs jogosultságod ezt a funkciót használni!');
        }

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

    private function findByID($id)
    {
        $demonstrator = Demonstrator::where('id', $id)->first();

        if (empty($demonstrator)) {
            throw new NotFoundHttpException('A felhasználó nem található!');
        }

        return $demonstrator;
    }

}
