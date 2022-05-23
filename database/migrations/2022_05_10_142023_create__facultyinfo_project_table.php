<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyinfoProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('fname',100);
            $table->string('mname',100)->nullable()->default(NULL);
            $table->string('lname',100);
            $table->string('sname',5)->nullable()->default(NULL);
            $table->string('contact_num',20)->nullable()->default(NULL);
            $table->string('address', 100)->nullable()->default(NULL);
            $table->date('birthday')->nullable()->default(NULL);
            $table->string('sex',10)->nullable()->default(NULL);
            $table->string('prof_pic', 255)->nullable();
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
        Schema::dropIfExists('faculty_infos');
    }
}
