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
        if ($_SESSION['UserLevel'] == 'SuperAdmin') {
            $_SESSION['Controller'] = self::CName;

            $Account = new Account();
            $account = $Account->getAll();
            require APP . 'view/_templates/header.php';
            require APP . 'view/account/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL);
        }
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

    public function add()
    {
        if ($_SESSION['UserLevel'] == 'SuperAdmin') {
            require APP . 'view/_templates/header.php';
            require APP . 'view/account/add.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL); //go home
        }
    }

    public function edit($UserID)
    {
        if ($_SESSION['UserLevel'] == 'SuperAdmin') {
            $Account = new Account();
            $account = $Account->getUserData($UserID);

            require APP . 'view/_templates/header.php';
            require APP . 'view/account/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL); //go home
        }
    }

    public function addUser()
    {
        if (isset($_POST['submit_add_user'])) {
            $data = $_POST;
            $Account = new Account();

            $Account->addUser($data['Username'], $data['Password'], $data['UserLevel']);
        }
        header('location: ' . URL . 'account');
    }
    public function updateUser()
    {
        if (isset($_POST['submit_update_user'])) {
            $data = $_POST;
            print_r($data);


            $Account = new Account();
            $Account->updateUsername($data['Username'],$data['UserID']);
            if (!empty($data['Password'])){ //password diedit
                $Account->updateUserPassword($data['Password'],$data['UserID']);
            }
            $Account->updateUserLevel($data['UserLevel'],$data['UserID']);

        }
        header('location: ' . URL . 'account');
    }

}