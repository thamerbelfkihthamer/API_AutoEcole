<?php

namespace autoecole\Http\Controllers;

 use autoecole\Autoecoletable;
use Illuminate\Http\Request;
use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use Input;

class AutoecoleController extends Controller
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
        $autoecoles = Autoecoletable::all();
        return view('admin.autoecole.index', compact('autoecoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.autoecole.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreAutoecoleRequest $request)
    {
        //
        $input = $request->all();
        Autoecoletable::create($input);
        return redirect('autoecole');
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
        $autoecole = Autoecoletable::find($id);
        return view('admin.autoecole.edit', compact('autoecole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreAutoecoleRequest $request, $id)
    {
        //
        $data = Input::except('_method', '_token');
        $autoecole =  Autoecoletable::find($id);
        $autoecole->update($data);
        $autoecole->save();
        return redirect('autoecole');
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
        $autoecole = Autoecoletable::find($id);
        $autoecole->delete();
        return redirect('autoecole');
    }
}
