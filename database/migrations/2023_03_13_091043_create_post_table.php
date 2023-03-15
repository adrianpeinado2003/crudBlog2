<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nombre");
            $table->string("contenido");
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_autor');


            $table->foreign("id_categoria")->references("id")->on("categoria")->onDelete("cascade");
            $table->foreign("id_autor")->references("id")->on("admin")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
