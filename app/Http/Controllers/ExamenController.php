<?php

namespace autoecole\Http\Controllers;

use autoecole\Autoecoletable;
use autoecole\Examens;
//use Illuminate\Http\Request;
use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use Input;
use Request;

class ExamenController extends Controller
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
        $examens = Examens::has('autoecole')->get();
        return view('admin.examen.index', compact('examens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$autoecole = Autoecoletable::all();
        //return view('admin.examen.create',compact('autoecole'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreExamenRequest $request)
    {
        //$input = $request->all();
        //Examens::create($input);
        //return redirect('examen');

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
        $examen = Examens::find($id);
        $autoecole =  Autoecoletable::all();
        return view('admin.examen.edit')->with(array('examen'=> $examen,'autoecole'=> $autoecole));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreExamenRequest $request, $id)
    {
        $data = Input::except('_method', '_token');
        $examen =  Examens::find($id);
        $examen->update($data);
        $examen->save();
        return redirect('examen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examen = Examens::find($id);
        $examen->delete();
        return redirect('examen');

    }

    public function send(){

       if(Request::ajax()){
           $data = Input::all();
          // Examens::create($data);
           return response()->json([
               'success' => $data,
           ]);
       }
    }
}
