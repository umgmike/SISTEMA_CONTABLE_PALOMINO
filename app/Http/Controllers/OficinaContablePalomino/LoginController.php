<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\OficinaContablePalomino\Empresa;

class LoginController extends Controller
{   

    use AuthenticatesUsers;
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'usuario';
    }

    public function index(){
        $ltsEmpresa = Empresa::all();
        return view('auth.login', compact('ltsEmpresa'));
    }

}
