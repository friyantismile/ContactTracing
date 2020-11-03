<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloseContact extends Model
{
    protected $fillable = [
        'id', 'firstname', 'middlename', 'lastname', 'contact_no',
        'image', 'birthdate', 'civil_status', 'sex', 'religion', 
        'barangay', 'address', 'lng', 'lat',
        'code', 'education_attainment',
        'employment', 'family_size', 'exposed_to', 'nature_of_contact', 
        'last_exposed', 'monthly_salary', 'is_asymptomatic', 
        'contact_tracer_time_in', 'contact_tracer_email', 
        'date_registered', 'date_encoded_on_app', 'uploaded_on_excel_at',
        'risk_category', 'guardian_fullname'
    ];
}
