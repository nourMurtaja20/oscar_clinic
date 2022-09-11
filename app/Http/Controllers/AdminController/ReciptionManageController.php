<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Mail\AcountMail;
use App\Models\Reciption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Swift_SmtpTransport;

class ReciptionManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Reciptions = Reciption::all ();
        return view ('Systems.Admin.ReciptionMange')->with ('Reciptions', $Reciptions);
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
    public function store (Request $request)
    {

        $pass = Str::random (12);
        $count = (['password' => $pass]);
        $data = User::create (['name' => $request->name,
            'email' => $request->email,
            'status' => 1,
            'password' => bcrypt ($pass),

        ]);
        $info = User::where ('email', $request->email)->first();
//        dd($info);
        Reciption::create ([
            'user_id' => $info->id,
            'phone' => $request->phone,
            'addres' => $request->addres,
        ]);

        Mail::to ('da715097@gmail.com')->send (new AcountMail($count));
        return redirect ()->back ();

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

        $Reciption =Reciption::find ($id);
        $UserId=$Reciption->user_id;
        $user = User::where ('id', $UserId)->first ();
        $user->email = $request->input ('email');
        $Reciption->phone=$request->input ('phone');
        $Reciption->addres=$request->input ('addres');

        $Reciption->save();
        $user->save();
        return redirect()->back ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result =  $Reciption =Reciption::find ($id);
        $UserId=$Reciption->user_id;
        $user = User::where ('id', $UserId)->first ()->delete();
        $result->delete();


        return redirect ()->back ();
    }
}
