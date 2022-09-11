<?php

namespace App\Http\Controllers\DoctoreController;

use App\Http\Controllers\Controller;
use App\Models\Appintment;
use App\Models\Doctore;
use App\Models\Note;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\Auth;

class AppointmentDoctoreMandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $user=Auth::user();
        $doctors=Doctore::where('UserId',$user->id)->get();

        foreach($doctors as $doctor)

        $Appointments=Appintment::where('doctorID',$doctor->id)->get();
//        dd($Appointments);
        return view ('Systems.Doctor.AppointmentManageDoctore',compact ('Appointments'));

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
        //
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
        $appointment =Appintment::find ($id);
        $appointment->status=$request->input ('status');
       $n= Note::create ([
            'noteText' => $request->input ('noteText'),
            'appintment_id'=>$id
        ]);
        $appointment->save();
        $n->save();
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
//        $reson=$request->input ('reson');
        $result = Appintment::where ('id', $id)->delete();
        return redirect()->back ();
    }
}
