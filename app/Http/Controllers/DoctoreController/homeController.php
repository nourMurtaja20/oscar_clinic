<?php

namespace App\Http\Controllers\DoctoreController;

use App\Http\Controllers\Controller;
use App\Models\Appintment;
use App\Models\Doctore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $n = Auth::user ()->id;
        $doctors = Doctore::where ('UserId', $n)->get ();
        foreach ($doctors as $doctor) $Appointments = Appintment::where ('doctorID', $doctor->id)->get ();
        $countPatinnt = DB::table ('appointments')->distinct ('patientID')->count ('patientID');

        $notifications = User::first()->Notifications;
        $users = User::all ();
        return view ('Systems.Doctor.home', compact ('countPatinnt','notifications'))->with ('Appointments', $Appointments)->with ('users', $users);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        //
    }
}
