<?php

namespace Kode\Controller;

class HomeController
{
    const CName = 'home';

    public function index()
    {
        $_SESSION['Controller'] = self::CName;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
