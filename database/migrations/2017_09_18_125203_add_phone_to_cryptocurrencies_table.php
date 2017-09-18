<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToCryptocurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cryptocurrencies', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cryptocurrencies', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
}
