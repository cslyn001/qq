<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_certifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('cert_name', 100);
            $table->string('cert_author',100);
            $table->string('cert_address',100);
            $table->string('type');
            $table->date('date_give');
            $table->text('attachment_file');
            $table->date('expiration');
            $table->tinyInteger('privacy_status') ->comment('0 = deleted, 1 = private, 2 = public')->nullable()->default(1); // for Certificate
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
        Schema::dropIfExists('student_certification');
    }
}
