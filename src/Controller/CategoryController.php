<?php

namespace App\Controller;

use App\Model\CategoryManager;

class CategoryController extends AbstractController
{
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newCategory = array_map('trim', $_POST);

            $newCategoryManager = new CategoryManager();
            $id = $newCategoryManager->insertCategory($newCategory);

            header('Location:/items/show?id=' . $id);
            return null;
        }

        return $this->twig->render('Item/add.html.twig');
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $itemManager = new CategoryManager();
            $itemManager->delete((int)$id);

            header('Location:/items');
        }
    }
}
