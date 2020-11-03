<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CloseContact extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'firstname'             => $this->firstname,
            'middlename'            => $this->middlename,
            'lastname'              => $this->lastname,
            'contact_no'            => $this->contact_no,
            'image'                 => $this->image ? url("/images/close-contacts/" . $this->image)  : url('/images/empty.png'),
            'birthdate'             => $this->birthdate,
            'civil_status'          => $this->civil_status,
            'sex'                   => $this->sex,
            'religion'              => $this->religion,
            'barangay'              => $this->barangay,
            'address'               => $this->address,
            'lng'                   => $this->lng,
            'lat'                   => $this->lat,
            'code'                  => $this->code,
            'education_attainment'  => $this->education_attainment,
            'employment'            => $this->employment,
            'family_size'           => $this->family_size,
            'exposed_to'            => $this->exposed_to,
            'last_exposed'          => $this->last_exposed,
            'monthly_salary'        => $this->monthly_salary,
            'is_asymptomatic'       => $this->is_asymptomatic,
            'nature_of_contact'     => $this->nature_of_contact,
            'contact_tracer_time_in'=> $this->contact_tracer_time_in,
            'contact_tracer_email'  => $this->contact_tracer_email,
            'date_encoded'          => $this->date_encoded,
            'uploaded_on_excel_at'  => $this->uploaded_on_excel_at
        ];
    }
}
