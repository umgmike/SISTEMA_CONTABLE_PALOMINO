<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\OficinaContablePalomino\Rol;
use App\Models\OficinaContablePalomino\Usuario;
use App\Http\Requests\UserValidate;
use App\Http\Requests\UserEditValidate;
use App\Http\Requests\passValidate;
use Illuminate\Support\Facades\Hash;
use Alert;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Usuario::with('roles')->orderBy('id_rol', 'ASC')->get();
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users['roles'] = Rol::all();
        return view('pages.users.create', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidate $request)
    {
        $pass = $request->request->add([
            'password' => Hash::make($request->input('password'))
        ]);

        $users = new Usuario();
        $users->id_rol = $request->id_rol;
        $users->nombre = $request->nombre;
        $users->apellido = $request->apellido;
        $users->nit = $request->nit;
        $users->usuario = $request->usuario;
        $users->password = $request->password;
        $users->telefono = $request->telefono;
        $users->save();
        toast('Usuario : '.$users->nombre. ' '. 'creado con éxito','info')->timerProgressBar()->autoClose(4000);
        return redirect()->route('page.create-users');
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
        $data['registro'] = Usuario::findOrFail($id);
        $data['roles'] = Rol::all();
        return view('pages.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditValidate $request, $id)
    {

        $registro = Usuario::findOrFail($id);
        $registro->id_rol = $request->id_rol;
        $registro->nombre = $request->nombre;
        $registro->apellido = $request->apellido;
        $registro->nit = $request->nit;
        $registro->usuario = $request->usuario;
        $registro->telefono = $request->telefono;
        $registro->save();
        toast('Usuario : '.$registro->nombre.' '.$registro->apellido.' '. 'Actualizado con éxito','info')->timerProgressBar()->autoClose(4500);
        return redirect()->route('page.usuarios');
    }

    public function update_pass(passValidate $request, $id)
    {
        $request->request->add([
            'password' => Hash::make($request->input('password'))
        ]);

        $registro = Usuario::findOrFail($id);
        $registro->password = $request->password;
        $registro->save();
        toast('Contraseña de : '.$registro->nombre.' '.$registro->apellido.' '. 'Actualizado con éxito','info')->timerProgressBar()->autoClose(4500);
        return redirect()->route('page.usuarios');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($users = Usuario::findOrFail($id)) {
                $users->condicion = $users->condicion ? '0' : '1';
                $users->update();
                toast('Estado de : '.$users->nombre.' '.$users->apellido.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
