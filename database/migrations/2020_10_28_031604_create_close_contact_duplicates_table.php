<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCloseContactDuplicatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('close_contact_duplicates', function (Blueprint $table) {
            $table->id();
            $table->string("firstname");
            $table->string("lastname");
            $table->string("middlename")->nullable();
            $table->string("contact_no")->nullable();
            $table->longText("image")->nullable();
            $table->date("birthdate")->nullable();
            $table->string("civil_status")->nullable();
            $table->string("sex")->nullable();
            $table->string("religion")->nullable();
            $table->string("barangay")->nullable();
            $table->string("address")->nullable();
            $table->string("lng")->nullable();
            $table->string("lat")->nullable();
            $table->string("code")->nullable();
            $table->string("education_attainment")->nullable();
            $table->string("employment")->nullable();
            $table->integer("family_size")->nullable();
            $table->string("exposed_to");
            $table->date("last_exposed")->nullable();
            $table->date("date_encoded_on_app")->nullable();
            $table->string("monthly_salary")->nullable();
            $table->string("is_asymptomatic")->nullable();
            $table->string("nature_of_contact")->nullable();
            $table->string("risk_category")->nullable(); 
            $table->string("guardian_fullname")->nullable(); 
            $table->string("contact_tracer_email")->nullable(); 
            $table->string("contact_tracer_time_in")->nullable(); 
            $table->dateTime("uploaded_on_excel_at")->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('close_contact_duplicates');
    }
}
