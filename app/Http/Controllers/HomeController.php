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
		$countDaysEmployee = 0;
		$countOffDaysEmployee = 0;
		$countRetardEmployee = 0;
		
		if(!empty($employee)){
			$notEmployee = false;
			
			$EmployeeAttendances = Presence::where('employee_id', '=', $employee->id)->where('check_out', '!=', NULL)->orderBy('id', 'desc')->get();
			$dayIn = array();
			foreach($EmployeeAttendances as $ea){
				$dateIn = strtotime($ea->check_in);
				$dI = date('Y-m-d', $dateIn);
				if(!in_array($dI, $dayIn)) {
					$countDaysEmployee += 1;
				}
				array_push($dayIn, $dI);
			}

			//** ABSENCE **//
			$type = CAL_GREGORIAN; 
			$month = date('m'); 
			$year = date('Y'); 
			$day_count = cal_days_in_month($type, $month, $year); 
			$toDay = date('Y-m-d');
			for ($i = 1; $i<=$day_count; $i++) { 
				if($i < 10){
					$i = '0' . $i;
				}
				$date=$year. '/'.$month. '/'.$i; 
				$dIC = date('Y-m-d', strtotime($date));
				$get_name=date( 'l', strtotime($date)); 
				$day_name=substr($get_name, 0, 3); 
				if($day_name !='Sun' && $day_name !='Sat' && $dIC < $toDay){ 
					if(!in_array($dIC,$dayIn)){
						$countOffDaysEmployee += 1;
					}
				} 
			}
			
			//** RETARD **//											
			$EmployeeRetardAttendances = Presence::where('employee_id', '=', $employee->id)
											->where('check_out', '!=', NULL)
											->orderBy('id', 'asc')
											->get()
											->groupBy(function($item) {
												return $item->created_at->format('Y-m-d');
											});
			foreach($EmployeeRetardAttendances as $er){
				foreach($er as $key => $ed){
					$dateInEr = strtotime($ed->check_in);
					if ( (int)(date('H', $dateInEr)) > env("HORAIRE_ENTREE", 8) ) {
						$countRetardEmployee += 1;
					}
					break;
				}
			}

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
		return view('home', ['countRetardEmployee' => $countRetardEmployee, 'countOffDaysEmployee' => $countOffDaysEmployee, 'countDaysEmployee' => $countDaysEmployee, 'notEmployee' => $notEmployee, 'no_check_out_attendances' => $no_check_out_attendances, 'wh' => $wh ]);
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
