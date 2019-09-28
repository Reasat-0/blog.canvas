<?php

namespace App\Http\Controllers;

use App\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct(){

        $this->middleware('Admin');


    }


    public function index(){
        return view('admin.settings.setting')->with('setting',Setting::first());
    }
    public function update(){

        $this->validate(request(),[

            'site_name' => 'required',
            'site_email' => 'required',
            'site_contact' => 'required',
            'site_address' => 'required',

        ]);
        $settings = Setting::first();

        $settings->site_name = request()->site_name;
        $settings->site_email = request()->site_email;
        $settings->site_contact = request()->site_contact;
        $settings->site_address = request()->site_address;


        $settings->save();

        session()->flash('success', 'Settings for this site updated');

        return redirect()->back();


    }
}
