<?php

namespace App\Http\Controllers\ReciptionController;

use App\Http\Controllers\Controller;
use App\Models\Appintment;
use App\Models\Doctore;
use App\Models\Note;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use App\Notifications\newAppointmentNotification;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Nette\Utils\DateTime;
use RealRashid\SweetAlert\Facades\Alert;
use function Symfony\Component\String\equalsTo;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $Appointments = Appintment::all ();
        $patients = Patient::all ();
        $services = Service::all ();
        $users = User::all ();

        return view ('Systems.Reciption.Appointment', compact ('users'))
        ->with ('Appointments', $Appointments)
        ->with ('services', $services)->with ('patients', $patients);
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
        try {
            $user = Auth::user ();
            $Pname=Patient::where('user_id',$user->id)->get();
            $satrt = new DateTime($request->start);
            $service =Service::where('id',$request->Service)->get();
            // dd($ss);
        
            foreach ($service as $value)
            $stamp = $satrt->format ('Y-m-d H:i');
            $appointment = Appintment::create (['start' => $request->start,
                'serviceID' => $request->Service,
                'patientID' => $request->Pname,
                'doctorID' => $value->doctorID,
                'status' => 0,
                'end' => $stamp,
                'title' => $value->title]);
            Notification::send ($user, new newAppointmentNotification($appointment));
            $appointment->save ();

            return redirect ()->back ()->with ('success', 'لقد قمت بإضافة موعد جديد');

        } catch (\Exception $e) {
            // dd($e);
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
        $appointment = Appintment::find ($id);
        $appointment->status = $request->input ('status');
        Note::create (['noteText' => $request->input ('oteText'), 'appointmentID' => $appointment->id]);
        $appointment->save ();
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
        $result = Appintment::where ('id', $id)->delete();
        return redirect()->back ();
    }
}
