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
        Schema::create('cryptos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('image');
            $table->string('current_price');
            $table->string('market_cap');
            $table->string('market_cap_rank');
            $table->string('total_volume');
            $table->string('high_24h');
            $table->string('low_24h');
            $table->string('price_change_24h');
            $table->string('price_change_percentage_24h');
            $table->string('market_cap_change_24h');
            $table->string('market_cap_change_percentage_24h');
            $table->string('circulating_supply');
            $table->string('total_supply');
            $table->string('ath');
            $table->string('ath_change_percentage');
            $table->string('ath_date');
            $table->string('atl');
            $table->string('atl_change_percentage');
            $table->string('atl_date');
            $table->string('roi');
            $table->string('last_updated');
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
        Schema::dropIfExists('cryptos');
    }
};
