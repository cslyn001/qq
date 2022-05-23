<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('job_title', 100);
            $table->string('job_address', 100);
            $table->string('company', 100);
            $table->date('start_date');
            $table->date('end_date');
            // $table-
            $table->tinyInteger('privacy_status') ->comment('0 = deleted, 1 = private, 2 = public')->nullable()->default(1); // for COE
            $table->tinyInteger('approval_status') ->comment('1 = approved, 0 = pending')->nullable()->default(1);
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
        Schema::dropIfExists('student_experiences');
    }
}
