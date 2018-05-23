<?php

/**
 * Cargos Comissionados
 */
Breadcrumbs::register('comissionados.cargos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cargos Comissionados', route('comissionados.cargos.index'));
});

Breadcrumbs::register('comissionados.cargos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.cargos.index');
    $breadcrumbs->push('Novo', route('comissionados.cargos.create'));
});

Breadcrumbs::register('comissionados.cargos.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.cargos.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.cargos.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.cargos.index');
    $breadcrumbs->push('Exibir', '');
});




/**
 * Grau de Instrução
 */
Breadcrumbs::register('comissionados.instrucao.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Grau de Instrução', route('comissionados.instrucao.index'));
});

Breadcrumbs::register('comissionados.instrucao.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.instrucao.index');
    $breadcrumbs->push('Novo', route('comissionados.instrucao.create'));
});

Breadcrumbs::register('comissionados.instrucao.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.instrucao.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.instrucao.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.instrucao.index');
    $breadcrumbs->push('Exibir', '');
});




/**
 * Nomenclatura Cargo
 */
Breadcrumbs::register('comissionados.nomenclatura.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Nomenclatura de Cargo', route('comissionados.nomenclatura.index'));
});

Breadcrumbs::register('comissionados.nomenclatura.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.nomenclatura.index');
    $breadcrumbs->push('Novo', route('comissionados.nomenclatura.create'));
});

Breadcrumbs::register('comissionados.nomenclatura.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.nomenclatura.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.nomenclatura.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.nomenclatura.index');
    $breadcrumbs->push('Exibir', '');
});




/**
 * Regime de Trabalho
 */
Breadcrumbs::register('comissionados.regime.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Regime de Trabalho', route('comissionados.regime.index'));
});

Breadcrumbs::register('comissionados.regime.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.regime.index');
    $breadcrumbs->push('Novo', route('comissionados.regime.create'));
});

Breadcrumbs::register('comissionados.regime.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.regime.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.regime.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.regime.index');
    $breadcrumbs->push('Exibir', '');
});




/**
 * Secretarias
 */
Breadcrumbs::register('comissionados.secretarias.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Secretarias', route('comissionados.secretarias.index'));
});

Breadcrumbs::register('comissionados.secretarias.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.secretarias.index');
    $breadcrumbs->push('Novo', route('comissionados.secretarias.create'));
});

Breadcrumbs::register('comissionados.secretarias.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.secretarias.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.secretarias.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.secretarias.index');
    $breadcrumbs->push('Exibir', '');
});




/**
 * Tipos de Cargos
 */
Breadcrumbs::register('comissionados.tipos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tipos de Cargos', route('comissionados.tipos.index'));
});

Breadcrumbs::register('comissionados.tipos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.tipos.index');
    $breadcrumbs->push('Novo', route('comissionados.tipos.create'));
});

Breadcrumbs::register('comissionados.tipos.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.tipos.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.tipos.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.tipos.index');
    $breadcrumbs->push('Exibir', '');
});




/**
 * Linhas de Ônibus
 */
Breadcrumbs::register('comissionados.linhas.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Linhas de Ônibus', route('comissionados.linhas.index'));
});

Breadcrumbs::register('comissionados.linhas.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.linhas.index');
    $breadcrumbs->push('Novo', route('comissionados.linhas.create'));
});

Breadcrumbs::register('comissionados.linhas.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.linhas.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.linhas.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.linhas.index');
    $breadcrumbs->push('Exibir', '');
});




/**
 * Servidores
 */
Breadcrumbs::register('comissionados.servidores.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Servidores', route('comissionados.servidores.index'));
});

Breadcrumbs::register('comissionados.servidores.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.servidores.index');
    $breadcrumbs->push('Novo', route('comissionados.servidores.create'));
});

Breadcrumbs::register('comissionados.servidores.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.servidores.index');
    $breadcrumbs->push('Editar', '');
});

Breadcrumbs::register('comissionados.servidores.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.servidores.index');
    $breadcrumbs->push('Exibir', '');
});


/**
 * Validação
 */
Breadcrumbs::register('comissionados.validacao.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Validações', route('comissionados.validacao.index'));
});

Breadcrumbs::register('comissionados.validacao.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.validacao.index');
    $breadcrumbs->push('Designar Servidor', '');
});

Breadcrumbs::register('comissionados.validacao.show', function ($breadcrumbs) {
    $breadcrumbs->parent('comissionados.validacao.index');
    $breadcrumbs->push('Validar Servidor', '');
});