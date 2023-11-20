<?php

namespace App\Controller;

use Twig\Environment;
use App\Model\AnnonceManager;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

/**
 * Initialized some Controller common features (Twig...)
 */
abstract class AbstractController
{
    protected Environment $twig;


    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => false,
                'debug' => true,
            ]
        );
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal('adtypes', $this->showAdType());
    }

    public function showAdType()
    {
        $showAdTypes = new AnnonceManager();
        $adtypes = $showAdTypes->adType();

        return $adtypes;
    }
}
