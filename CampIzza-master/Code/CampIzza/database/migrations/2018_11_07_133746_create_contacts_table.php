<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_1');
            $table->string('parent_2');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('city');
            $table->string('zipcode')->nullable();

            $table->string('phone_1');
            $table->string('phone_2');
            $table->string('phone_3')->nullable();
            $table->string('phone_4')->nullable();
            $table->string('phone_type_1');
            $table->string('phone_type_2');
            $table->string('phone_type_3')->nullable();
            $table->string('phone_type_4')->nullable();

            $table->string('emergency_name_1');
            $table->string('emergency_name_2');
            $table->string('emergency_relationship_1');
            $table->string('emergency_relationship_2');
            $table->string('emergency_phone_1');
            $table->string('emergency_phone_2');

            $table->integer('user');
            $table->boolean('active')->default(true);
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
        Schema::drop('contacts');
    }
}
