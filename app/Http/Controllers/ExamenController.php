<?php

namespace autoecole\Http\Controllers;

use autoecole\Autoecoletable;
use autoecole\Client;
use autoecole\Examens;
//use Illuminate\Http\Request;
use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use autoecole\Moniteur;
use autoecole\Vehicules;
use Input;
use Request;
use Illuminate\Support\Facades\DB;
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
        $car = Vehicules::all();
        $clients = Client::all();
        $moniteurs = Moniteur::all();

        return view('admin.examen.index')->with(array(
                     'clients'=>$clients,
                      'moniteurs'=>$moniteurs,
                       'cars'=>$car,
                      ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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
        /*
        $examen = Examens::find($id);
        $examen->delete();
        return redirect('examen');

        */

    }

    public function addexamen(){

        if (Request::ajax()) {
            $data  =  Input::all();
            $type=$data['type'];

            if($type=="conduite"){
                $client_id = $data['client_id'];
                $conduitdata = Input::only('type','vehicules_id','moniteur_id','starttime','endtime');
                $id = DB::table('examens')->insertGetId($conduitdata);
                $examen = Examens::find($id);
                $examen->clients()->attach($client_id);
                return response()->json([
                    'success' => $id,
                ]);


            }

            if($type=="code"){
                $client_id = $data['client_id'];
                $conduitdata=Input::only('type','moniteur_id','starttime','endtime');
                $id = DB::table('examens')->insertGetId($conduitdata);
                $examen = Examens::find($id);
                $examen->Clients()->sync($client_id);

                return response()->json([
                    'success' => $client_id,
                ]);
            }
        }
    }

    public function getexamen(){

        if(Request::ajax()){
            return Examens::all();
        }
    }

    public function getcondidatsexamen(){

        if(Request::ajax()){
            $data = Input::all();
            $type = $data['type'];
            if($type=="code"){
                $idexamen = $data['eventid'];
                $examen = Examens::findOrNew($idexamen);
                $condidats=Examens::find($idexamen)->clients()->get();
                $examinateur = Examens::find($idexamen)->moniteur()->get();
                return response()->json([
                   'condidats'=>$condidats,
                    'examinateur'=>$examinateur,
                    'examen'=>$examen,
                    'idexamen'=>$idexamen,
                ]);
            }
            if($type=="conduite"){
                $idexamen = $data['eventid'];
                $examen = Examens::findOrNew($idexamen);
                $condidats = Examens::find($idexamen)->clients()->get();
                $moniteur= Examens::find($idexamen)->moniteur()->get();
                $vehicule = Examens::find($idexamen)->vehicule()->get();

                return response()->json([
                    'condidats' =>$condidats,
                    'examinateur' =>$moniteur,
                    'vehicule'=>$vehicule,
                    'examen'=>$examen,
                    'idexamen'=>$idexamen,
                ]);
            }
        }
    }
}
