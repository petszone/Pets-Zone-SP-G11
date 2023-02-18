<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders','id')->onDelete('cascade');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('postal')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries','id')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities','id')->onDelete('cascade');
            $table->string('telephone');
            $table->string('email');
            $table->integer('pos')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_addresses');
    }
}
