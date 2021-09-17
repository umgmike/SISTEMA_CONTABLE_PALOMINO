<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\OficinaContablePalomino\Usuario;
use App\Models\OficinaContablePalomino\Regimen;
use App\Models\OficinaContablePalomino\Empresa;

use App\Models\OficinaContablePalomino\Asiento;
use App\Models\OficinaContablePalomino\Cuenta;

use App\Models\OficinaContablePalomino\CategoriaCuenta;
use App\Models\OficinaContablePalomino\Rol;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function HomeAdmin()
    {
        $datos['AllUser'] = Usuario::orderBy('id', 'DESC')->get();
        $datos['UserActive'] = Usuario::orderBy('id', 'DESC')->where('condicion','!=', 0)->get();
        $datos['UserInactiveAll'] = Usuario::orderBy('id', 'DESC')->where('condicion','==',0)->get();

        $datos['AllCompany'] = Empresa::orderBy('id', 'DESC')->get();
        $datos['CompanyActive'] = Empresa::orderBy('id', 'DESC')->where('condicion','!=', 0)->get();
        $datos['CompanyInactiveAll'] = Empresa::orderBy('id', 'DESC')->where('condicion','==',0)->get();

        $datos['RolsUser'] = Rol::orderBy('id', 'DESC')->get();


        $datos['AllAsiento'] = Asiento::orderBy('id', 'DESC')
                                ->where('id_usuario', Auth::user()->id)->get();


        $datos['AsientoActive'] = Asiento::orderBy('id', 'DESC')
                                    ->where('condicion','!=', 0)
                                    ->where('id_usuario', Auth::user()->id)->get();

        $datos['AsientoInactiveAll'] = Asiento::orderBy('id', 'DESC')
                                        ->where('condicion','==',0)
                                        ->where('id_usuario', Auth::user()->id)->get();
                                        

        $datos['AllCuenta'] = Cuenta::orderBy('id', 'DESC')->get();
        $datos['CuentaActive'] = Cuenta::orderBy('id', 'DESC')->where('condicion','!=', 0)->get();
        $datos['CuentaInactiveAll'] = Cuenta::orderBy('id', 'DESC')->where('condicion','==',0)->get();


        $datos['AllCatAccounts'] = CategoriaCuenta::orderBy('id', 'DESC')->get();

        return view('rols.home', compact('datos'));
    }
}
