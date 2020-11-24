<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CandidatsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cin')->nullable();
            $table->integer('poste_id')->unsigned();
            $table->foreign('poste_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('poste')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->integer('status'); // 0 mail invalide / 1 mail valid

            // $table->string('email');
            // $table->string('password');
            $table->string('confirm_password')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('addresse')->nullable();
            $table->string('governorate')->nullable();
            $table->string('Postal_code')->nullable();
            $table->string('diploma')->nullable();
            $table->integer('diplome_id')->unsigned()->nullable();
            $table->foreign('diplome_id')->references('id')->on('diplomes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('level_studies')->nullable();
            $table->string('preparatory_study')->nullable();
            $table->string('Bachelor_degree')->nullable();
            $table->string('last_year_degree_without_pfe')->nullable();
            $table->string('date_of_obtaining_a_driving_license')->nullable();
            $table->float('score_1', 8, 2)->nullable();
            $table->float('score_2', 8, 2)->nullable();
            $table->string('state_sending_mail')->nullable();
            $table->string('state_sending_sms')->nullable();
            $table->string('reason_for_rejection')->nullable();

            $table->string('conformite_age')->nullable();
            $table->string('conformite_cin')->nullable();
            $table->string('conformite_diplome')->nullable();
            $table->string('conformite_permis')->nullable();
            $table->string('conformite_note')->nullable();
            $table->string('conformite_autre')->nullable();
            $table->string('id_dossier')->nullable();
            $table->string('dossier_complet')->nullable();
            $table->string('remarque')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('code_id')->unsigned()->nullable();
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('password_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supervisor')->nullable();
            $table->string('candidat')->nullable();
            $table->string('cin')->nullable();
          //  $table->softDeletes();
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
        Schema::dropIfExists('candidats_history');
        Schema::dropIfExists('password_history');
    }
}
