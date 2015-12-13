<?php

namespace autoecole\Http\Controllers;

use Illuminate\Http\Request;

use autoecole\Http\Requests;
use autoecole\Http\Controllers\Controller;
use autoecole\User;
use autoecole\Role;
use Input;
class SuperAdminController extends Controller
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
       $owner = User::whereHas('roles',function($q){
          $q->where('name','=','owner');
       })->get();
        $manager = User::whereHas('roles',function($q){
            $q->where('name','=','manager autoecole');
        })->get();
        $employe = User::whereHas('roles',function($q){
            $q->where('name','=','simple autoecole employe');
        })->get();
        return view('admin/superadmin.index')->with(array(
            'owner'=>$owner,
            'manager'=>$manager,
            'employe'=>$employe,
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/superadmin.createadmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Createadmin $data)
    {
        $role = $data['roles_id'];
        if($role == 1){
            // traitement owner
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            $user = User::where('name','=',$data['name'])->first();
            $owner = Role::where('id','=','1')->first();
            $user->attachRole($owner);

            return redirect('superadmin');
        }
        else if ($role == 2){
            // traitement managment
             User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            $user = User::where('name','=',$data['name'])->first();
            $manager = Role::where('id','=','2')->first();
            $user->attachRole($manager);


            return redirect('superadmin');
        }
        else if($role == 3){
            // traitement employe
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $user = User::where('name','=',$data['name'])->first();
            $employe = Role::where('id','=','3')->first();
            $user->attachRole($employe);
            return redirect('superadmin');
        }
        else{
            return redirect('superadmin');
        }



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
        $user = User::find($id);
        return view('admin.superadmin.editadmin',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Input::except('_method', '_token');
        $user =User::find($id);
        $user->detachAllRoles();
        $role_id = $data['roles_id'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->attachRole($role_id);
        $user->save();
        return redirect('superadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('superadmin');
    }
}
