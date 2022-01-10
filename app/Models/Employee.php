<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'lastname',
        'job_title',
        'photo',
        'mobile_phone',
        'work_phone',
        'work_email',
        'work_location',
        'parent_id',
        'departement',
        'street',
        'city',
        'country',
        'gender',
        'date_of_birth',
        'city_of_bith',
        'country_of_birth',
        'marital',
        'spouse_complete_name',
        'spouse_birthdate',
        'children_nbr',
        'study_field',
        'study_school',
        'user_id'      
    ];
	
	public function parent()
	{
		return $this->belongsTo('App\Models\Employee', 'parent_id')->with('parent');
	}
	
	public function parent_rec()
	{
		return $this->parent()->with('parent_rec');
	}

	public function children()
	{
		return $this->hasMany('App\Models\Employee', 'parent_id')->with('children');
	}

}
