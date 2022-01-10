<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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
     * Display all employees
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
		$employees = Employee::where('user_id', '=', \Auth::user()->id)->paginate(10);
		
		if (\Auth::user()->is_admin == 1){
			$employees = Employee::with('parent')->paginate(10);
		}

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show form for creating employee
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
		$employees = Employee::where('active', 1)->get();
        return view('employees.create', compact('employees'));
    }

    /**
     * Store a newly created employee
     * 
     * @param employee $employee
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Employee $employee, Request $request) 
    {
		$validatedData = $request->validate([
			'name' => 'required',
            'lastname'  => 'nullable',
            'work_email' => 'required|email|unique:employees,work_email',
            'job_title' => 'required',
            // 'photo'  => 'nullable',
			'employee_profile_photo' => 'nullable|max:5000|mimes:jpeg,png,jpg',
            'mobile_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'work_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'work_location'  => 'nullable',
            'parent_id'  => 'nullable',
            'departement'  => 'nullable',
            'street'  => 'nullable',
            'city'  => 'nullable',
            'country'  => 'nullable',
            'gender'  => 'nullable',
            'date_of_birth'  => 'nullable',
            'city_of_bith'  => 'nullable',
            'country_of_birth'  => 'nullable',
            'marital'  => 'nullable',
            'spouse_complete_name'  => 'nullable',
            'spouse_birthdate'  => 'nullable',
            'children_nbr'  => 'nullable',
            'study_field'  => 'nullable',
            'study_school'  => 'nullable',
            'user_id'  => 'nullable'            
        ]);
		
		$employee = new Employee();
		if(isset($request->employee_profile_photo)){
			$file = $request->file('employee_profile_photo');
			$ext = 'png';
			if($file->getClientOriginalExtension() != ''){
				$ext = $file->getClientOriginalExtension();
			}
			$contents = $file->openFile()->fread($file->getSize());
			$imgAll = 'data:image/' . $ext . ';base64,' . base64_encode($contents);
			$employee->photo = $imgAll;
		}
		
		$date_of_birth = $request->date_of_birth;
		$date_of_birth = date("Y-m-d", strtotime($date_of_birth));
		$employee->date_of_birth = $date_of_birth;
		
		$spouse_birthdate = $request->spouse_birthdate;
		$spouse_birthdate = date("Y-m-d", strtotime($spouse_birthdate));
		$employee->spouse_birthdate = $spouse_birthdate;
		
		$employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->work_email = $request->work_email;
        $employee->job_title = $request->job_title;
        $employee->mobile_phone = $request->mobile_phone;
        $employee->work_phone = $request->work_phone;
        $employee->work_location = $request->work_location;
        $employee->parent_id = $request->parent_id;
        $employee->departement = $request->departement;
        $employee->street = $request->street;
        $employee->city = $request->city;
        $employee->country = $request->country;
        $employee->gender = $request->gender;
        $employee->city_of_bith = $request->city_of_bith;
        $employee->country_of_birth = $request->country_of_birth;
        $employee->marital = $request->marital;
        $employee->spouse_complete_name = $request->spouse_complete_name;
        $employee->children_nbr = $request->children_nbr;
        $employee->study_field = $request->study_field;
        $employee->study_school = $request->study_school;
		
		$partsPass = explode('@', $request->get('work_email'));
		$passwordGenerated = $request->get('work_email');
		if (count($partsPass) > 0) {
			$passwordGenerated = $partsPass[0];
		}
		
		$user = User::create([
            'name' => $request->lastname . ' ' . $request->name,
            'email' => $request->get('work_email'),
            'password' => Hash::make($passwordGenerated),
			'is_admin' => 0
        ]);
		
		$employee->user_id = $user->id;
		$employee->save();
        // $employee->create($requestAll);

        return redirect()->route('employees.index')
            ->withSuccess(__('L\'employée a été créé avec succès.'));
    }

    /**
     * Show employee data
     * 
     * @param employee $employee
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee) 
    {
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Edit employee data
     * 
     * @param employee $employee
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee) 
    {
		$employees = Employee::where('active', 1)->get();
        return view('employees.edit', [
            'employee' => $employee,
			'employees' => $employees 
        ]);
    }

    /**
     * Update employee data
     * 
     * @param employee $employee
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee, Request $request) 
    {
	
		$date_of_birth = $request->date_of_birth;
		$date_of_birth = date("Y-m-d", strtotime($date_of_birth));
		$request->merge(['date_of_birth' => $date_of_birth]);
		
		$spouse_birthdate = $request->spouse_birthdate;
		$spouse_birthdate = date("Y-m-d", strtotime($spouse_birthdate));
		$request->merge(['spouse_birthdate' => $spouse_birthdate]);

		$validatedData = $request->validate([
			'name' => 'required',
            'lastname'  => 'nullable',
            'work_email' => 'required|email|unique:employees,work_email,' . $employee->id,
            'job_title' => 'required',
            // 'photo'  => 'nullable',
			'employee_profile_photo' => 'nullable|max:5000|mimes:jpeg,png,jpg',
            'mobile_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'work_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'work_location'  => 'nullable',
            'parent_id'  => 'nullable',
            'departement'  => 'nullable',
            'street'  => 'nullable',
            'city'  => 'nullable',
            'country'  => 'nullable',
            'gender'  => 'nullable',
            'date_of_birth'  => 'nullable',
            'city_of_bith'  => 'nullable',
            'country_of_birth'  => 'nullable',
            'marital'  => 'nullable',
            'spouse_complete_name'  => 'nullable',
            'spouse_birthdate'  => 'nullable',
            'children_nbr'  => 'nullable',
            'study_field'  => 'nullable',
            'study_school'  => 'nullable',
            'user_id'  => 'nullable'        
        ]);
		
		if(isset($request->employee_profile_photo)){
			$file = $request->file('employee_profile_photo');
			$ext = 'png';
			if($file->getClientOriginalExtension() != ''){
				$ext = $file->getClientOriginalExtension();
			}
			$contents = $file->openFile()->fread($file->getSize());
			$imgAll = 'data:image/' . $ext . ';base64,' . base64_encode($contents);
			$employee->photo = $imgAll;
		}
		
		$date_of_birth = $request->date_of_birth;
		$date_of_birth = date("Y-m-d", strtotime($date_of_birth));
		$employee->date_of_birth = $date_of_birth;
		
		$spouse_birthdate = $request->spouse_birthdate;
		$spouse_birthdate = date("Y-m-d", strtotime($spouse_birthdate));
		$employee->spouse_birthdate = $spouse_birthdate;
		
		$employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->work_email = $request->work_email;
        $employee->job_title = $request->job_title;
        $employee->mobile_phone = $request->mobile_phone;
        $employee->work_phone = $request->work_phone;
        $employee->work_location = $request->work_location;
        $employee->parent_id = $request->parent_id;
        $employee->departement = $request->departement;
        $employee->street = $request->street;
        $employee->city = $request->city;
        $employee->country = $request->country;
        $employee->gender = $request->gender;
        $employee->city_of_bith = $request->city_of_bith;
        $employee->country_of_birth = $request->country_of_birth;
        $employee->marital = $request->marital;
        $employee->spouse_complete_name = $request->spouse_complete_name;
        $employee->children_nbr = $request->children_nbr;
        $employee->study_field = $request->study_field;
        $employee->study_school = $request->study_school;
		$employee->save();

        return redirect()->route('employees.index')
            ->withSuccess(__('L\'employée a été mis à jour avec succès.'));
    }

    /**
     * Delete employee data
     * 
     * @param employee $employee
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee) 
    {
        $employee->active = 0;
		$employee->save();
		$user = User::find($employee->user_id);
		$user->active = 0;
		$user->save();

        return redirect()->route('employees.index')
            ->withSuccess(__('L\'employée a été archivé avec succès.'));
    }
	
	/**
     * Activate employee data
     * 
     * @param employee $employee
     * 
     * @return \Illuminate\Http\Response
     */
    public function activate(Employee $employee) 
    {
        $employee->active = 1;
		$employee->save();
		$user = User::find($employee->user_id);
		$user->active = 1;
		$user->save();

        return redirect()->route('employees.index')
            ->withSuccess(__('L\'employée a été re-activé avec succès.'));
    }
}
