<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    '_searchbar' => ['CategoryController', 'showCategory',],
    'report' => ['ReportController', 'showReports',],
    'contact' => ['ContactController', 'contact',],
    'annonces' => ['AnnonceController','annonces',],
    'mentionlegales' => ['MentionLegalesController','mentionlegales',],
    'register' => ['UserController', 'register',],
    'login' => ['UserController', 'login'],
    'user/delete' => ['UserController','deleteUser',['id']],
    'annonces/delete' => ['AnnoncesController','delete',['id']],
];
