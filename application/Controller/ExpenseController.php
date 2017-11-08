<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 11/2/2017
 * Time: 2:17 PM
 */

namespace Kode\Controller;


use Kode\Model\Expense;
use Kode\Model\Project;

class ExpenseController
{
    const CName = 'expense';

    public function index()
    {
        $submenu = "all";
        $Expense = new Expense();
        $expense = $Expense->getAll();
        $_SESSION['Controller'] = self::CName;
        require APP . 'view/_templates/header.php';
        require APP . 'view/expense/index.php';
        require APP . 'view/_templates/footer.php';
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

            } else {
                // Move failed. Possible duplicate?

            }
        $Expense = new Expense();
        $Expense->addExpense($data['Project'], $_SESSION['UserID'],$data['expType'],$data['expNominal'],$name);
        }
        header('location: ' . URL . 'expense');
    }

    public function updateExpense(){
        if (isset($_POST['submit_update_expense'])){}
    }
}