<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OficinaContablePalomino\Regimen;
use App\Models\OficinaContablePalomino\Empresa;
use App\Models\OficinaContablePalomino\Contribuyente;
use Alert;

class EmpresasController extends Controller
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
        $empresas = Empresa::with('regimenes')->orderBy('id_regimen', 'ASC')->get();
        return view('pages.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regimen = Regimen::all();
        $contribuyente = Contribuyente::all();
        return view('pages.empresas.create', compact('regimen', 'contribuyente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $registro = new Empresa();
        $registro->id_regimen = $request->id_regimen;
        $registro->id_contribuyente = $request->id_contribuyente;
        $registro->nit = $request->nit;
        $registro->anyo_contable = $request->anyo_contable;
        $registro->nombre_establecimiento = $request->nombre_establecimiento;
         $registro->descripcion = $request->descripcion;
        $registro->save();
        toast('Empresa: '. $registro->nombre_establecimiento.' '. 'creada con éxito','success')->timerProgressBar()->autoClose(4500);
        return redirect()->route('page.empresas.create');
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
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($empresa = Empresa::findOrFail($id)) {
                $empresa->condicion = $empresa->condicion ? '0' : '1';
                $empresa->update();
                toast('Estado de : '.$empresa->nombre_establecimiento.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
