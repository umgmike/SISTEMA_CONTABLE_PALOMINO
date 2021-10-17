<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\OficinaContablePalomino\Cuenta;
use App\Models\OficinaContablePalomino\Inventario;

use Alert;
use PDF;
use Carbon\Carbon;
use DB;


class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventarios = DB::table('inventario_final AS i')
            ->join('usuario AS u', 'i.id_usuario', '=', 'u.id')
            ->select(
                'u.usuario',
                'i.id_usuario',
                'i.monto_total',
                'i.fecha_inventario',
                'i.descripcion',
                'i.condicion'
                )
            ->where('i.id_usuario', Auth::user()->id)
            ->get();

        return view('pages.inventario.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuenta = Cuenta::all();
        $inventario = Inventario::orderBy('id')->get();
        return view('pages.inventario.create', compact('cuenta', 'inventario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){

            Inventario::create($request->all());

            $main = Inventario::latest('id')->first();
            $main->id_usuario = Auth::user()->id;
            $main->save();

            $table = [];
            $uno = '0';
            $tres = '2';
            $cuatro = '4';
            for ($i= 0; $i < 1; $i++) {
                foreach($request->tab as $reg){
                    $table[] = [
                        'id_inventario'  => $data->id,
                        'id_cuenta'  => $reg[$cuatro],
                        'sub_total'  => $reg[$tres],
                    ];
                }
            }


            Db::table('detalle_inventario')->insert($table);
            toast('Partida No. '.' '. 'almacenada con éxito','success')->timerProgressBar();
            return response()->json([
                "mensaje" => $request->all()
            ]);
        }
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
