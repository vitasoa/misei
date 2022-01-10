<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$employee = Employee::where('user_id', '=', \Auth::user()->id)->first();
		$notEmployee = true;
		$no_check_out_attendances = array();
		$wh = '';

		if(!empty($employee)){
			$notEmployee = false;
		
		
		
		$no_check_out_attendances = Presence::where('employee_id', '=', $employee->id)->where('check_out', '=', NULL)->orderBy('id', 'desc')->first();
		
		$todayAttendances = Presence::where('employee_id', '=', $employee->id)->where('check_in', '>=', date("Y-m-d 00:00:00"))->where('check_out', '<=', date("Y-m-d 23:59:59"))->orderBy('id', 'desc')->get();
        $todayAttendancesTotal = 0.0;
		foreach($todayAttendances as $tAtt){
			$todayAttendancesTotal += (float)($tAtt->worked_hours);
		}
		
		$day = floor($todayAttendancesTotal / 86400);
		$hours = floor(($todayAttendancesTotal -($day * 86400)) / 3600);
		$minutes = floor(($todayAttendancesTotal / 60) % 60);

		if($day > 0){
			$wh = (int)$day . ' Jour(s) ' . $hours . ' heures ' . $minutes . ' minutes';
		} else {
			$wh = $hours . ' heures ' . $minutes . ' minutes';
		}
		}
		return view('home', ['notEmployee' => $notEmployee, 'no_check_out_attendances' => $no_check_out_attendances, 'wh' => $wh ]);
    }
	
	public function postChecking()
	{
		$employee = Employee::where('user_id', '=', \Auth::user()->id)->first();
		$no_check_out_attendances = Presence::where('employee_id', '=', $employee->id)->where('check_out', '=', NULL)->orderBy('id', 'desc')->first();

		if(isset($employee)){
			if(isset($no_check_out_attendances)){
				$presence = Presence::find($no_check_out_attendances->id);
				$presence->check_out = \Carbon\Carbon::now();
				
				$dateIn = \Carbon\Carbon::parse($no_check_out_attendances->check_in);
				$nowT = \Carbon\Carbon::now();
				// $worked_hours = $nowT->diff($dateIn, 2)->format(' %H heures - %I minutes');
				$worked_hours = $nowT->diffInSeconds($dateIn);
				$presence->worked_hours = $worked_hours;
				$presence->save();
				return response()->json(['success' => 'Votre sortie a été enregistré.']);
			}else{
				$presence = Presence::create([
					'employee_id' => $employee->id,
					'check_in' => \Carbon\Carbon::now(),
					'check_out' => NULL,
					'worked_hours' => NULL
				]);
				return response()->json(['success' => 'Votre présence a été enregistré.']);
			}
		}else{
			return response()->json(['errors' => 'L\'utilisateur n\'est pas un "Employée".']);
		}
	}
}
