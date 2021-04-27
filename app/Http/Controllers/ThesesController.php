<?php

namespace App\Http\Controllers;

use App\Models\Theses;
use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ThesesController extends Controller
{
    public function index()
    {
        $theses = Theses::all();

        return view('theses.index',['theses' => $theses]);
    }


    public function view($id)
    {
        $thesis = $this->findById($id);

        return view('theses.thesis_profile', ['thesis' => $thesis]);

    }

    private function findById($id)
    {
        $thesis = Theses::where('id', $id)->first();

        if (empty($thesis)) {
            throw new NotFoundHttpException("A szakdolgozat nem található");
        }
        return $thesis;
    }

}
