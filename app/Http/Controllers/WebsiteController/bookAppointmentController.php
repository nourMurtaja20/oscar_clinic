<?php

namespace App\Http\Controllers\WebsiteController;

use App\Http\Controllers\Controller;
use App\Models\Appintment;
use App\Models\Doctore;
use App\Models\Service;
use App\Models\Patient;
use App\Models\User;
use App\Notifications\newAppointmentNotification;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class bookAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Appointments = Appintment::all ();
        $doctors = Doctore::all ();
        $services = Service::all ();
        return view ('webSite.bookAppointment',compact ('Appointments','doctors','services'));

    }
    public function myformAjax($id)
    {
        $services = Service::where("doctorID",$id)->pluck("title","id");
        dd($services);
        return  json_encode($services);
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
        try {
            $user = Auth::user ();
            $Pname=Patient::where('user_id',$user->id)->get();
            $satrt = new DateTime($request->start);
           foreach ($Pname as $name)
            $service = Service:: where ('id', $request->Service)->get ();
            foreach ($service as $value)
//            dd($service);
            $stamp = $satrt->format ('Y-m-d H:i');
            $appointment = Appintment::create (['start' => $request->start,
                'serviceID' => $request->Service,
                'patientID' => $name->id,
                'doctorID' => $value->doctorID,
                'status' => 0,
                'end' => $stamp,
                'title' => $value->title]);
            Notification::send ($user, new newAppointmentNotification($appointment));
            $appointment->save ();

            return redirect ()->back ()->with ('success', 'لقد قمت بإضافة موعد جديد');

        } catch (\Exception $e) {
            return redirect ()->back ()->with ('error', 'حدث خلل أثناء إنشاء موعد .قد يكون هناك حجز آخر بنفس الموعد او قم بتسجيل الدخول  .');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
