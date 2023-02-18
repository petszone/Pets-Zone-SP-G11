<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('firstname');
            $table->string('lastname');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('postal')->nullable();
            $table->string('telephone');
            $table->string('icon')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries','id')->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained('cities','id')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
