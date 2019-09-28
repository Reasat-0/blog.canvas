<?php

namespace App\Http\Controllers;

use App\User;
use App\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        //dd($request);

        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',
            'about'   => 'required',
            'facebook'=> 'required|url'
        ]);


                $user = Auth::user();

                if($request->hasFile('avatar')){

                    $received_image = $request->avatar;
                    $updated_name = time().$received_image->getClientOriginalName();
                    $received_image->move('uploads/avatar/',$updated_name);

                    $user->profile->avatar = 'uploads/avatar/'.$updated_name;

                    $user->profile->save();
                }


                    $user->name = $request->name;
                    $user->email = $request->email;

                    $user->profile->facebook = $request->facebook;
                    //$user->profile->youtube = $request->youtbe;
                    $user->profile->about = $request->about;

                    $user->save();
                    $user->profile->save();


                if($request->has('password'))
                    {
                        $user->password = bcrypt($request->password);
                        $user->save();

                    }



                    session()->flash('success', 'Profile Updated Successfully');

                    return redirect()->back();
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

        $user->profile->delete();
        $user->delete();



        session()->flash('success','The user is deleted permanently ');
        return redirect()->back();
    }
}
