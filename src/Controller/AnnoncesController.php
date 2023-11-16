<?php

namespace App\Controller;


use App\Controller\AbstractController;
use App\Model\CategoryManager;
use App\Model\AnnoncesManager;


class AnnoncesController extends AbstractController
{
    public function annonce(): string
    {
        $annoncesList = new AnnoncesManager();
        $annonces = $annoncesList->selectAllAd();

        return $this->twig->render('Annonces/card.html.twig', ['annonces' => $annonces]);
    }
}
