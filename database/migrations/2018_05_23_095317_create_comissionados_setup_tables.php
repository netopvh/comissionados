<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateComissionadosSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargocomissionado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('secretarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('tipocargo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('nomenclaturacargo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('grauinstrucao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('regimetrab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('servidores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf');
            $table->string('estcivil');
            $table->string('nomeconj')->nullable();
            $table->string('matricula');
            $table->string('pai')->nullable();
            $table->string('mae');
            $table->char('cedido',1);
            $table->integer('sec_origem_id')->nullable()->unsigned();
            $table->foreign('sec_origem_id')->references('id')->on('secretarias');
            $table->integer('sec_atual_id')->unsigned();
            $table->foreign('sec_atual_id')->references('id')->on('secretarias');
            $table->integer('instrucao_id')->unsigned();
            $table->foreign('instrucao_id')->references('id')->on('grauinstrucao');
            $table->string('nomefaculdade')->nullable();
            $table->string('nomecurso')->nullable();
            $table->string('registroclasse')->nullable();
            $table->integer('tipocargo_id')->unsigned();
            $table->foreign('tipocargo_id')->references('id')->on('tipocargo');
            $table->integer('comissionado_id')->unsigned();
            $table->foreign('comissionado_id')->references('id')->on('cargocomissionado');
            $table->char('exclusivo_comissao',1);
            $table->integer('nomenclatura_id')->nullable()->unsigned();
            $table->foreign('nomenclatura_id')->references('id')->on('nomenclaturacargo');
            $table->string('nomeorgunidade')->nullable();
            $table->string('nomeautoridade')->nullable();
            $table->longText('nomeativsuperv')->nullable();
            $table->longText('atividades');
            $table->integer('qtdevaletransp')->nullable();
            $table->integer('regime_id')->nullable()->unsigned();
            $table->foreign('regime_id')->references('id')->on('regimetrab');
            $table->char('validado',1)->default('N');
            $table->integer('idvalidador')->nullable();
            $table->timestamps();
        });

        Schema::create('conjuge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('servidor_id')->unsigned();
            $table->foreign('servidor_id')->references('id')->on('servidores');
        });

        Schema::create('linhaonibus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servidor_id')->unsigned();
            $table->foreign('servidor_id')->references('id')->on('servidores');
            $table->string('linha1');
            $table->string('linha2');
            $table->string('linha3');
            $table->string('linha4');
            $table->string('linha5');
            $table->string('linha6');
            $table->string('linha7');
            $table->string('linha8');
            $table->string('trajeto');
        });

        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servidor_id')->unsigned();
            $table->foreign('servidor_id')->references('id')->on('servidores');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('complemento');
        });

        Schema::create('user_validadors', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_responsavel')->unsigned();
            $table->foreign('id_responsavel')->references('id')->on('users');
            $table->integer('id_validador')->unsigned();
            $table->foreign('id_validador')->references('id')->on('users');
        });

        DB::statement("ALTER TABLE users ADD FOREIGN KEY (servidor_id) REFERENCES servidores(id)");
        DB::statement("ALTER TABLE users ADD FOREIGN KEY (secretaria_id) REFERENCES secretarias(id)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargocomissionado');
        Schema::dropIfExists('secretarias');
        Schema::dropIfExists('tipocargo');
        Schema::dropIfExists('nomenclaturacargo');
        Schema::dropIfExists('grauinstrucao');
        Schema::dropIfExists('regimetrab');
        Schema::dropIfExists('servidores');
        Schema::dropIfExists('conjuge');
        Schema::dropIfExists('linhaonibus');
        Schema::dropIfExists('endereco');
        Schema::dropIfExists('user_validadors');
    }
}
