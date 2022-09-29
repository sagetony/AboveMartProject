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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userId')->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phoneNumber');
            $table->string('country');
            $table->string('mySponsorId');
            $table->string('sponsor');
            $table->string('photo');
            $table->string('status');
            $table->string('emailVerified');
            $table->string('rank');
            $table->string('package');
            $table->string('point');
            $table->string('uplineOne');
            $table->string('uplineTwo');
            $table->string('uplineThree');
            $table->string('uplineFour');
            $table->string('uplineFive');
            $table->string('uplineSix');
            $table->string('uplineSeven');
            $table->string('downlineOne');
            $table->string('downlineTwo');
            $table->string('downlineThree');
            $table->string('downlineFour');
            $table->string('downlineFive');
            $table->string('downlineSix');
            $table->string('downlineSeven');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
