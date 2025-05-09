<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('idP');
            $table->string('nom');
            $table->decimal('prix', 8, 2);
            $table->unsignedBigInteger('idC');
            $table->timestamps();

            $table->foreign('idC')->references('idC')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('produits');
    }
};