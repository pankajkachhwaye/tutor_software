<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_work', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('contact')->onDelete('cascade')->onUpdate('cascade');
            $table->string('student_name');
            $table->string('student_contact_no');
            $table->string('mobile');
            $table->string('on_off_line');
            $table->string('website_link')->nullable();
            $table->string('user_id')->nullable();
            $table->string('password')->nullable();
            $table->string('branch_name');
            $table->string('subject_name');
            $table->string('type');
            $table->string('status');
            $table->string('price');
            $table->string('paid');
            $table->string('remaining');
            $table->string('due_time');
            $table->text('tutor_name');
            $table->string('tutor_price');
            $table->string('comment');
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
        Schema::dropIfExists('daily_work');
    }
}
