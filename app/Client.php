<?php

namespace App;

use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;
    protected $table = 'clientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'documento', 'direccion', 'email', 'created_at', 'update_at', 'status', '`idcreador',
    ];

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */

     /* Funcion para crear clientes, y validar que no se repitan datos */
    public static function createCliente($array = false, $iduser = false)
    {
        $userdocu = Client::where('email', 'LIKE', '%' . $array["email"] . '%')->first();

        if($userdocu != null){
            return null;
        }

        $userdocu = Client::where('documento', 'LIKE', '%' . $array["documento"] . '%')->first();

        if($userdocu != null){
            return null;
        }

        // dd($array );
        $user = new Client();
        $user->documento = $array["documento"];
        $user->nombre = $array["Nombres"];
        $user->direccion = $array["direccion"];
        $user->idcreador = $iduser;
        $user->email = $array["email"];

        $user->save();

        return $user;

    }

    
     /* Funcion para editar clientes */
    public static function editClient($array = false)
    {
        // dd($array);
        $user = Client::where("id", $array["iduser"])->first();

        if ($user == null) {
            return null;
        }

        $user->documento = $array["documento"];
        $user->nombre = $array["Nombres"];
        $user->direccion = $array["direccion"];

        $user->email = $array["email"];

        $user->save();

        return $user;

    }


    
     /* Funcion para eliminar clientes */
    public static function deleteCliente($id = false)
    {

        $user = Client::where("id", $id)->first();

        if ($user == null) {
            return null;
        }
        $user->status = "T";
        $user->save();

        return $user;
    }


    
     /* Funcion para buscar clientes */
    public static function searchClient($text = false)
    {
        //dd($text);
        $users = Client::where('status', 'A');

        if ($text != null && $text != "") {

            $users->where(function ($query) use ($text) {
                $query->orWhere('nombre', 'LIKE', '%' . $text . '%');
                $query->orWhere('direccion', 'LIKE', '%' . $text . '%');
                $query->orWhere('email', 'LIKE', '%' . $text . '%');
                $query->orWhere('documento', 'LIKE', '%' . $text . '%');

            });
        }

        $users = $users->get();

        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["documento"] = $vt->documento;

            $userlsit[$contador]["Nombres"] = $vt->nombre;

            $userlsit[$contador]["email"] = $vt->email;
            $userlsit[$contador]["direccion"] = $vt->direccion;
            $userlsit[$contador]["creado"] = User::getusername($vt->idcreador);
            $userlsit[$contador]["created_at"] = $vt->created_at;

            $contador++;
        }

        return $userlsit;
    }


    
     /* Funcion para lista todo los clientes activos*/
    public static function getActiveUsers()
    {
        return User::where('status', 'A');
    } //

    
     /* Funcion para lista todo los clientes activos en un arreglo*/
    public static function getActiveClienteslist()
    {
        $users = Client::where('status', 'A')->get();
        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["documento"] = $vt->documento;

            $userlsit[$contador]["Nombres"] = $vt->nombre;

            $userlsit[$contador]["email"] = $vt->email;
            $userlsit[$contador]["direccion"] = $vt->direccion;
            $userlsit[$contador]["creado"] = User::getusername($vt->idcreador);
            $userlsit[$contador]["created_at"] = $vt->created_at;

            $contador++;
        }

        return $userlsit;
    } //
}
