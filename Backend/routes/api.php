<?php
    use App\Core\Router;

    Router::get('/api/products', 'ProductsController@index');
    Router::get('/api/products/{id}', 'ProductsController@show');
    Router::post('/api/products', 'ProductsController@create');
    Router::put('/api/products/{id}', 'ProductsController@update');
    Router::delete('/api/products/{id}', 'ProductsController@delete');
