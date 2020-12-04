<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Funcion para llamar la pagina principal de clientes*/
    public function index($war = 0)
    {
        //

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];
        $aviso = $war;

        $matrizuser = Client::getActiveClienteslist();

        return view('Clientes.index', compact('name', 'aviso', 'matrizuser'));
    }

    /* Funcion para crear clientes*/
    public function createclient(Request $request)
    {
        //

        if ($request->isMethod('post')) {
            //   dd($request->input());

            //  dd(session("user")["id"]);

            $cliente = Client::createCliente($request->input(), session("user")["id"]);

            if ($cliente != null) {
                return redirect()->route('clientes', ['aviso' => 2]);

            } else {
                return redirect()->route('clientes', ['aviso' => 1]);
            }
        }

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];

        $user = null;
        $edit = 0;
        $js = view('Clientes.createupdate_js', compact('edit'))->render();

        return view('Clientes.createupdate', compact('name', 'js', 'user'));
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

    /* Funcion para editar clientes*/
    public function editCliente(Request $request, $id)
    {
        //
        if ($request->isMethod('post')) {
            // dd($request->input());
            $user = Client::editClient($request->input());

            if ($user != null) {

                return redirect()->route('clientes', ['aviso' => 5]);
            } else {
                return redirect()->route('clientes', ['aviso' => 4]);

            }
        }

        $user = Client::where("id", $id)->first();

        if ($user == null) {
            return redirect()->route('clientes', ['aviso' => 3]);

        }

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];

        $edit = 1;
        $js = view('Clientes.createupdate_js', compact('edit'))->render();

        return view('Clientes.createupdate', compact('name', 'js', 'user'));
    }

/* Funcion para Eliminar clientes*/
    public function deletetClient(Request $request, $id = false)
    {

        // dd($request->iduser);
        $user = Client::deleteCliente($request->iduser);

        if ($user != null) {

            return redirect()->route('clientes', ['aviso' => 5]);
        } else {
            return redirect()->route('clientes', ['aviso' => 4]);

        }
    }

    /* Funcion para buscar clientes */

    public function searchClient(Request $request)
    {
        //

        $name = session('user')["Nombres"] . " " . session('user')["Apellidos"];
        $aviso = 0;

        $matrizuser = Client::searchClient($request->search);

        return view('Clientes.index', compact('name', 'aviso', 'matrizuser'));
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
