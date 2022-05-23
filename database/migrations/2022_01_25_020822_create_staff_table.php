<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('department_id')->nullable()->default(NULL);
            $table->string('fname', 100);
            $table->string('mname', 100)->nullable()->default(NULL);
            $table->string('lname', 100);
            $table->string('sname', 5)->nullable()->default(NULL);
            $table->string('contact_num',20)->nullable()->default(NULL);
            $table->string('address',100)->nullable()->default(NULL);
            $table->string('city',100)->nullable()->default(NULL);
            $table->string('province',100)->nullable()->default(NULL);
            $table->string('region',100)->nullable()->default(NULL);
            $table->text('prof_pic')->nullable()->default(NULL);
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
        Schema::dropIfExists('staff');
    }
}
