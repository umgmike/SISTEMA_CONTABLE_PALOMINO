<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\OficinaContablePalomino\Categoria;
use App\Models\OficinaContablePalomino\Cuenta;
use App\Models\OficinaContablePalomino\Cors;
use App\Models\OficinaContablePalomino\CategoriaCuenta;

use App\Http\Requests\AccountValidate;
use App\Http\Requests\CategoriesValidate;

use App\Http\Requests\EditNaturalezaValidation;
use App\Http\Requests\EditCuentaValidation;

use DB;
use Alert;
use PDF;

class AccountsController extends Controller
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
        $naturaleza = Categoria::orderBy('id')->get();

        $sql = '
            SELECT
                cue.id,
                cat.nombre,
                cue.id_categoria,
                cat_c.nombreCategoria,
                cue.codigoCuenta,
                cue.nombreCuenta,
                cue.condicion,
                cue.created_at
            FROM cuenta cue
            INNER JOIN categoria as cat ON cue.id_categoria = cat.id
            INNER JOIN categoria_cuenta as cat_c ON cue.id_categoria_cuenta = cat_c.id
            ORDER BY cue.id_categoria DESC';
            
        $accounts = DB::select($sql);
        return view('pages.accounts.index', compact('naturaleza', 'accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_c = Categoria::all();
        $a_class = Categoria::all();
        $accounts_a = Cuenta::all();
        $accounts_cat = CategoriaCuenta::all();
        $cors = Cors::all();
        return view('pages.accounts.create', compact('cat_c', 'a_class', 'accounts_a', 'accounts_cat', 'cors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesValidate $request)
    {
        $registro = new Categoria();
        $registro->codigo = $request->codigo;
        $registro->nombre = $request->nombre;
        $registro->save();
        toast('Clasificación de cuenta : '.$registro->nombre.' '. 'creada con éxito','success')->timerProgressBar();
        return redirect()->route('page.create.cuentas');
    }

    public function storeAccount(AccountValidate $request)
    {
        $registro = new Cuenta();
        $registro->id_categoria = $request->id_categoria;
        $registro->id_categoria_cuenta = $request->id_categoria_cuenta;
        $registro->id_cors = $request->id_cors;
        $registro->codigoCuenta = $request->codigoCuenta;
        $registro->nombreCuenta = $request->nombreCuenta;
        $registro->save();
        toast('Cuenta : '.$registro->nombreCuenta.' '. 'creada con éxito','info')->timerProgressBar();
        return redirect()->route('page.create.cuentas');
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
        $data['registro'] = Cuenta::findOrFail($id);
        return view('pages.accounts.edit',$data);
    }


    public function edit_naturaleza($id)
    {
        $data['registro'] = Categoria::findOrFail($id);
        return view('pages.accounts.edit-category',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCuentaValidation $request, $id)
    {
        $registro = Cuenta::findOrFail($id);
        $registro->nombreCuenta = $request->nombreCuenta;
        $registro->save();
        toast('Cuenta : '.$registro->nombreCuenta.' '. 'Actualizado con éxito','success')->timerProgressBar()->autoClose(4500);
        return redirect()->route('page.cuentas');
    }


    public function update_naturaleza(EditNaturalezaValidation $request, $id)
    {
        $registro = Categoria::findOrFail($id);
        $registro->nombre = $request->nombre;
        $registro->save();
        toast('Naturaleza de cuenta : '.$registro->nombre.' '. 'Actualizado con éxito','info')->timerProgressBar()->autoClose(4500);
        return redirect()->route('page.cuentas');
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
            if ($account = Cuenta::findOrFail($id)) {
                $account->condicion = $account->condicion ? '0' : '1';
                $account->update();
                toast('Estado de : '.$account->nombreCuenta.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function nomenclatura_c()
    {

        $report = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 2)
            ->where('cta.id_categoria', '=', 1)
            ->get();

        $report1 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 1)
            ->where('cta.id_categoria', '=', 1)
            ->get();

        $report2 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 2)
            ->where('cta.id_categoria', '=', 2)
            ->get();

        $report3 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 1)
            ->where('cta.id_categoria', '=', 2)
            ->get();

        $report4 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 3)
            ->where('cta.id_categoria', '=', 3)
            ->get();

        $report5 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 4)
            ->where('cta.id_categoria', '=', 4)
            ->get();

        $report6 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 5)
            ->where('cta.id_categoria', '=', 5)
            ->get();

        $report7 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 6)
            ->where('cta.id_categoria', '=', 6)
            ->get();

        $report8 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 7)
            ->where('cta.id_categoria', '=', 7)
            ->get();
 
        $report9 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 8)
            ->where('cta.id_categoria', '=', 8)
            ->get();

        $report10 = DB::table('cuenta AS cta')
            ->join('categoria AS cat', 'cta.id_categoria', '=', 'cat.id')
            ->join('cors AS c', 'cta.id_cors', '=', 'c.id')
            ->join('categoria_cuenta AS cc', 'cta.id_categoria_cuenta', '=', 'cc.id')
            ->select(
                    'cat.nombre',
                    'cta.codigoCuenta',
                    'cta.nombreCuenta'
                    )
            ->where('cta.id_categoria_cuenta', '=', 9)
            ->where('cta.id_categoria', '=', 9)
            ->get();



        $pdf = PDF::loadView('pages.accounts.report', compact('report', 'report1', 'report2', 'report3',  'report4', 'report5', 'report6', 'report7', 'report8', 'report9', 'report10'));
        return $pdf->stream('Nomenclatura de importadora épocas | SYS-JOHHAN.pdf');
    }
}
