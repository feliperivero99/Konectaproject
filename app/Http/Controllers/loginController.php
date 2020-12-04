<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Metodo del login*/
    public function index()
    {
        //
        $status = false;
        $js = view('Login.login_js', compact('status'))->render();
        return view('Login.login', compact('js', 'status'));
    }

    /* Funcion Procesa el login*/
    public function login(Request $request)
    {

        //  $key = config('variables.secret');

        /*
        Metodo para apis externas
        $url = "http://127.0.0.1:9000/api/auth/login";
        $client = new \GuzzleHttp\Client();

        $params['headers'] = ['Content-Type' => 'application/json'];
        $params['form_params'] = array('username' => $request->username, 'password' => $request->idPassword);

        $response = $client->post($url, $params);*/

        /*Metodo para api interna - Simulado el llamdo de la api */
        $request = Request::create('/api/auth/login', 'POST', $request->input());

        $response = Route::dispatch($request);
        $decode = json_decode($response->content(), true);

        if (isset($decode["error"]) == true) {
            session()->flash('message_type', 'alert-danger');
            session()->flash('message', 'Usuario no encontrado, retificque su email y contraseña');
            $status = true;
            $js = view('Login.login_js', compact('status'))->render();
            return view('Login.login', compact('js', 'status'));

        } else {

            $tipouser = $decode["user"]["rol"];
            //dd($decode["user"]["status"] );

            if ($decode["user"]["status"] == "T") {
                session()->flash('message_type', 'alert-danger');
                session()->flash('message', 'Usuario no encontrado, retificque su email y contraseña');
                $status = true;
                $js = view('Login.login_js', compact('status'))->render();
                return view('Login.login', compact('js', 'status'));

            }
            session(['access_token' => $decode["access_token"]]);
            session(['user' => $decode["user"]]);
            //dd(session());

            if ($tipouser == "A") {
                return redirect()->route('dashadmin');
            } else {
                return redirect()->route('dashvende');
            }
        }

        $js = view('Login.login_js')->render();
        return view('Login.login', compact('js'));
    }

    /* Funcion para cerrar sesion*/
    public function logout(Request $request)
    {

        $params["access_token"] = session("access_token");
        $params["type"] = "bearer";

        /* Metodo para cerrar sesion via api*/
        $request = Request::create('/api/auth/logout', 'POST', $params);
        session(['access_token' => null]);
        session(['user' => null]);
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
