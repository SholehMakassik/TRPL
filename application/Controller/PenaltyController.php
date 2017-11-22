<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/19/2017
 * Time: 7:40 PM
 */

namespace Kode\Controller;


use Kode\Core\LoggedIn;
use Kode\Model\Penalty;

class PenaltyController extends LoggedIn
{
    const CName = 'penalty';

    public function index()
    {
        self::task();
    }

    public function task()
    {
        if ($_SESSION['UserLevel'] == 'SuperAdmin') {
            $_SESSION['Controller'] = self::CName;
            $submenu = "task";
            $Penalty = new Penalty();
            $penalty = $Penalty->getAllTaskWorker();

            require APP . 'view/_templates/header.php';
            require APP . 'view/penalty/task.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    public function project()
    {
        if ($_SESSION['UserLevel'] == 'SuperAdmin') {
            $_SESSION['Controller'] = self::  CName;
            $submenu = "task";
            $Penalty = new Penalty();
            $penalty = $Penalty->getAllProject();

            require APP . 'view/_templates/header.php';
            require APP . 'view/penalty/project.php';
            require APP . 'view/_templates/footer.php';
        }
    }
}
