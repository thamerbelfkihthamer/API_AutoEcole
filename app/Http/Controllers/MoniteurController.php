<?php

namespace autoecole\Http\Controllers;

use autoecole\Moniteur;
use Illuminate\Http\Request;
use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use Input;

class MoniteurController extends Controller
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
        //
        $moniteurs = Moniteur::all();
        return view('admin.Moniteur.index',compact('moniteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Moniteur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreMoniteurRequest $request)
    {
        //
        $input = $request->all();
        Moniteur::create($input);
        return redirect('moniteur');
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
        $moniteur = Moniteur::find($id);
        return view('admin.moniteur.edit',compact('moniteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreMoniteurRequest $request, $id)
    {
        //
        $data = Input::except('_method', '_token');
        $moniteur =  Moniteur::find($id);

        $moniteur->update($data);
        $moniteur->save();
        return redirect('moniteur');
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
        $moniteur = Moniteur::find($id);
        $moniteur->delete();
        return redirect('moniteur');
    }
}
