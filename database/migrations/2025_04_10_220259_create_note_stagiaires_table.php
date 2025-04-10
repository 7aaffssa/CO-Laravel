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
        if (!Schema::hasTable('note_stagiaires')) {
            Schema::create('note_stagiaires', function (Blueprint $table) {
                $table->id();

                // Foreign key to stagiaires table
                $table->unsignedInteger('idS');
                $table->foreign('idS')->references('idS')->on('stagiaires')->onDelete('cascade');

                // Note column
                $table->string('note'); // or use $table->decimal('note', 5, 2); for numeric grades

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_stagiaires');
    }
};