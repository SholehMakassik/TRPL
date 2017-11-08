<?php

namespace Kode\Controller;

class ErrorController
{

    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/error/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
