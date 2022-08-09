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
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('produtos_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->decimal('preco_venda', 8, 2);
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['estoque mínimo', 'estoque máximo', 'preço_venda']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->decimal('preco_venda', 8, 2);
        });

        Schema::dropIfExists('produtos_filiais');

        Schema::dropIfExists('filiais');
    }
};
