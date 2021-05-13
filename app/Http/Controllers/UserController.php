<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{




    /*
     * 0. Athenticate //azonosítás. Vendég-e vagy nem
     * 1. Authorization //Jogosultság ellenőrzése. Vendég végre hajthat-e törlést pl.
     * 2. Show data //kiratod a formot
     * 3. Collect user input //form submit
     * 4. Validate user input (MINDIG KELL)
     * 5. Business logic (delete, update, összegyűjteni bármit és azzal dolgozni, akármi.)
     * 6. Check for results. //mivel tért vissza a save() vagy a delete() vagy akármi().
     * 7. Log results //Leírni a müvelet eredményét. Ha hiba van, el akarjuk tárolni egy fáljba/ vlahol, hogy mi is tudjunk róla hogy hiba van a rendszerben
     * 8. Show results //mehet a view fálj megjelenítése.
     */





    public function index()
    {
//        if (Auth()->check()) {
//
//            //csinaljon valamit csak a loginoltaknak
//        }
//
//        if (!Auth()->check()) {
//            //csakj vendégek láthatják
//        }
        //nincs ellenőriozve auth, tehát mindenki mindent
        $users = User::all();

        return view('users.index',['users' => $users]);
    }

    /**
     * Ez a CRUD-ból az R, a read, megnézzük egy adott objectet
     * @param $id
     */
    public function view($id) {

        $user = $this->findById($id);

        return view('users.profile', ['user' => $user]);
    }


    public function insert(Request $request)
    {
        $user = new User();

        if ($request->post() && $request->has('_token')) {
            $request->validate([
                'email' => 'required',
                'name' => 'required',
            ]);

            $user->fill($request->all());

            if ($user->save()) {
                $request->session()->flash('success', 'A felhasználót sikeresen mentettem');

                return redirect('/user/view/' . $user->id_user);
            }

            $request->session()->flash('error', 'Belső hiba történt');
        }

        return view('users.create',['user' => $user]);
    }

    /**
     * Update the given user
     */
    public function update($id)
    {
        $user = $this->findById($id);

        if (request()->post() && request()->has('_token')) {

            request()->validate([
                'email' => 'required',
                'name' => 'required',
            ]);

            $user->fill(request()->all());

            if ($user->save()) {
                request()->session()->flash('success', 'A felhaszánlót sikeresen mentettem');

                return redirect("/user/view/{$id}");
            }

            request()->session()->flash('error', 'Belső hiba történt');
        }

        return view('users.update',['user' => $user]);
    }

    /**
     * Deletes the given user if exists.
     * @param $id
     */
    public function delete($id)
    {
        $user = $this->findById($id);
        if ($user->delete()) {
            request()->session()->flash('success', 'A felhaszánlót sikeresen töröltem');
            return redirect('user');
        }
        request()->session()->flash('error', 'Belső hiba történt');
        return back();

    }

    /**
     * Find user by id. Throws not found exception if not found.
     * @param $id
     * @return mixed
     */

    private function findById($id)
    {
        $user = User::where('id_user', $id)->first();

        if (empty($user)) {
            throw new NotFoundHttpException("A felhaszáló nem található");
        }
        return $user;
    }




}
