<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('project_title', 100);
            $table->string('position', 100);
            $table->string('project_description', 100);
            $table->date('date_established');
            $table->text('url')->nullable()->default(NULL);
            $table->text('file_upload')->nullable()->default(NULL); // screenshot
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
        Schema::dropIfExists('student_project');
    }
}
