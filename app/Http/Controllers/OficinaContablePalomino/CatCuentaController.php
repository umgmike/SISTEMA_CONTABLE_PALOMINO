<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\OficinaContablePalomino\CategoriaCuenta;

use App\Http\Requests\CatCuentaValidation;

use Alert;

class CatCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catCuenta = CategoriaCuenta::orderBy('id')->get();
        return view('pages.categoriasCuenta.index', compact('catCuenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categoriasCuenta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatCuentaValidation $request)
    {
        $registro = new CategoriaCuenta();
        $registro->nombreCategoria = $request->nombreCategoria;
        $registro->save();
        toast('Categoría de cuenta : '.$registro->nombreCategoria.' '. 'creada con éxito','success')->timerProgressBar()->autoClose(4500);
        return redirect()->route('cat.create');
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
        $data['registro'] = CategoriaCuenta::findOrFail($id);
        return view('pages.categoriasCuenta.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatCuentaValidation $request, $id)
    {
        $registro = CategoriaCuenta::findOrFail($id);
        $registro->nombreCategoria = $request->nombreCategoria;
        $registro->save();
        toast('Categoría de cuenta : '.$registro->nombreCategoria.' '. 'Actualizado con éxito','info')->timerProgressBar()->autoClose(4500);
        return redirect()->route('cat.list');
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
