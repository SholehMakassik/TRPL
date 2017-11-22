<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/22/2017
 * Time: 11:38 AM
 */

namespace Kode\Controller;


use Kode\Core\LoggedIn;

class InvoiceController extends LoggedIn
{
    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/invoice/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function view(){

    }

    public function createHtml(){

    }
}