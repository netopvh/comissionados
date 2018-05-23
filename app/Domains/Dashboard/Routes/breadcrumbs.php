<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Principal', route('home'));
});