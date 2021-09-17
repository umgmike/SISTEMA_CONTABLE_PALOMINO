<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\OficinaContablePalomino\Cuenta;
use App\Models\OficinaContablePalomino\Asiento;
use App\Models\OficinaContablePalomino\DetalleAsiento;
use App\Models\OficinaContablePalomino\RelBitacora;

use Alert;
use PDF;
use Carbon\Carbon;
use DB;

class AsientoController extends Controller
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

    public function index_activar()
    {
        $dato['AsientoActives'] = Asiento::orderBy('id')
                                    ->where('condicion','!=', 0)
                                    ->where('id_usuario', Auth::user()->id)->get();

        $dato['AsientoInactiveAlls'] = Asiento::orderBy('id')
                                        ->where('condicion','==',0)
                                        ->where('id_usuario', Auth::user()->id)->get();

        $asientos_a = Asiento::orderBy('id')->where('id_usuario', Auth::user()->id)->get();
        return view('pages.asientos-activos.activar', compact('asientos_a', 'dato'));
    }


    public function index()
    {
        $datos['AsientoActive'] = Asiento::orderBy('id')
                                    ->where('condicion','!=', 0)
                                    ->where('id_usuario', Auth::user()->id)->get();

        $datos['AsientoInactiveAll'] = Asiento::orderBy('id')
                                        ->where('condicion','==',0)
                                        ->where('id_usuario', Auth::user()->id)->get();


        $asientos_c = DB::table('asiento AS a')
            ->select(
                'a.id',
                'a.id_usuario',
                'a.numero_partida',
                'a.total_debe',
                'a.total_haber',
                'a.condicion',
                DB::raw('DATE_FORMAT(a.fecha_asiento, "%d-%m-%Y") AS someDate'),
                DB::raw('DATE_FORMAT(a.created_at, "%d-%m-%Y %H:%m:%s") AS someDate2'),
                )
            ->where('a.id_usuario', Auth::user()->id)
            ->orderBy('a.numero_partida', 'ASC')
            ->get();

        return view('pages.asientos.index', compact('asientos_c', 'datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rel_bitacora = RelBitacora::orderBy('id')
        ->where('id_usuario', Auth::user()->id)->get();
        $daily = Cuenta::all();
        $CuentaAsiento = Asiento::all();
        $asientos_c = Asiento::orderBy('id')->where('id_usuario', Auth::user()->id)->get();
        return view('pages.asientos.create', compact('daily','CuentaAsiento', 'asientos_c', 'rel_bitacora'));
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

            Asiento::create($request->all());

            $data = Asiento::latest('id')->first();
            $data->id_usuario = Auth::user()->id;
            $data->save();

            $bitacora = new RelBitacora(); // Crea objeto
            $bitacora->partida = $request->input('numero_partida');
            $bitacora->id_usuario = Auth::user()->id;
            $bitacora->save(); // guarda el registro

            $table = [];
            $uno = '0';
            $dos = '1';
            $tres = '2';
            $cuatro = '4';
            for ($i= 0; $i < 1; $i++) {
                foreach($request->tab as $reg){
                    $table[] = [
                        'id_asiento'  => $data->id,
                        'id_cuenta'  => $reg[$cuatro],
                        'debe'  => $reg[$dos],
                        'haber'  => $reg[$tres],
                    ];
                }
            }


            Db::table('detalle_asiento')->insert($table);
            toast('Partida No. '.$data->numero_partida.' '. 'almacenada con éxito','success')->timerProgressBar();
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

        $asiento = DB::table('asiento')->where('id', '=', $id)->first();

        $sql = '

            SELECT
                a.numero_partida,
                cat.codigo,
                cue.codigoCuenta,
                cue.nombreCuenta,
                det.debe,
                det.haber,
                0 as subtotal
            FROM asiento a
            INNER JOIN detalle_asiento as det ON a.id = det.id_asiento
            INNER JOIN cuenta as cue ON det.id_cuenta = cue.id
            INNER JOIN categoria as cat ON cue.id_categoria = cat.id
            WHERE a.id='.$id;

        $detalle = DB::select($sql);

        $totalDebe = 0;
        $totalHaber = 0;

        foreach ($detalle as $key => $value) {
            $subtotal = ($detalle[$key]->debe);
            $detalle[$key]->subtotal = $subtotal;
            $totalDebe += $subtotal;

        }

        foreach ($detalle as $key2 => $value) {
            $subtotal = ($detalle[$key2]->haber);
            $detalle[$key2]->subtotal = $subtotal;
            $totalHaber += $subtotal;

        }

        return view('pages.asientos.detalle_asiento', compact('asiento', 'detalle', 'totalDebe', 'totalHaber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asientos = DB::table('asiento')->where('id', '=', $id)->first();
        $registro = Asiento::findOrFail($id);
        $accounts = Cuenta::all();

        $asientos_c = Asiento::orderBy('id')->where('id_usuario', Auth::user()->id)->get();

        $sql = '

            SELECT
                det.id_cuenta,
                cue.nombreCuenta,
                det.debe,
                det.haber,
                0 as subtotal
            FROM asiento a
            INNER JOIN detalle_asiento as det ON a.id = det.id_asiento
            INNER JOIN cuenta as cue ON det.id_cuenta = cue.id
            WHERE a.id= '.$id;

        $detalle = DB::select($sql);

        $totalDebe = 0;
        $totalHaber = 0;

        foreach ($detalle as $key => $value) {
            $subtotal = ($detalle[$key]->debe);
            $detalle[$key]->subtotal = $subtotal;
            $totalDebe += $subtotal;

        }

        foreach ($detalle as $key2 => $value) {
            $subtotal = ($detalle[$key2]->haber);
            $detalle[$key2]->subtotal = $subtotal;
            $totalHaber += $subtotal;

        }

        return view('pages.asientos-editar.edit', compact('asientos', 'registro', 'accounts', 'detalle', 'asientos_c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){

            Asiento::create($request->all());
            $data = Asiento::latest('id')->first();
            $data->id_usuario = Auth::user()->id;
            $data->save();
            $table = [];
            $uno = '0';
            $dos = '1';
            $tres = '2';
            $cuatro = '4';
            for ($i= 0; $i < 1; $i++) {
                foreach($request->tab as $reg){
                    $table[] = [
                        'id_asiento'  => $data->id,
                        'id_cuenta'  => $reg[$cuatro],
                        'debe'  => $reg[$dos],
                        'haber'  => $reg[$tres],
                    ];
                }
            }

            Db::table('detalle_asiento')->insert($table);
            toast('Partida No. '.$data->numero_partida.' '. 'editada con éxito','info')->timerProgressBar();
            return response()->json([
                "mensaje" => $request->all()
            ]);
        }
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
            if ($asiento = Asiento::findOrFail($id)) {
                $asiento->condicion = $asiento->condicion ? '0' : '1';
                $asiento->update();
                toast('Estado de Partida No. : '.$asiento->numero_partida.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }


    public function pdf_asiento()
    {

        $partida = DB::table('detalle_asiento AS det')
            ->join('asiento AS a', 'det.id_asiento', '=', 'a.id')
            ->join('cuenta AS c', 'det.id_cuenta', '=', 'c.id')
            ->join('categoria AS cat', 'c.id_categoria', '=', 'cat.id')
            ->select(
                    'det.id_asiento',
                    'a.numero_partida',
                    'a.id_usuario',
                    DB::raw('DATE_FORMAT(a.fecha_asiento, "%d-%m-%Y") AS fecha_asiento'),
                    'c.codigoCuenta',
                    'c.nombreCuenta',
                    'det.debe',
                    'det.haber',
                    'a.descripcion',
                    'a.condicion'
                    )
            ->orderBy('det.id_asiento', 'ASC')
            ->orderBy('det.debe', 'DESC')
            ->where('a.id_usuario', Auth::user()->id)->get();

        $pdf = PDF::loadView('pages.asientos.pdf-asiento', compact('partida'));
        return $pdf->stream('Libro diario.pdf');
    }

    public function pdf_asiento_download()
    {

        $partida = DB::table('detalle_asiento AS det')
            ->join('asiento AS a', 'det.id_asiento', '=', 'a.id')
            ->join('cuenta AS c', 'det.id_cuenta', '=', 'c.id')
            ->join('categoria AS cat', 'c.id_categoria', '=', 'cat.id')
            ->select(
                    'det.id_asiento',
                    'a.numero_partida',
                    'a.id_usuario',
                    DB::raw('DATE_FORMAT(a.fecha_asiento, "%d-%m-%Y") AS fecha_asiento'),
                    'c.codigoCuenta',
                    'c.nombreCuenta',
                    'det.debe',
                    'det.haber',
                    'a.descripcion',
                    'a.condicion'
                    )
            ->orderBy('det.id_asiento', 'ASC')
            ->orderBy('det.debe', 'DESC')
            ->where('a.id_usuario', Auth::user()->id)->get();

        $pdf = PDF::loadView('pages.asientos.pdf-asiento', compact('partida'));
        return $pdf->download('Libro diario.pdf');
    }
}
