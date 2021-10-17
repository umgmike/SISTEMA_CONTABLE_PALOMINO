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
                'i.id',
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

        $fecha = Carbon::now();

        if($request->ajax()){

            $request->request->add(['fecha_inventario' => $fecha]);

            Inventario::create($request->all());

            $data = Inventario::latest('id')->first();

            $table = [];
            $uno = '0';
            $dos = '1';
            $tres = '3';
            for ($i= 0; $i < 1; $i++) {
                foreach($request->tab as $reg){
                    $table[] = [
                        'id_inventario'  => $data->id,
                        'id_cuenta'  => $reg[$tres],
                        'sub_total'  => $reg[$dos],
                    ];
                }
            }

            Db::table('detalle_inventario')->insert($table);
            toast('Inventario. '.' '. 'almacenado con éxito','success')->timerProgressBar();
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
        $inventario = DB::table('inventario_final')->where('id', '=', $id)->first();

        $sql = '

            SELECT
                i.fecha_inventario,
                cat.codigo,
                cue.codigoCuenta,
                cue.nombreCuenta,
                det.sub_total,
                0 as subtotal
            FROM inventario_final i
            INNER JOIN detalle_inventario as det ON i.id = det.id_inventario
            INNER JOIN cuenta as cue ON det.id_cuenta = cue.id
            INNER JOIN categoria as cat ON cue.id_categoria = cat.id
            WHERE i.id='.$id;

        $detalle = DB::select($sql);

        $totalInventario = 0;

        foreach ($detalle as $key => $value) {
            $subtotal = ($detalle[$key]->sub_total);
            $detalle[$key]->subtotal = $subtotal;
            $totalInventario += $subtotal;

        }

        return view('pages.inventario.view', compact('inventario', 'detalle', 'totalInventario'));
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
            if ($inventory = Inventario::findOrFail($id)) {
                $inventory->condicion = $inventory->condicion ? '0' : '1';
                $inventory->update();
                toast('Estado inventario. : '.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
