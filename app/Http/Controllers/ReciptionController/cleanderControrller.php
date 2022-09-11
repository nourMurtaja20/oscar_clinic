<?php

namespace App\Http\Controllers\ReciptionController;

use App\Http\Controllers\Controller;
use App\Models\Appintment;
use Illuminate\Http\Request;

class cleanderControrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        if($request->ajax()) {

            $data = Appintment::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view ('Systems.Reciption.cleander');
    }

    public function action (Request $request)
    {
        if ($request->ajax ()) {
            if ($request->type == 'add') {

                $event = Appintment::create (['title' => $request->title, 'start' => $request->start, 'end' => $request->end]);

                return response ()->json ($event);
            }

            if ($request->type == 'update') {
                $event = Appintment::find ($request->id)->update (['title' => $request->title, 'start' => $request->start, 'end' => $request->end]);

                return response ()->json ($event);
            }

            if ($request->type == 'delete') {
                $event = Appintment::find ($request->id)->delete ();

                return response ()->json ($event);
            }
        }
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
