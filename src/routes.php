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
    'Admin/category' => ['CategoryController', 'addCategory',],
    'items/delete' => ['ItemController', 'delete',],
    '_searchbar' => ['CategoryController', 'showCategory',],
    'report' => ['ReportController', 'showReports',],
    'contact' => ['ContactController', 'contact',],
    'inscription' => ['InscriptionController','inscription',],
    'connexion' => ['ConnexionController','connexion',],
    'Admin' => ['DashboardController', 'dashboard',],
    'Admin/gestion-des-categories' => ['DashboardController', 'gestionCategory',],
    'Admin/gestion-des-utilisateurs' => ['DashboardController', 'gestionUser',],
    'Admin/gestion-des-utilisateurs/editer' => ['DashboardController', 'editUser',],
    'Admin/moderation-des-annonces' => ['DashboardController', 'moderationAnnonces',],
    'Admin/informations-personnelles' => ['DashboardController', 'informationsUser',],
    'annonces/search' => ['CategoryController', 'searchAd', ['categorie', 'searchbar']],
    'mentionlegales' => ['MentionLegalesController','mentionlegales',],
    'register' => ['UserController', 'register',],
    'login' => ['UserController', 'login'],
    'logout' => ['UserController', 'logout'],
    'error' => ['ErrorController','Error',],
    'user/delete' => ['UserController','deleteUser',['id']],
    'annonces' => ['AnnonceController', 'annonce',],
    'annonceSearch' => ['AnnonceController', 'annonceSearch', ['page', 'category', 'type']],
    'annonceCount' => ['AnnonceController', 'countAds',],
    'deposer-une-annonce' => ['AnnonceController', 'newAnnonces',],
    'annonces/detail-annonce' => ['AnnonceController', 'annoncesDetail', ['id']],
    'annonces/delete' => ['AnnonceController','delete',['id']],
    'annonce/detail-annonce/reponse' => ['AnnonceController', 'repondre',],
];
