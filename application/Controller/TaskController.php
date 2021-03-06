<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 19/10/2017
 * Time: 1:04
 */

namespace Kode\Controller;

use Kode\Core\LoggedIn;
use Kode\Model\Account;
use Kode\Model\Category;
use Kode\Model\Project;
use Kode\Model\Task;
use Kode\Model\TaskComment;

class TaskController extends LoggedIn
{
    const CName = 'task';
    public function updateTask()
    {
        if (isset($_POST["submit_update_task"])) {
            $input = $_POST;
            $compDate = null;
            if (isset($_POST['TaskStatus'])) {
                $status = 1;
                $compDate = date("Y-m-d");
            } else {
                $status = 0;
            }

            $Task = new Task();
            $Task->updateTask($input['ProjectID'], $input['TaskName'], $input['TaskDesc'], $input['TaskDueDate'], $_SESSION['UserID'], $status, $compDate,$input['TaskID']);
            $Task->cleanTaskWorker($input['TaskID']);
            foreach ($input['TaskWorker'] as $value) {
                $Task->addTaskWorker($input['TaskID'], $value);
            }
            $Task->cleanTaskCategory($input['TaskID']);
            foreach($input['TaskCategory'] as $cat){
                $Task->addTaskCategory($input['TaskID'],$cat);
            }
        }

        header('location: ' . URL . 'project/view/' . $_POST['ProjectID']);
    }

    public function addTask()
    {
        if (isset($_POST["submit_insert_task"])) {
            $input = $_POST;

            $Task = new Task();
            $Task->addTask($input['ProjectID'], $_SESSION['UserID'], $input['TaskDueDate'],$input['TaskDesc'],$input['TaskName']);
            $lastIndex = $Task->db->lastInsertId();
            foreach ($input['TaskWorker'] as $value) {
                $Task->addTaskWorker($lastIndex, $value);
            }
            foreach($input['TaskCategory'] as $cat){
                $Task->addTaskCategory($lastIndex,$cat);
            }
        }
        header('location: ' . URL . 'project/view/' . $_POST['ProjectID']);
    }

    public function getTaskPerProject($ProjectID)
    {
        $Task = new Task();
        return $task = $Task->getTaskPerProject($ProjectID);
    }

    public function edit($TaskID)
    {
        $Task = new Task();
        $task = $Task->getTask($TaskID);

        $Category = new Category();
        $Project = new Project();

        $category = $Category->getAll();
        $pCat = $Project->getCategory($task->ProjectID);
        $tCat = $Task->getTaskCategory($TaskID);

        $Account = new Account();
        $account = $Account->getKaryawanList();

        $worker = $Task->getWorker($TaskID);

        require APP . 'view/_templates/header.php';
        require APP . 'view/task/edit.php';
        require APP . 'view/_templates/footer.php';

    }

    public function add($ProjectID)
    {
        $Account = new Account();
        $account = $Account->getKaryawanList();

        $Category = new Category();
        $Project = new Project();

        $category = $Category->getAll();
        $pCat = $Project->getCategory($ProjectID);

        require APP . 'view/_templates/header.php';
        require APP . 'view/task/add.php';
        require APP . 'view/_templates/footer.php';

    }


    public function view($TaskID)
    {
        $Task = new Task();
        $task = $Task->getTask($TaskID);
        $worker = $Task->getWorker($TaskID);
        $tCat = $Task->getTaskCategory($TaskID);

        $Category = new Category();
        $category = $Category->getAll();

        $TaskComment = new TaskComment();
        $taskComment = $TaskComment->getComment($TaskID);

        require APP . 'view/_templates/header.php';
        require APP . 'view/task/view.php';
        require APP . 'view/_templates/footer.php';
    }

    public function doComment()
    {
        if (isset($_POST['submit_comment'])) {
            //upload file
            $input = $_POST;
            $input['TaskFiles'] = null;
            //var_dump($_FILES);die();
            $file = $_FILES['TaskFiles'];
            //if file uploaded
            if (is_uploaded_file($file["tmp_name"]) && $file["error"] === 0) {
                $name = $file['name'];
                //Replace whitespace with underscore
                $name = str_replace(' ', '_', $name);
                //make dir if not exist
                if (!file_exists('task/' . $_POST['TaskID'])) {
                    mkdir('task/' . $_POST['TaskID'], 0777, true);
                }
                //set path
                $path = "taskFiles/" . $_POST['TaskID'] . '/' . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    // Move succeed.
                    $input['TaskFiles'] = basename($name);
                } else {
                    // Move failed. Possible duplicate?

                }
            }


            $Comment = new TaskComment();
            $Comment->addComment($_SESSION["UserID"], $input['comment'], $input['TaskID'], $input['TaskFiles']);
        }

        header('location: ' . URL . 'task/view/' . $_POST['TaskID']);
    }
}