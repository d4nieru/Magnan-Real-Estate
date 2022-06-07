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
        Schema::create('realestates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("property_name");
            $table->string("property_adress");
            $table->string("property_type");
            $table->string("rental_type");
            $table->string("property_state");
            $table->string("agent_name");
            $table->string("property_image");
            $table->string("property_description");
            $table->integer("property_price");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestates');
    }
};
