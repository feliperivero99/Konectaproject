<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Pagina principal de usuarios*/
    public function index($war = 0)
    {
        //
        if (session('user')["rol"] == "V") {
            return redirect()->route('dashvende');
        }

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];
        $aviso = $war;

        $matrizuser = User::getActiveUserslist();

        return view('Usuarios.index', compact('name', 'aviso', 'matrizuser'));
    }

    /* Funcion para buscar usuarios, llama un metodo del modelo*/

    public function searchUsers(Request $request)
    {
        //
        if (session('user')["rol"] == "V") {
            return redirect()->route('dashvende');
        }

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];
        $aviso = 0;

        $matrizuser = User::searchuser($request->search, $request->rol);

        return view('Usuarios.index', compact('name', 'aviso', 'matrizuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Funcion para crear usuarios*/
    public function createuser(Request $request)
    {
        //
        if (session('user')["rol"] == "V") {
            return redirect()->route('dashvende');
        }

        if ($request->isMethod('post')) {
            // dd($request->input());

            $request = Request::create('/api/auth/register', 'POST', $request->input());

            $response = Route::dispatch($request);
            $decode = json_decode($response->content(), true);
            // dd($decode);

            if (isset($decode["message"]) == true) {
                return redirect()->route('usuarios', ['aviso' => 2]);

            } else {
                return redirect()->route('usuarios', ['aviso' => 1]);
            }
        }

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];

        $user = null;
        $edit = 0;
        $js = view('Usuarios.createupdate_js', compact('edit'))->render();

        return view('Usuarios.createupdate', compact('name', 'js', 'user'));
    }

    /* Funcion para editar usuarios*/
    public function editUser(Request $request, $id = false)
    {
        // dd($id);

        if (session('user')["rol"] == "V") {
            return redirect()->route('dashvende');
        }

        if ($request->isMethod('post')) {
            // dd($request->input());
            $user = User::edituser($request->input());

            if ($user != null) {

                return redirect()->route('usuarios', ['aviso' => 5]);
            } else {
                return redirect()->route('usuarios', ['aviso' => 41]);

            }
        }

        $user = User::where("id", $id)->first();

        if ($user == null) {
            return redirect()->route('usuarios', ['aviso' => 3]);

        }

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];

        $edit = 1;
        $js = view('Usuarios.createupdate_js', compact('edit'))->render();

        return view('Usuarios.createupdate', compact('name', 'js', 'user'));

    }

    /* Funcion para borrar usuarios*/
    public function deletetUser(Request $request, $id = false)
    {

        if (session('user')["rol"] == "V") {
            return redirect()->route('dashvende');
        }
        $user = User::deleteuser($request->iduser);

        if ($user != null) {

            return redirect()->route('usuarios', ['aviso' => 5]);
        } else {
            return redirect()->route('usuarios', ['aviso' => 4]);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
