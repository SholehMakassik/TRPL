<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 12/10/2017
 * Time: 0:36
 */

namespace Kode\Controller;

use Kode\Core\LoggedIn;
use Kode\Model\Category;
use Kode\Model\Project;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ProjectController extends LoggedIn
{
    const CName = 'project';

    public function index()
    {
        if (isset($_SESSION['Username']) && isset($_SESSION['UserLevel'])) {
            $submenu = "all";
            $Project = new Project();
            $project = $Project->getAll();
            $_SESSION['Controller'] = self::CName;
            require APP . 'view/_templates/header.php';
            require APP . 'view/project/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'account/login');
        }
    }

    public function add()
    {
        if (isset($_SESSION['Username']) && $_SESSION['UserLevel'] == 'CustomerService') {
            $Category = new Category();
            $category = $Category->getAll();

            require APP . 'view/_templates/header.php';
            require APP . 'view/project/add.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'project');
        }
    }

    public function addProject()
    {

        if (isset($_POST["submit_insert_project"])) {
            //upload file
            $file = $_FILES['Proposal'];
            //$name = $file['name'];
            //Replace whitespace with underscore, Makes ProjectName as Filename
            $name = str_replace(' ', '_', $_POST["ProjectName"]) . '.pdf';

            $path = "proposal/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
                // Move succeed.

            } else {
                // Move failed. Possible duplicate?

            }

            //input ke db
            $Project = new Project();
            $Project->addProject($_POST["ClientMail"], $_POST["ProjectName"], basename($name), $_POST["Deadline"]);
            $lastIndex = $Project->db->lastInsertId();
            $Pcat = $_POST['ProjectCategory'];
                //print_r($Pcat);die();
            foreach ($Pcat as $value) {
                //echo $value;die();
                $Project->addCategory($lastIndex, $value);
                //echo '1';
            }

        }

        header('location: ' . URL . 'project');
    }

    public function edit($ProjectID)
    {
        if (isset($_SESSION['Username']) && ($_SESSION['UserLevel'] == 'CustomerService' || $_SESSION['UserLevel'] == 'SuperAdmin')) {
            if (isset($ProjectID)) {
                $Project = new Project();
                $project = $Project->getProject($ProjectID);

                $Category = new Category();
                $category = $Category->getAll();
                $projectCategory = $Project->getCategory($ProjectID);

                require APP . 'view/_templates/header.php';
                require APP . 'view/project/edit.php';
                require APP . 'view/_templates/footer.php';
            } else {
                header('location: ' . URL . 'project');
            }
        } else {
            header('location: ' . URL . 'project');
        }
    }

    public function view($ProjectID)
    {
        if (isset($ProjectID)) {
            $Project = new Project();
            $project = $Project->getProject($ProjectID);
            $pCat = $Project->getCategory($ProjectID);

            $Category = new Category();
            $category = $Category->getAll();

            $Task = new TaskController();
            $task = $Task->getTaskPerProject($ProjectID);
            //$data = (array)$project;



            require APP . 'view/_templates/header.php';
            require APP . 'view/project/view.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'project');
        }
    }

    public function updateProject()
    {

        if (isset($_POST["submit_update_project"])) {
            //input post to variable
            $input = $_POST;
            //upload file
            $file = $_FILES['Proposal'];
            //check if file uploaded
            if (is_uploaded_file($file["tmp_name"]) && $file["error"] === 0) {

                //$name = $file['name'];
                //Replace whitespace with underscore, Makes ProjectName as Filename
                $name = str_replace(' ', '_', $input["ProjectName"]) . '.pdf';

                $path = "proposal/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    // Move succeed. Replace Proposal name
                    $input['Proposal'] = basename($name);
                } else {
                    // Move failed. Possible duplicate?
                }
            }
            //no file uploaded, so last file still okay
            else {
                $input['Proposal'] = $_POST['Proposal'];

            }


            //checkbox
            if (isset($input['Deal'])) {
                $status['Deal'] = 1;
            } else {
                $status['Deal'] = 0;
            }
            if (isset($input['Complete'])) {
                $status['Complete'] = 1;
            } else {
                $status['Complete'] = 0;
            }

            $Project = new Project();
            $Project->updateProject($input["ClientMail"], $input{"ProjectName"}, $input{"Proposal"}, $input["Deadline"], $input["ProjectID"], $status['Deal'], $status['Complete']);
            $Project->cleanCategory($input['ProjectID']);
            foreach ($input['ProjectCategory'] as $value) {
                $Project->addCategory($input['ProjectID'], $value);
            }
        }

        header('location: ' . URL . 'project');
    }

    public function deleteProject($ProjectID)
    {

        if (isset($ProjectID)) {
            $Project = new Project();
            $Project->deleteProject($ProjectID);
        }

        header('location: ' . URL . 'project');
    }

    public function dealt()
    {
        if (isset($_SESSION['Username']) && isset($_SESSION['UserLevel'])) {
            $submenu = 'dealt';
            $Project = new Project();
            $project = $Project->getDealt();
            $_SESSION['Controller'] = self::CName;
            require APP . 'view/_templates/header.php';
            require APP . 'view/project/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'account/login');
        }
    }

    public function completed()
    {
        if (isset($_SESSION['Username']) && isset($_SESSION['UserLevel'])) {
            $submenu = 'completed';
            $Project = new Project();
            $project = $Project->getCompleted();
            $_SESSION['Controller'] = self::CName;
            require APP . 'view/_templates/header.php';
            require APP . 'view/project/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'account/login');
        }
    }

    public function all()
    {
        header('location: ' . URL . 'project'); //go to index
    }

    public function send($ProjectID)
    {

        if (isset($ProjectID)) {
            if (isset($_POST['submit_send_mail'])) {
                $Project = new Project();
                $project = $Project->getProject($ProjectID);
                $data = (array)$project;
                $Body = "Deadline : " . $data['Deadline'];
                //print_r($data);die();
                $this->sendMail($data['ClientMail'], 'Pengajuan Proyek ' . $data['ProjectName'], $Body, $data['Proposal']);
            }
        }

    }

    public function sendMail($Sendto, $Subject, $Body, $Attachment)
    {
        //echo $Sendto . $Subject . $Body . $Attachment; die();
        $mail = new PHPMailer(false);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = EMAIL_PASS;
        $mail->setFrom('pemaso666@gmail.com', 'First Last');
        $mail->addReplyTo('pemaso666@gmail.com', 'First Last');
        $mail->addAddress($Sendto, 'Client');
        $mail->Subject = $Subject;
        $mail->Body = $Body;
        $mail->addAttachment('proposal/' . $Attachment);
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            die();
        } else {
            echo "Message sent!";
            header('location: ' . URL . 'project');
        }

    }
}