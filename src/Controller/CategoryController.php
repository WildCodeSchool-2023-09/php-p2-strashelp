<?php

namespace App\Controller;

use App\Model\CategoryManager;

class CategoryController extends AbstractController
{
    public function searchAd()
    {
        $resultSearch = [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categorieName = $_GET['categorie'];
            $searchBar = $_GET['searchbar'];
            $categoryManager = new CategoryManager();
            $resultSearch = $categoryManager->search($categorieName, $searchBar);
        }

        return $this->twig->render("Annonce/annonces.html.twig", ['resultSearch' => $resultSearch]);
    }
}
