<?php

//Admin panel breadcrumbs

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Главная', route('admin.home'));
});

Breadcrumbs::for('admin.products.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Товары', route('admin.products.index'));
});

Breadcrumbs::for('admin.products.show', function ($trail, $product) {
    $trail->parent('admin.products.index');
    $trail->push($product->name, route('admin.products.show', $product->id));
});

Breadcrumbs::for('admin.products.create', function ($trail) {
    $trail->parent('admin.products.index');
    $trail->push('Новый товар', route('admin.products.create'));
});

Breadcrumbs::for('admin.products.edit', function ($trail, $product) {
    $trail->parent('admin.products.index');
    $trail->push($product->name, route('admin.products.edit', $product->id));
});

/*
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
*/