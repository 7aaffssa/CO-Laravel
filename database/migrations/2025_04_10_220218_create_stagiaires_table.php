<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('stagiaires')) {
            Schema::create('stagiaires', function (Blueprint $table) {
                $table->increments('idS');      // defines UNSIGNED INT AUTO_INCREMENT PRIMARY KEY
                $table->string('nom');
                $table->string('prenom');
                $table->integer('age');
                $table->date('date_naissance');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('stagiaires');
    }
};