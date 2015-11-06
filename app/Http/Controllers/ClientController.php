<?php

namespace autoecole\Http\Controllers;

use autoecole\Autoecoletable;
use autoecole\Client;
use Illuminate\Http\Request;

use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use Illuminate\Html\HtmlFacade;
use Illuminate\Html\FormFacade;
use Illuminate\Support\Facades\Validator;
use Input;
use Redirect;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function __construct(){
        $this->middleware('auth');
    }



    public function index()
    {
            $clients = Client::all();
            return view ('admin.Client.index',compact('clients'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.Client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateClient $request)
    {
       $input = $request->all();
        Client::create($input);
        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $autoecole =  Autoecoletable::all();
        return view('admin.Client.edit')->with(array('client'=> $client,'autoecole'=> $autoecole));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateClient $request, $id)
    {
        $data = Input::except('_method', '_token');
        $client =  Client::find($id);

        $client->update($data);
        $client->save();
        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('client');
    }
}
