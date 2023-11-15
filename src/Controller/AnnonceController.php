<?php

namespace App\Controller;

use App\Model\AnnonceManager;

/**
* @SuppressWarnings(PHPMD)
**/
class AnnonceController extends AbstractController
{
    public function annonce(): string
    {
        $annoncesList = new AnnonceManager();
        $annonces = $annoncesList->selectAll();

        return $this->twig->render('Annonce/card.html.twig', ['annonces' => $annonces]);
    }

    /* Show
    public function show(int $create): string
    {
        $createAnnonces = new AnnonceManager();
        $showAnnonces = $createAnnonces->selectOneById($showAnnonces);

        return $this->twig->render('annonces/detail-annonces.html.twig', ['showAnnonces' => $showAnnonces]);
    }
    // Fin show */

    public function newAnnonces()
    {
        $errors = [];
        $ads = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadDir = './assets/images';
            $uniqueName = uniqid('', true) . basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $uniqueName;
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $authorizedExtensions = ['jpg', 'jpeg', 'png'];
            $maxFileSize = 1000000;

            $ads = array_map('trim', $_POST);

            if (!isset($ads['ads_type']) || empty($ads['ads_type'])) {
                $errors['ads_type'] = "Veuillez choisir un type d'annonce";
            }

            if (!isset($ads['category']) || empty($ads['category'])) {
                $errors['category'] = "Veuillez choisir une catégorie";
            }

            if (!isset($ads['title']) || empty($ads['title'])) {
                $errors['title'] = "Donnez un titre";
            }

            if (!isset($ads['description']) || empty($ads['description'])) {
                $errors['description'] = "Donnez une description";
            }

            if (strlen($ads['description']) > 800) {
                $errors['description'] = "Rentrez une description de moins de 800 caractères";
            }

            if (strlen($ads['description']) < 35) {
                $errors['description'] = "Rentrez une description d'au moins 35 caractères";
            }

            if ((!in_array($extension, $authorizedExtensions))) {
                $errors['image'] = 'Veuillez sélectionner une image de type Jpg ou Png !';
            }

            if (
                file_exists($_FILES['image']['tmp_name']) && filesize($_FILES['image']['tmp_name']) > $maxFileSize
                || filesize($_FILES['image']['tmp_name']) == 0
            ) {
                $errors['image'] = "Votre fichier doit faire moins de 1M !";
            }

            if (empty($errors)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
                $createAnnonces = new AnnonceManager();
                $create = $createAnnonces->createAnnonce($ads);
                header('Location:/annonces/show?id=' . $create);
            }
        }

        return $this->twig->render('Components/Annonce/deposer-une-annonce.html.twig', ['create' => $ads]);
    }
}
