<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * o método up() é invocado quando eu executo a migration
     */
    public function up(): void
    {
        // cria a tabela suportes
        Schema::create('suportes', function (Blueprint $table) {
            $table->id();
            $table->string('mensagem')
                ->nullable(false);
            $table->enum('status', [
                'pendente',
                'ativo',
                'concluído'
            ]);
            $table->text('informacoes')
                ->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * o método down() é invocado para deletar as alterações
     * que foram realizadas na tabela a qual a migration faz
     * referência
     */
    public function down(): void
    {
        // deleta a tabela suportes caso a mesma exista
        Schema::dropIfExists('suportes');
    }
};
