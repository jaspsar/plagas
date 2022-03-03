<?php

namespace App\Http\Controllers;

use App\Models\Plagas;
use Illuminate\Http\Request;

class PlagasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['plagas']=Plagas::paginate(5);
        return view('plagas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plagas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $campos=[
            'Nombre'=>'required|string|max:255',
            'Ingrediente'=>'required|string',
            'Concentracion'=>'required|integer|max:100',
                'fecha'=>'required',
            

        ];
        $mensaje=[
            'required'=>'EL :attribute es requerido'
        ];
         
        //if ($request->fecha >= now()->toDateString()){
        //    $campos=['fecha'=>'required|date',];
        //    $mensaje=['fecha.required'=> 'Fecha invalida'];

        //}
        //$now->format('d-m-Y');
        //if ($request->fecha >= $now) {
        //    $campos=['fecha'=>'required|date',];
        //    $mensaje=['fecha.required'=> 'Fecha invalida'];
        //}




        $this->validate($request, $campos, $mensaje);
        //$datosPlagas = request()->all();
        $datosPlagas = request()->except('_token');
        Plagas::insert($datosPlagas);

        //return response()->json($datosPlagas);
        return redirect('plagas')->with('mensaje','Plaguicida agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plagas  $plagas
     * @return \Illuminate\Http\Response
     */
    public function show(Plagas $plagas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plagas  $plagas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plaga=Plagas::findorfail($id);
        return view('plagas.editable', compact('plaga'));
        //return redirect('plagas')->with('mensaje','Plaguicida Editado correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plagas  $plagas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $campos=[
            'Nombre'=>'required|string|max:255',
            'Ingrediente'=>'required|string',
            'Concentracion'=>'required|integer|max:100',
            'fecha'=>'required',
            

        ];
        $mensaje=[
            'required'=>'EL :attribute es requerido'
        ];
            //if ($request->fecha >= now()->toDateString()){
            //$campos=['fecha'=>'required|date',];
            //$mensaje=['fecha.required'=> 'Fecha invalida'];

        //}
        $this->validate($request, $campos, $mensaje);


        $datosPlagas = request()->except(['_token','_method']);
        Plagas::where('id','=',$id)->update($datosPlagas);

        $plaga=Plagas::findorfail($id);
        //return view('plagas.editable', compact('plaga'));
        //$datos['plagas']=Plagas::paginate(5);
        //return view('plagas.index', $datos);
        return redirect('plagas')->with('mensaje','Plaguicida Editado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plagas  $plagas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //$plaga=Plagas::findorfail($id);

        //if(Storage::delete('public'.$plaga->Foto));{}


        Plagas::destroy($id);
        //return redirect('plagas');
        return redirect('plagas')->with('mensaje','Plaguicida Eliminado correctamente');
    }
}
