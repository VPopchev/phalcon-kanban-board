<?php

$router = $di->getRouter();

$router->add('user/login',[
    'controller' => 'user',
    'action' => 'login'
]);

$router->add('/',[
    'controller' => 'index',
    'action' => 'index'
]);

$router->add('note/edit',[
    'controller' => 'index',
    'action' => 'index'
]);

$router->add('note/create',[
    'controller' => 'note',
    'action' => 'index'
]);

$router->handle();
