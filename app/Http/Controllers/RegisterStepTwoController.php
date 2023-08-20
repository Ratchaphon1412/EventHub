<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class RegisterStepTwoController extends Controller
{
    //

    public function create(){
        $gender = ['Female','Male','Other'];
        return view('auth.register-step-two',compact('gender'));
    }

    public function store(Request $request){
        auth()->user()->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone' => $request->phone,
            'gender' =>$request->gender,
            'facebook' =>$request->facebook,
            'instagram' =>$request->instagram,
            'line' =>$request->line,
            'age' =>$request->age,
        ]);
        return redirect()->route('login');

    }
}
