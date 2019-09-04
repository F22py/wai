<?php


return [

    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'teams_ranking' => [
        'controller' => 'main',
        'action' => 'teams_ranking',
    ],

    'drivers_ranking' => [
        'controller' => 'main',
        'action' => 'drivers_ranking',
    ],
    'photos' => [
        'controller' => 'main',
        'action' => 'photos',
    ],
    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],


    'news/1' => [
        'controller' => 'news',
        'action' => 'first',
    ],
    'news/2' => [
        'controller' => 'news',
        'action' => 'second',
    ],
    'news/2_new' => [
        'controller' => 'news',
        'action' => 'second_new',
    ],
    'news/3' => [
        'controller' => 'news',
        'action' => 'third',
    ],


    'teams/mercedes' => [
        'controller' => 'teams',
        'action' => 'mercedes',
    ],



    'gallery' => [
        'controller' => 'gallery',
        'action' => 'index',
    ],

    'gallery/upload' => [
        'controller' => 'gallery',
        'action' => 'upload',
    ],

    'gallery/form' => [
        'controller' => 'gallery',
        'action' => 'form',
    ],
    'gallery/index' => [
        'controller' => 'gallery',
        'action' => 'index',
    ],

    'gallery/chosen' => [
        'controller' => 'gallery',
        'action' => 'chosen',
    ],

    'gallery/search' => [
        'controller' => 'gallery',
        'action' => 'search',
    ],
    'gallery/search/live' => [
        'controller' => 'gallery',
        'action' => 'live_search',
    ],






    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'account' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'account/login_check' => [
        'controller' => 'account',
        'action' => 'login_check',
    ],

    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
    'account/my_gallery' => [
        'controller' => 'account',
        'action' => 'my_gallery',
    ],

    'account/my_gallery/uncheck' => [
        'controller' => 'account',
        'action' => 'uncheck_images',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/register/new_user' => [
        'controller' => 'account',
        'action' => 'new_user',
    ],

    'account/my_images' => [
        'controller' => 'account',
        'action' => 'private_images',
    ],


];