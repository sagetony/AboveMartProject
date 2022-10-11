<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechargeprintings', function (Blueprint $table) {
            $table->id();
            $table->string('transactionId')->unique();
            $table->string('userId');
            $table->string('username');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('amount');
            $table->string('network');
            $table->string('networkPlan');
            $table->string('businessName');
            $table->string('photo');
            $table->string('status');
            $table->string('rechargecardPin');
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
        Schema::dropIfExists('rechargeprintings');
    }
};
