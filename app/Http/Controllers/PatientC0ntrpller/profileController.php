<?php

namespace App\Http\Controllers\PatientC0ntrpller;

use App\Http\Controllers\Controller;
use App\Models\Appintment;
use App\Models\Note;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $patients=Patient::where('user_id',$user->id)->get();
        foreach ($patients as $patient)
        $appointments=Appintment::where('patientID',$patient->id)->orderBy('start', 'ASC')->get();

        return view ('Systems.patients.patientProfile',compact ('patients','appointments'));

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
    public function update(Request $request, $id)
    {
        $Patient =Patient::find ($id);
        $UserId=$Patient->user_id;
        $user = User::where ('id', $UserId)->first ();
        $user->email = $request->input ('email');
        $Patient->phone=$request->input ('phoneno');
        $Patient->addres=$request->input ('address');

        $Patient->save();
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
        $result = Appintment::where ('id', $id)->get ();
        foreach ($result as $item)
            if ($item->status == 1) {
                Note::where ('appintment_id', $item->id)->delete ();
                $item->delete ();
            }
        Appintment::where ('id', $id)->delete();
        return redirect ()->back ();
    }
}
