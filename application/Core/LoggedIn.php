<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/18/2017
 * Time: 11:58 PM
 */

namespace Kode\Core;


class LoggedIn
{
    public function __construct()
    {
        if (!isset($_SESSION['Username']) && !isset($_SESSION['UserLevel'])) {
            header('location: ' . URL . 'account/login');
        }
    }
}