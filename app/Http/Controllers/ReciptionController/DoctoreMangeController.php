<?php

namespace App\Http\Controllers\ReciptionController;

use App\Http\Controllers\Controller;
use App\Mail\AcountMail;
use App\Models\Doctore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DoctoreMangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $doctors = Doctore::all ();

        return view ('Systems.Reciption.DoctorReciption')->with ('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $pass=Str::random(12);
        $count=['password'=>$pass];
       $data= User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'status'=> 0,
            'password' => bcrypt($pass),

        ]);
        $info = User::where ('email', $request->email)->first();
        Doctore::create([
            'UserId' => $info->id,
            'specialization'=>$request->specialization,
            'TimeForWork'=>$request->TimeForWork,
            'addres'=>$request->addres
        ]);

        Mail::to( $request->email)->send(new AcountMail($count));
        return redirect ()->back ();


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {

        $doctore =Doctore::find ($id);
        $UserId=$doctore->UserId;

        $user = User::where ('id', $UserId)->first ();

        $user->email = $request->input('email');
        $doctore->specialization=$request->input ('specialization');

        if ( $request->input ('TimeForWork')==1){
            $doctore->TimeForWork='Saturday - Monday - Wednesday';
        }elseif ($request->input ('TimeForWork')==2){
            $doctore->TimeForWork='Sunday - Tuesday - Thursday';
        }else{
            $doctore->TimeForWork='Full Stack';

        }
        $doctore->save();
        $user->save();
        return redirect()->back ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $result = Doctore::where ('id', $id)->delete ();
        return redirect ()->back ();
    }
}
