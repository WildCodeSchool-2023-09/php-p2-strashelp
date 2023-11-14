<?php

namespace App\controller;

use App\Controller\AbstractController;
use App\Model\CategoryManager;

class AnnoncesController extends AbstractController
{
    public function annonces()
    {
        return $this->twig->render("annonces/_annonces.html.twig");
    }

    public function searchAd(string $categorieName, string $searchBar)
    {
        $resultSearch = [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $categorieName = $_GET['categorie'];
                $searchBar = $_GET['searchbar'];
                $categoryManager = new CategoryManager();
                $resultSearch = $categoryManager->search($categorieName, $searchBar);
        }
        return $this->twig->render("annonces/_annonces.html.twig", ['resultSearch' => $resultSearch]);
    }
}
