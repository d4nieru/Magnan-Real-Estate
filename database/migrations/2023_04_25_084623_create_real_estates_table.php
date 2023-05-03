<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string("property_cover_name")->nullable();
            $table->string("property_cover_path")->nullable();
            $table->integer("property_price");
            $table->string("property_adress");
            $table->string("property_zipcode");
            $table->string("property_city");
            $table->integer("property_surface_area");
            $table->integer("property_number_of_parts");
            $table->string("property_type");
            $table->string("rental_type");
            $table->boolean("property_state")->default(1);
            $table->integer("agent_id");
            $table->string("property_description");
            $table->boolean("is_published")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
