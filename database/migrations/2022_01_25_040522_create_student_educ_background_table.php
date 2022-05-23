<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEducBackgroundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_educ_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('educ_level', 100);
            $table->string('institution_name', 100);
            $table->string('institution_address', 100);
            $table->string('degree', 200)->nullable();
            $table->date('from');
            $table->date('to');
            $table->tinyInteger('privacy_type')->comment('1 = Public; 2 = Private');
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
        Schema::dropIfExists('student_educ_background');
    }
}
