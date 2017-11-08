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
        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete FROM projects";
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
        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete FROM projects where Deal=1";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCompleted()
    {
        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete FROM projects where Complete=1";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getProject($ProjectID)
    {

        $sql = "SELECT ProjectID, ClientMail, ProjectName, Proposal, Deadline, Deal, Complete FROM projects WHERE ProjectID = :ProjectID LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':ProjectID' => $ProjectID);
        $query->execute($parameters);
        return $query->fetch();

    }

    public function updateProject($ClientMail, $ProjectName, $Proposal, $Deadline, $ProjectID, $Deal, $Complete)
    {
        $sql = "UPDATE projects SET ClientMail = :ClientMail, ProjectName = :ProjectName, Proposal = :Proposal, Deadline = :Deadline, Deal= :Deal, Complete= :Complete WHERE ProjectID = :ProjectID";
        $query = $this->db->prepare($sql);
        $parameters = array(':ClientMail' => $ClientMail, ':ProjectName' => $ProjectName, ':Proposal' => $Proposal, ':Deadline' => $Deadline, ':ProjectID' => $ProjectID, ':Deal' =>$Deal, ':Complete' => $Complete);
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
}