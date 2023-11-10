<?php

namespace App\Controller;

use App\Model\AnnoncesManager;

class AnnoncesController extends AbstractController
{
    public function annonce(): string
    {
        $annoncesList = new AnnoncesManager();
        $annonces = $annoncesList->selectAll();

        return $this->twig->render('Annonces/card.html.twig', ['annonces' => $annonces]);
    }
}
