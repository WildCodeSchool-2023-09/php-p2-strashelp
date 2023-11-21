<?php

namespace App\controller;

use App\Controller\AbstractController;
use App\Model\AnnonceManager;
use App\Model\UserManager;

class DashboardController extends AbstractController
{
    public function dashboard()
    {
        if (!$this->user) {
            header('Location:/error');
        }

        return $this->twig->render("Admin/dashboard.html.twig");
    }

/*  Fonction réalisée dans le CategoryController, à déplacer ?
    public function gestionCategory()
    {
        return $this->twig->render("Admin/gestion-des-categories.html.twig");
    }*/

    public function moderationAnnonces($id)
    {
        if (!$this->user) {
            header('Location:/error');
        }

        $annonceManager = new AnnonceManager();
        $annonceManager->delete($id);
        return $this->twig->render("Admin/moderation-des-annonces.html.twig");
    }

    public function gestionUser($id)
    {
        if (!$this->user) {
            header('Location:/error');
        }

        $userManager = new UserManager();
        $userManager->delete($id);
        return $this->twig->render("Admin/gestion-des-utilisateurs.html.twig");
    }

    public function editUser(int $id)
    {
        if (!$this->user) {
            header('Location:/error');
        }

        $userManager = new userManager();
        $updatedUser = $userManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $updateFields = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $userManager->updateUsers($updatedUser);

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->twig->render("Admin/edition-utilisateur.html.twig", ['updates' => $updatedUser,
        ]);
    }

    public function informationsUser()
    {
        if (!$this->user) {
            header('Location:/error');
        }

        return $this->twig->render("Admin/informations-personnelles.html.twig");
    }
}
