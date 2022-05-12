<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
            $table->string('nom_encadrant');
            $table->string('prenom_encadrant');
            $table->string('sujet_titre');
            $table->string('sujet_description');
            $table->string('technologies');
            $table->string('student1_nom');
            $table->string('student1_prenom');
            $table->string('student2_nom')->nullable();
            $table->string('student2_prenom')->nullable();
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
        Schema::dropIfExists('stages');
    }
}
