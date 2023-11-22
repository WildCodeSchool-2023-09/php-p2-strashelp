<?php

namespace App\Controller;

use App\Model\CategoryManager;

class CategoryController extends AbstractController
{
    public function addCategory(): ?string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newCategory = array_map('trim', $_POST);

            if (!isset($newCategory['ajout']) || empty($newCategory['ajout'])) {
                $errors['ajout'] = "Veuillez remplir le champ.";
            }

            if (empty($errors)) {
                $newCategoryManager = new CategoryManager();
                $newCategoryManager->insertCategory($newCategory);

                header('Location:/Admin/category');
                return null;
            }
        }

        return $this->twig->render('Admin/gestion-des-categories.html.twig', ['errors' => $errors]);
    }

        /* a été créée en superglobale, à retirer dès que merge
        public function showCategory(): string
        {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectCategories();
        return $this->twig->render('Admin/gestion-des-categories.html.twig', ['categories' => $categories]);
        }*/

    public function delete($id)
    {
        $categoryManager = new CategoryManager();
        $categoryManager->delete($id);

        header('location:/Admin/category');
    }

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
