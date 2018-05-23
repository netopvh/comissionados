<?php
/**
 * USUÁRIOS
 */
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Usuários', route('users.index'));
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Novo', route('users.create'));
});
Breadcrumbs::for('users.edit', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Editar', '');
});

/**
 * PERFIS
 */
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Perfis', route('roles.index'));
});
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push('Novo', route('roles.create'));
});
Breadcrumbs::for('roles.edit', function ($trail) {
    $trail->parent('roles.index');
    $trail->push('Editar', '');
});

/**
 * PERMISSÕES
 */
Breadcrumbs::for('permissions.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Permissões', route('permissions.index'));
});
Breadcrumbs::for('permissions.create', function ($trail) {
    $trail->parent('permissions.index');
    $trail->push('Novo', route('permissions.create'));
});
Breadcrumbs::for('permissions.edit', function ($trail) {
    $trail->parent('permissions.index');
    $trail->push('Editar', '');
});

/**
 * AUDITORIA
 */
Breadcrumbs::for('audit.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Auditoria', route('audit.index'));
});