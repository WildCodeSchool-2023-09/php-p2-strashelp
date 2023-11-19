<?php

namespace App\Controller;

use App\Model\CategoryManager;

class CategoryController extends AbstractController
{
    public function showCategory(): string
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Searchbar/searchbar.html.twig', ['categories' => $categories]);
    }
}
