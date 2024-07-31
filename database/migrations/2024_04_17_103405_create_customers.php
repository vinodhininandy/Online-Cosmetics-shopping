<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->integer('Phone_No');
            $table->string('Email_Id')->unique();
            $table->date('DOB');
            $table->string('Gender');
            $table->string('Address');
            $table->string('Sample_Photo', 300);
            $table->string('Description');
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
        Schema::dropIfExists('customers');
    }
};
