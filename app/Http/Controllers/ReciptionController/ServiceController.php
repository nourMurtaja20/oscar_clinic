<?php

namespace App\Http\Controllers\ReciptionController;

use App\Http\Controllers\Controller;
use App\Models\Doctore;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $services = Service::all ();
        $doctors = Doctore::all ();
        return view ('Systems.Reciption.Service', compact ('services','doctors'));
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

        Service::create([
            'doctorID' =>$request->name,
            'title'=>$request->title,
            'discription'=>$request->discription,
            'Duration'=>$request->Duration
        ]);
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

        $sevices = Service::find ($id);
        $docID = $sevices->doctorID;
        $user = Doctore::find ($docID);
        $IdUser = $user->UserId;
        $user = User::where ('id', $IdUser)->first ();
        $user->email = $request->input ('email');
        $sevices->title = $request->input ('title');
        $sevices->discription = $request->input ('discription');
        $sevices->Duration = $request->input ('Duration');
        $user->save ();
        $sevices->save ();
        return redirect ()->back ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $result = Service::where ('id', $id)->delete ();
        return redirect ()->back ();
    }
}
