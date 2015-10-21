<?php

namespace autoecole\Http\Controllers;

use autoecole\Autoecoletable;
use autoecole\Vehicules;
use Illuminate\Http\Request;
use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use Input;

class VehiculesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $vehicules = Vehicules::all();
        return view('admin.vehicules.index', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $autoecole = Autoecoletable::all();
        return view('admin.vehicules.create',compact('autoecole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreVehiculesRequest $request)
    {
        //
        $input = $request->all();
        Vehicules::create($input);
        return redirect('vehicules');
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
        $vehicule = Vehicules::find($id);
        $autoecole =  Autoecoletable::all();
        return view('admin.vehicules.edit')->with(array('vehicule'=> $vehicule,'autoecole'=> $autoecole));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreVehiculesRequest $request, $id)
    {
        //
        $data = Input::except('_method', '_token');
        $vehicule =  Vehicules::find($id);
        $vehicule->update($data);
        $vehicule->save();
        return redirect('vehicules');
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
        $vehicule = Vehicules::find($id);
        $vehicule->delete();
        return redirect('vehicules');
    }
}
