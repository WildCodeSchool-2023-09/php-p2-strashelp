<?php

namespace App\controller;

use App\Controller\AbstractController;
use App\Model\AnnonceManager;
use App\Model\UserManager;

class DashboardController extends AbstractController
{
    public function dashboard()
    {
        return $this->twig->render("Admin/dashboard.html.twig");
    }

/*  Fonction réalisée dans le CategoryController, à déplacer ?
    public function gestionCategory()
    {
        return $this->twig->render("Admin/gestion-des-categories.html.twig");
    }*/

    public function moderationAnnonces($id)
    {
        $annonceManager = new AnnonceManager();
        $annonceManager->delete($id);
        return $this->twig->render("Admin/moderation-des-annonces.html.twig");
    }

    public function gestionUser($id)
    {
        $userManager = new UserManager();
        $userManager->delete($id);
        return $this->twig->render("Admin/gestion-des-utilisateurs.html.twig");
    }

    public function editUser()
    { 
        /*update*/
        return $this->twig->render("Admin/edition-utilisateur.html.twig");
    }

    public function informationsUser()
    { 
        /*select*/
        return $this->twig->render("Admin/informations-personnelles.html.twig");
    }
}
