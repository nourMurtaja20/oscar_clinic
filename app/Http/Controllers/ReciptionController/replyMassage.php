<?php

namespace App\Http\Controllers\ReciptionController;

use App\Http\Controllers\Controller;
use App\Mail\replyTest;
use App\Models\clintMassage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class replyMassage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $masseges = clintMassage::all ();
//        dd($masseges);
        return view ('Systems.Reciption.massage', compact ('masseges'));

    }


    public function reply (Request $request, $id)
    {

        try {
            $data = ['replyText' => $request->input ('replyText'),];

            $masseg = clintMassage::find ($id);
            clintMassage::find ($id)->update (['statuseReply' => 1]);
            Mail::to ($masseg->email)->send (new replyTest($data));

            return redirect ()->back ()->with ('success', 'لقد تم الرد بنجاح');

        } catch (\Exception $e) {
            return redirect ()->back ()->with ('error', 'حدث خلل أثناء الارسال  ..حاول مرة اخرى.');
        }
    }


    public function __construct ()
    {
        $this->middleware (function ($request, $next) {
            if (session ('success')) {
                Alert::success (session ('success'));
            }

            if (session ('error')) {
                Alert::error (session ('error'));
            }

            return $next($request);
        });
    }

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
