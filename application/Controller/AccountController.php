<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 11/10/2017
 * Time: 13:49
 */

namespace Kode\Controller;

use Kode\Model\Account;

class AccountController
{
    const CName = 'account';

    public function index()
    {
        $_SESSION['Controller'] = self::CName;
        require APP . 'view/_templates/header.php';
        require APP . 'view/account/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function login()
    {
        if (!isset($_SESSION['Username']) && !isset($_SESSION['UserLevel'])) {
            if (isset($_POST["submit_login"])) {
                $this->doLogin($_POST["username"], $_POST["password"]);
            }
            require APP . 'view/_templates/header.php';
            require APP . 'view/account/login.php';
            require APP . 'view/_templates/footer.php';
            unset($_SESSION["loginError"]);
        } else {
            header('location: ' . URL);
        }

    }

    public function doLogin($username, $password)
    {
        //login

        $Account = new Account();
        $result = $Account->getLoginData($username, $password);
        if (!$result) {
            $_SESSION["loginError"] = 1;
            //echo $_SESSION["loginError"];
        } else {
            $Level = $result->UserLevel;
            $_SESSION["Username"] = $result->Username;
            $_SESSION["UserLevel"] = $Level;
            $_SESSION["UserID"] = $result->UserID;
            if ($Level == 'SuperAdmin') {
                //redirect to
                header('location: ' . URL . 'project');
            } elseif ($Level == 'CustomerService') {
                header('location: ' . URL . '');
            } elseif ($Level == 'Karyawan') {
                header('location: ' . URL);
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('location: ' . URL);
    }
}