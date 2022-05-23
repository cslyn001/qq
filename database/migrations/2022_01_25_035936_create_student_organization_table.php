<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_organization', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('org_name', 100);
            $table->string('org_associated_with', 100);
            $table->string('position');
            $table->date('start_date'); // for position
            $table->date('end_date'); // for position
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
        Schema::dropIfExists('student_organization');
    }
}
