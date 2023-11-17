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

            if (empty($error)) {
            $newCategoryManager = new CategoryManager();
            $newCategoryManager->insertCategory($newCategory);

            header('Location:/Admin/category');
            return null;
            }
        }

        return $this->twig->render('Admin/gestion-des-categories.html.twig', ['errors' => $errors]);
    }

        public function showCategory(): string
        {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Admin/gestion-des-categories.html.twig', ['categories' => $categories]);
        }

        public function delete($id)
        {
            $categoryManager = new CategoryManager();
            $categoryManager->delete($id);
    
            header('location:/Admin/category');
        }
}
