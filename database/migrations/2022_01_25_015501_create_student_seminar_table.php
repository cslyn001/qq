<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSeminarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_seminars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('title', 100);
            $table->string('venue', 100);
            $table->date('date_given');
            $table->string('type');
            $table->text('attachment_filename');
            $table->tinyInteger('privacy_status') ->comment('0 = deleted, 1 = private, 2 = public')->nullable()->default(1);
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
        Schema::dropIfExists('studentseminar');
    }
}
