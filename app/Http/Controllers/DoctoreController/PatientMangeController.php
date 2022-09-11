<?php

namespace App\Http\Controllers\DoctoreController;

use App\Http\Controllers\Controller;
use App\Mail\AcountMail;
use App\Models\Appintment;
use App\Models\Doctore;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $n = Auth::user ()->id;
        $doc = Doctore::where ('UserId', $n)->get ();
        foreach ($doc as $item)
            $countPatinnt = Appintment::all();

        $informations = Appintment::where ('doctorID', $item->id)->distinct ('patientID')->get ();
//        dd($informations);

        return view ('Systems.Doctor.patientMange', compact ('countPatinnt','informations'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $result = Appintment::where ('id', $id)->delete();

//        $result = Patient::where ('id', $id)->delete ();
        return redirect ()->back ();
    }
}
