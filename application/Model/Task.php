<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 17/10/2017
 * Time: 12:46
 */

namespace Kode\Model;


use Kode\Core\Model;
use Kode\Libs\Helper;

class Task extends Model
{
    public function getTaskPerProject($ProjectID)
    {
        $sql = "SELECT * from taskview where ProjectID = :ProjectID";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function updateTask($ProjectID, $TaskName, $TaskDesc, $TaskDueDate, $TaskAuthor, $TaskStatus, $TaskCompleteDate,$TaskID)
    {
        $sql = "UPDATE task SET ProjectID = :ProjectID, TaskName = :TaskName, TaskDesc = :TaskDesc, TaskDueDate = :TaskDueDate, TaskAuthor = :TaskAuthor, TaskStatus = :TaskStatus, TaskCompleteDate = :TaskCompleteDate WHERE TaskID=:TaskID";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID, ':TaskName' => $TaskName, ':TaskDesc' => $TaskDesc, ':TaskDueDate' => $TaskDueDate, ':TaskAuthor' => $TaskAuthor, ':TaskStatus' => $TaskStatus, ':TaskID' => $TaskID, ':TaskCompleteDate' => $TaskCompleteDate);
        $query->execute($parameters);
    }

    public function getTask($TaskID)
    {
        $sql = "SELECT * from taskview where TaskID = :TaskID";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function addTaskWorker($TaskID, $WorkerID)
    {
        $sql = "INSERT INTO taskworker (TaskID, UserID) VALUES (:TaskID, :WorkerID)";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID, ':WorkerID' => $WorkerID);
        $query->execute($parameters);
    }

    public function cleanTaskWorker($TaskID)
    {
        $sql = "DELETE FROM taskworker WHERE TaskID=:TaskID";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID);
        $query->execute($parameters);
    }

    public function getWorker($TaskID)
    {
        $sql = "SELECT UserID from taskworker where TaskID = :TaskID";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID);
        $query->execute($parameters);
        return $query->fetchAll(\PDO::FETCH_COLUMN, 0);
    }

    public function getTaskCategory($TaskID)
    {
        $sql = "SELECT categoryID from taskcategory where TaskID = :TaskID";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID);
        $query->execute($parameters);
        return $query->fetchAll(\PDO::FETCH_COLUMN, 0);
    }

    public function addTaskCategory($TaskID,$CategoryID)
    {
        $sql = "INSERT INTO taskcategory (TaskID, categoryID) VALUES (:TaskID, :CategoryID)";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID, ':CategoryID' => $CategoryID);
        $query->execute($parameters);
    }

    public function cleanTaskCategory($TaskID)
    {
        $sql = "DELETE FROM taskcategory WHERE TaskID=:TaskID";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID);
        $query->execute($parameters);
    }

    public function addTask($ProjectId, $TaskAuthor, $TaskDueDate, $TaskDesc, $TaskName)
    {
        $sql = "INSERT INTO task (ProjectID, TaskAuthor,TaskDueDate,TaskDesc,TaskName) VALUES (:ProjectID, :TaskAuthor,:TaskDueDate, :TaskDesc, :TaskName)";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectId, ':TaskAuthor' => $TaskAuthor, ':TaskDueDate' => $TaskDueDate, ':TaskDesc' => $TaskDesc, ':TaskName' => $TaskName);
        $query->execute($parameters);
    }
}