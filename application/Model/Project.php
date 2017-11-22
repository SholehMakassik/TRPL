<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 12/10/2017
 * Time: 0:25
 */

namespace Kode\Model;

use Kode\Core\Model;

class Project extends Model
{
    public function getAll()
    {
        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete, CompleteDate FROM projects";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getIdName()
    {
        $sql = "SELECT ProjectID, ProjectName FROM projects";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getDealt()
    {
        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete, CompleteDate FROM projects where Deal=1";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCompleted()
    {
        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete, CompleteDate FROM projects where Complete=1";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getProject($ProjectID)
    {

        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete, CompleteDate, Price, Contract FROM projects WHERE ProjectID = :ProjectID LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID);
        $query->execute($parameters);
        return $query->fetch();

    }

    public function updateProject($ClientMail, $ProjectName, $Proposal, $Deadline, $ProjectID, $Deal,$CompleteDate, $Complete, $Price, $Contract)
    {
        $sql = "UPDATE projects SET ClientMail = :ClientMail, ProjectName = :ProjectName, Proposal = :Proposal, Deadline = :Deadline, Deal= :Deal, Complete= :Complete, CompleteDate = :CompleteDate, Price = :Price, Contract = :Contract WHERE ProjectID = :ProjectID";
        $query = $this->db->prepare($sql);
        $parameters = array(':ClientMail' => $ClientMail, ':ProjectName' => $ProjectName, ':Proposal' => $Proposal, ':Deadline' => $Deadline, ':ProjectID' => $ProjectID, ':Deal' =>$Deal, ':Complete' => $Complete, ':CompleteDate'=>$CompleteDate, ':Price'=>$Price, ':Contract'=>$Contract);
        $query->execute($parameters);
    }

    public function addProject($ClientMail, $ProjectName, $Proposal, $Deadline)
    {
        $sql = "INSERT INTO projects (ClientMail, ProjectName, Proposal, Deadline) VALUES (:ClientMail, :ProjectName, :Proposal, :Deadline)";
        $query = $this->db->prepare($sql);
        $parameters = array(':ClientMail' => $ClientMail, ':ProjectName' => $ProjectName, ':Proposal' => $Proposal, ':Deadline' => $Deadline);
        $query->execute($parameters);
    }

    public function deleteProject($ProjectID)
    {
        $sql = "DELETE FROM projects WHERE ProjectID = :ProjectID";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID);
        $query->execute($parameters);
    }

    public function addCategory($ProjectID,$CategoryID){
        $sql = "INSERT INTO projectcategory (ProjectID, CategoryID) VALUES (:ProjectID, :CategoryID)";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID, ':CategoryID' => $CategoryID);
        $query->execute($parameters);
    }
    public function cleanCategory($ProjectID){
        $sql = "DELETE FROM projectcategory WHERE ProjectID = :ProjectID";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID);
        $query->execute($parameters);
    }
    public function getCategory($ProjectID){
        $sql = "SELECT CategoryID from projectcategory where ProjectID = :ProjectID";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID);
        $query->execute($parameters);
        return $query->fetchAll(\PDO::FETCH_COLUMN, 0);
    }
}