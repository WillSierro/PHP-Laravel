<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });
        // atribuindo motivoContato a nova coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivoContato');

        // criando a fk e removendo a coluna motivoContato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivoContato');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // criando a coluna motivoContato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivoContato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // atribuindo motivo_contato_id para a  coluna motivoContato
        DB::statement('update site_contatos set motivoContato = motivo_contatos_id');

        // adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
