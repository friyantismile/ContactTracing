<?php

namespace App\Services;

use App\Models\CloseContact;
use App\Models\CloseContactDuplicate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CloseContactService
{

    public function __construct(
        FileService $file_service
    ) {
        $this->file_service = $file_service;
    }
    /**
     * Store advertisement type
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return App\Models\CloseContact
     * 
     */
    public function store($request)
    {

        if (!$token = Auth::attempt(['email' => $request['enum_email'], 'password' => $request['enum_password']])) {
            return "Your credentials is incorrect";
        }

        $existing_contact_tracer = CloseContact::where("firstname", $request['fname'])
            ->where("lastname", $request['lname'])
            ->where("exposed_to", $request['expo_to'])
            ->where("middlename", $request['mi'])->first();

        if ($existing_contact_tracer) {
            $close_contact = new CloseContactDuplicate();
            $close_contact->firstname = $request['fname'];
            $close_contact->lastname = $request['lname'];
            $close_contact->middlename = $request['mi'];
            $close_contact->contact_no = $request['cpno'];
            if ($request['pic_taken']) {
                $uploaded_image = $this->file_service->uploadImage($request['pic_taken'], "", "CC");
                if (!$uploaded_image) {
                    return config('responses.uploading_error.message');
                }
                $close_contact->image = $uploaded_image;
            }
            $close_contact->birthdate = $request['bday'];
            $close_contact->civil_status = $request['civil_stat'];
            $close_contact->sex = $request['sex'];
            $close_contact->religion = $request['religion'];
            $close_contact->barangay = $request['brgy'];
            $close_contact->address = $request['addr'];
            $close_contact->lng = $request['long'];
            $close_contact->lat = $request['lat'];
            $close_contact->code = $request['cc_id'];
            $close_contact->education_attainment = $request['educ_attain'];
            $close_contact->employment = $request['employ'];
            $close_contact->family_size = $request['fam_size'];
            $close_contact->exposed_to = $request['expo_to'];
            $close_contact->nature_of_contact = $request['nature_of_con'];
            $close_contact->last_exposed = $request['last_expo'];
            $close_contact->monthly_salary = $request['m_salary'];
            $close_contact->is_asymptomatic = $request['asym'];
            $close_contact->date_encoded_on_app = $request['date_reg'];
            $close_contact->contact_tracer_time_in = $request['enum_date_reg'];
            $close_contact->contact_tracer_email = $request['enum_email'];
            $close_contact->save();
            return "This close contact already exist on the database";
        }

        $close_contact = new CloseContact;
        $close_contact->firstname = $request['fname'];
        $close_contact->lastname = $request['lname'];
        $close_contact->middlename = $request['mi'];
        $close_contact->contact_no = $request['cpno'];
        if ($request['pic_taken']) {
            $uploaded_image = $this->file_service->uploadImage($request['pic_taken'], "", "CC");
            if (!$uploaded_image) {
                return config('responses.uploading_error.message');
            }
            $close_contact->image = $uploaded_image;
        }
        $close_contact->birthdate = $request['bday'];
        $close_contact->civil_status = $request['civil_stat'];
        $close_contact->sex = $request['sex'];
        $close_contact->religion = $request['religion'];
        $close_contact->barangay = $request['brgy'];
        $close_contact->address = $request['addr'];
        $close_contact->lng = $request['long'];
        $close_contact->lat = $request['lat'];
        $close_contact->code = $request['cc_id'];
        $close_contact->education_attainment = $request['educ_attain'];
        $close_contact->employment = $request['employ'];
        $close_contact->family_size = $request['fam_size'];
        $close_contact->exposed_to = $request['expo_to'];
        $close_contact->nature_of_contact = $request['nature_of_con'];
        $close_contact->last_exposed = $request['last_expo'];
        $close_contact->monthly_salary = $request['m_salary'];
        $close_contact->is_asymptomatic = $request['asym'];
        $close_contact->date_encoded_on_app = $request['date_reg'];
        $close_contact->contact_tracer_time_in = $request['enum_date_reg'];
        $close_contact->contact_tracer_email = $request['enum_email'];

        $tracer = User::whereEmail($close_contact->contact_tracer_email)->first();
        $close_contact->added_by = $tracer->id;

        if (!$close_contact->save()) {
            return false;
        }
        return true;
    }

    /**
     * All advertisements
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return App\Models\CloseContact
     * 
     */
    public function getAll()
    {
        return CloseContact::all();
    }
}
