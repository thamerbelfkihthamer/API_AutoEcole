<?php

namespace autoecole\Http\Controllers;

use autoecole\Autoecoletable;
use autoecole\Client;
use autoecole\Cours;
use autoecole\Moniteur;
use autoecole\Vehicules;
//use Illuminate\Http\Request;
use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Input;
use Request;

class CoursController extends Controller
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
        $cours = Cours::all();
        $clients = Client::all();
        $car = Vehicules::all();
        $moniteurs = Moniteur::all();
       return view('admin.cours.index')->with(array('cours'=> $cours,'clients'=> $clients,'cars'=>$car,'moniteurs'=>$moniteurs));

/*
        return response()->json([
            'data' => $cours,
        ]);

        */


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $autoecole =  Autoecoletable::all();
        $vehicules =  Vehicules::all();
        return view('admin.cours.create')->with(array('vehicules'=> $vehicules,'autoecole'=> $autoecole));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$input = $request->all();
        //dd($input);
        //Cours::create($input);
        //return redirect('cours');

        //check if its our form
        /*
        if (Request::ajax()) {
            /* Ton traitement ici
            return response()->json([
                'success' => 'success message',
            ]);
        }
*/

        $client_ids=array(1,2);
        $cour = Cours::find(1);
        $cour->clients()->attach($client_ids);
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
        $cour = Cours::find($id);
        $autoecole =  Autoecoletable::all();
        $vehicules = Vehicules::all();
        return view('admin.cours.edit')->with(array('cour'=> $cour,'autoecole'=> $autoecole,'vehicules'=>$vehicules));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreCoursRequest $request, $id)
    {
        //
        $data = Input::except('_method', '_token');
        $cour =  Cours::find($id);
        $cour->update($data);
        $cour->save();
        return redirect('cours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cour = Cours::find($id);
        $cour->delete();
        return redirect('cours');

    }

    public function send(){

        if (Request::ajax()) {
            $data  =  Input::all();
            $type=$data['type'];
            $client_id = $data['client_id'];
            if($type=="conduite"){
                $conduitdata = Input::only('type','vehicules_id','starttime','endtime');
                $id = DB::table('cours')->insertGetId($conduitdata);
                $cour = Cours::find($id);
                $cour->clients()->attach($client_id);
                return response()->json([
                    'success' => $id,
                ]);
            }

            if($type=="code"){

            }
        }


    }

    public function fullcalanderevent(){
        $data = Cours::all();

        return response()->json([
           'data' =>$data,
        ]);


    }
}
