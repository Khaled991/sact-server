<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string("fname");
            $table->string("lname");
            $table->string("nationality");
            $table->integer("age");
            $table->string("place_of_residence");
            $table->string("phone")->unique();
            $table->string("email")->unique();
            $table->string("job");
            $table->string("last_educational_certificate");
            $table->string("date_of_last_educational_certificate");
            $table->string("major");
            $table->string("courses");
            $table->integer("years_of_work_experience");
            $table->string("required_job_role");
            $table->string("skills");
            $table->string("place_old_job");
            $table->string("expected_salary");
            $table->string("personal_cv");
            $table->string("gender");
            $table->string("socialStatus");
            $table->string("experienceLevel");
            $table->string("employmentType");
            $table->date("created_date")->useCurrent();
            $table->string("code", 8)->unique();
            $table->boolean("accepted")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
}
