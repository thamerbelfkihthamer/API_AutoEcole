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
        $reservedcar = DB::table('cours')->lists('vehicules_id');
        list($keys,$valuecar) = array_divide($reservedcar);
        $freecar = DB::table('vehicules')->whereNotIn('id',$valuecar)->get();

        $cl= DB::table('client_cours')->lists('client_id');
        list($keys, $values) = array_divide($cl);
        $freeclient =  DB::table('client')->whereNotIn('id',$values)->get();

        $moniteurs = Moniteur::all();

        //get not reserved monitor
        /*
        $reservemonitor = DB::table('cours')->lists('moniteur_id');
        list($keys,$valuemonitor) = array_divide($reservemonitor);
        $freemonitor = DB::table('moniteur')->whereNotIn('id',$valuemonitor)->get();
        */

           return view('admin.cours.index')->with(array(
               'clients'=> $freeclient,
               'cars'=>$freecar,
               'moniteurs'=>$moniteurs
           ));
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

            if($type=="conduite"){
                $client_id = $data['client_id'];
                $conduitdata = Input::only('type','vehicules_id','moniteur_id','starttime','endtime');
                $id = DB::table('cours')->insertGetId($conduitdata);
                $cour = Cours::find($id);
                $cour->clients()->attach($client_id);
                return response()->json([
                    'success' => $id,
                ]);
            }

            if($type=="code"){
                $client_id = $data['client_id'];
                $conduitdata=Input::only('type','moniteur_id','starttime','endtime');
                $id = DB::table('cours')->insertGetId($conduitdata);
                $cour = Cours::find($id);
                $cour->Clients()->attach($client_id);
                return response()->json([
                    'success' => $client_id,
                ]);
            }
        }


    }

    public function fullcalanderevent(){

        if(Request::ajax()){
            return Cours::all();
        }
    }

    public function getCondidat(){

        if(Request::ajax()){
            $data = Input::all();
            $idcour = $data['eventid'];
            $cour = Cours::findOrNew($idcour);
            $courclient = Cours::find($idcour)->clients()->get();
            $courmoniteur = Cours::find($idcour)->moniteur()->get();
            $courcar = Cours::find($idcour)->vehicule()->get();

            return response()->json([
                'success' => $courclient,
                'moniteur'=>$courmoniteur,
                'car'=>$courcar,
                'cour'=>$cour,
            ]);
        }
    }
}
