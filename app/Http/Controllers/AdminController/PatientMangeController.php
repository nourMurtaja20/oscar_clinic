<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Mail\AcountMail;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PatientMangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $pateints = Patient::all ();

        return view ('Systems.Admin.patientMange')->with ('pateints', $pateints);
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
        $pass = Str::random (12);
        $count = ['password' => $pass];
        $data = User::create (['name' => $request->name,
            'email' => $request->email,
            'status' => 2,
            'password' => bcrypt ($pass),

        ]);
        $info = User::where ('email', $request->email)->first();
        Patient::create ([
            'user_id' => $info->id,
            'phone' => $request->phone,
            'DataOfBirth' => $request->DataOfBirth,
            'addres' => $request->addres,
            'chronicDiseases' => $request->chronicDiseases,
            'gender'=> $request->gender


        ]);

        Mail::to ($request->email)->send (new AcountMail($count));
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
        $Patient =Patient::find ($id);
        $UserId=$Patient->user_id;
        $user = User::where ('id', $UserId)->first ();
        $user->email = $request->input ('email');
        $Patient->phone=$request->input ('phone');
        $Patient->DataOfBirth=$request->input ('DataOfBirth');
        $Patient->chronicDiseases=$request->input ('chronicDiseases');
        $Patient->addres=$request->input ('addres');

        $Patient->save();
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
        $result = Patient::where ('id', $id)->delete ();
        return redirect ()->back ();
    }
}
