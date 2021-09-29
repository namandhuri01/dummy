<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('college_name');
            $table->bigInteger('college_type_id');
            $table->string('contact_person_name');
            $table->string('contact_number');
            $table->string('alternate_number');
            $table->string('fax_number');
            $table->string('email');
            $table->string('logo');
            $table->string('cover_image');
            $table->string('card_image');
            $table->string('website');
            $table->string('affilated_by');
            $table->year('year_of_establishment');
            $table->string('dte_code');
            $table->string('broucher');
            $table->bigInteger('country_id');
            $table->bigInteger('state_id');
            $table->string('city');
            $table->longText('about');
            $table->longText('achivment');
            $table->longText('iso_detail');
            $table->longText('address');
            $table->longText('authorize_body');
            $table->text('facilites');
            $table->text('added_for');
            $table->string('slug');
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
        Schema::dropIfExists('college_details');
    }
}
