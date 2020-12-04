<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'documento', 'username', 'Nombres', 'Apellidos', 'email', 'password', 'token', 'created_at', 'update_at', 'status', 'rol',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function createuser($array = false, $password = false)
    {




        $user = new User();
        $user->documento = $array["documento"];
        $user->username = $array["username"];
        $user->Apellidos = $array["Apellidos"];
        $user->Nombres = $array["Nombres"];
        $user->email = $array["email"];
        $user->password = $array["password"];
        $user->token = $array["token"];
        $user->status = "A";
        $user->rol = $array["rol"];
        $user->save();

        return $user;

    }

    public static function edituser($array = false)
    {

        $user = User::where("id", $array["iduser"])->first();


        if($user == null){
            return null;
        }
        

        $user->documento = $array["documento"];
        $user->username = $array["username"];
        $user->Apellidos = $array["Apellidos"];
        $user->Nombres = $array["Nombres"];
        $user->email = $array["email"];

        if ($array["password"] != null) {
            $user->password = bcrypt($array["password"]);
        }

        $user->token = $array["token"];
        $user->status = "A";
        $user->rol = $array["rol"];

        
        $user->save();

        return $user;

    }

    public static function deleteuser($id = false){

        $user = User::where("id", $id)->first();


        if($user == null){
            return null;
        }
        $user->status="T";
        $user->save();

        return $user;
    }

    public static function getusername($id = false){

        $user = User::where("id", $id)->first();


        if($user == null){
            return null;
        }
 
        return $user->username;
    }


    public static function searchuser($text = false, $rol = false){

        
        $users = User::where('status', 'A');

        if($text != null && $text != ""){
            
            $users->where(function ($query) use ($text) {
                $query->orWhere('Nombres', 'LIKE', '%' . $text . '%');
                $query->orWhere('Apellidos', 'LIKE', '%' . $text . '%');
                $query->orWhere('email', 'LIKE', '%' . $text . '%');
                $query->orWhere('documento', 'LIKE', '%' . $text . '%');
                
                $query->orWhere('username', 'LIKE', '%' . $text . '%');
            });
        }
        
        if($rol != null && $rol != "0" && $rol != 0){
            $users->where("rol",$rol );
           
        }
     
        $users =$users->get();
        

        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["documento"] = $vt->documento;
            $userlsit[$contador]["username"] = $vt->username;
            $userlsit[$contador]["Nombres"] = $vt->Nombres;
            $userlsit[$contador]["Apellidos"] = $vt->Apellidos;
            $userlsit[$contador]["email"] = $vt->email;
            $userlsit[$contador]["created_at"] = $vt->created_at;
            $userlsit[$contador]["rol"] = $vt->rol;

            if ($userlsit[$contador]["rol"] == "A") {
                $userlsit[$contador]["rol"] = "Administrador";
            } else {
                $userlsit[$contador]["rol"] = "Vendedor";
            }
            $contador++;
        }

        return $userlsit;
    }

    public static function getActiveUsers()
    {
        return User::where('status', 'A');
    } //

    public static function getActiveUserslist()
    {
        $users = User::where('status', 'A')->get();
        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["documento"] = $vt->documento;
            $userlsit[$contador]["username"] = $vt->username;
            $userlsit[$contador]["Nombres"] = $vt->Nombres;
            $userlsit[$contador]["Apellidos"] = $vt->Apellidos;
            $userlsit[$contador]["email"] = $vt->email;
            $userlsit[$contador]["created_at"] = $vt->created_at;
            $userlsit[$contador]["rol"] = $vt->rol;

            if ($userlsit[$contador]["rol"] == "A") {
                $userlsit[$contador]["rol"] = "Administrador";
            } else {
                $userlsit[$contador]["rol"] = "Vendedor";
            }
            $contador++;
        }

        return $userlsit;
    } //
}
