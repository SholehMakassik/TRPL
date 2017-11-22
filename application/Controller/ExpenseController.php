<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 11/2/2017
 * Time: 2:17 PM
 */

namespace Kode\Controller;


use Kode\Core\LoggedIn;
use Kode\Model\Expense;
use Kode\Model\Project;

class ExpenseController extends LoggedIn
{
    const CName = 'expense';

    public function index()
    {
        if (isset($_SESSION['Username']) && isset($_SESSION['UserLevel'])) {
            $submenu = "all";
            $Expense = new Expense();
            if ($_SESSION['UserLevel'] == 'SuperAdmin') {

                $expense = $Expense->getAll();
            } else {
                $expense = $Expense->getMine($_SESSION['Username']);
            }

            $_SESSION['Controller'] = self::CName;
            require APP . 'view/_templates/header.php';
            require APP . 'view/expense/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            echo "fuk"; die();
        header('location: ' . URL . 'account/login');
        }
    }

    public function edit($expID)
    {
        $Project = new Project();
        $project = $Project->getIdName();
        $Expense = new Expense();
        $expense = $Expense->getExpense($expID);

        require APP . 'view/_templates/header.php';
        require APP . 'view/expense/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        $Project = new Project();
        $project = $Project->getIdName();

        require APP . 'view/_templates/header.php';
        require APP . 'view/expense/add.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete($expID)
    {

        if (isset($expID)) {
            $Expense = new Expense();
            $Expense->deleteExpense($expID);
        }

        header('location: ' . URL . 'expense');
    }

    public function addExpense(){
        if (isset($_POST["submit_insert_expense"])) {
        $data = $_POST;

            $file = $_FILES['expProof'];
            $name = $file['name'];
            //Replace whitespace with underscore, Makes ProjectName as Filename
            //$name = str_replace(' ', '_', $name);
            $tmp = explode('.',$name);
            $file_ext=strtolower(end($tmp));
            $name = hash_file('sha256',$file['tmp_name']) . '.'.$file_ext;
            //echo $name;die();
            $path = "expenseFiles/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
                // Move succeed.
                $data['expProof'] = $name;
            } else {
                // Move failed. Possible duplicate?

            }
        $Expense = new Expense();
        $Expense->addExpense($data['Project'], $_SESSION['UserID'],$data['expType'],$data['expNominal'],$data['expProof']);
        }
        header('location: ' . URL . 'expense');
    }

    public function updateExpense(){
        if (isset($_POST['submit_update_expense'])){
            $data = $_POST;

            $file = $_FILES['expProof'];
            $name = $file['name'];
            if (!empty($name)){
                //Replace whitespace with underscore, Makes ProjectName as Filename
                //$name = str_replace(' ', '_', $name);
                $tmp = explode('.',$name);
                $file_ext=strtolower(end($tmp));
                $name = hash_file('sha256',$file['tmp_name']) . '.'.$file_ext;
                //echo $name;die();
                $path = "expenseFiles/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    // Move succeed.
                    $data['expProof'] = $name;
                } else {
                    // Move failed. Possible duplicate?
                    //warning
                }
            }

            $Expense = new Expense();
            $Expense->updateExpense($data['Project'],$_SESSION['UserID'],$data['expType'],$data['expNominal'],$data['expProof'],$data['expStatus'],$data['expID']);
            header('location: ' . URL . 'expense');
        }
    }
}