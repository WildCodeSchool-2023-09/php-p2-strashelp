<?php

namespace App\Controller;

use App\Model\AnnonceManager;

class AnnonceController extends AbstractController
{
    public function annonce(): string
    {
        $annoncesList = new AnnonceManager();
        $annonces = $annoncesList->selectAllAd();

        return $this->twig->render('Components/card.html.twig', ['annonces' => $annonces]);
    }
}
