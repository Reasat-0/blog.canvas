<?php

namespace App\Http\Controllers;

use App\profile;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('Admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.userView')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'password'=> 'required',
            'email'=> 'required|email',
            'avatar'=> 'required|image'

        ]);

        $user = User::create([

            'name' => $request->name,
            'password'  => bcrypt($request->password),
            'email'     => $request->email

        ]);

        if($request->hasFile('avatar')){

            $received_image = $request->avatar;
            $updated_name = time().$received_image->getClientOriginalName();
            $received_image->move('uploads/avatar/',$updated_name);



        $profile = profile::create([

            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatar/'.$updated_name

        ]);

        }
        session()->flash('success', 'User Is created');
        return redirect()->route('user.view');


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
        //
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
    }




    public function make_admin($id){

        $user_id = User::find($id);

        $user_id->admin = 1;
        $user_id->save();

        session()->flash('success', 'Successfully made admin');
        return redirect()->route('user.view');

    }


    public function to_no_admin($id){

        $user_id = User::find($id);

        $user_id->admin = 0;
        $user_id->save();

        session()->flash('success', 'Adminship Canceled');
        return redirect()->route('user.view');

    }

}