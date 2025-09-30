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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->integer('venueid');
            $table->string('venuename');
            $table->decimal('lat', total: 20, places: 15);
            $table->decimal('lng', total: 20, places: 15);
            $table->integer('active');
            $table->string('venueaddress1');
            $table->string('venueaddress2');
            $table->string('venuetown');
            $table->string('venuecounty');
            $table->string('venuepostcode');
            $table->string('gamenight');
            $table->string('venueimage');
            $table->string('landlordfn');
            $table->string('landlordsn');
            $table->string('venuetelno');
            $table->string('landlordtitle');
            $table->integer('imageapproval');
            $table->string('venue_status_id');
            $table->text('map_html');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
