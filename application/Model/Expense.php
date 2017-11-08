<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 11/2/2017
 * Time: 2:52 PM
 */

namespace Kode\Model;


use Kode\Core\Model;

class Expense extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM expenseview";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getExpense($expID)
    {
        $sql = "SELECT * FROM expenseview WHERE expID = :expID";
        $query = $this->db->prepare($sql);
        $parameters = array(':expID' => $expID);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function addExpense($expProjectID, $expOwner, $expType, $expNominal, $expProof)
    {
        $sql = "INSERT INTO expense(expProjectID, expOwner, expType, expNominal, expProof) VALUES (:expProjectID,:expOwner,:expType,:expNominal, :expProof)";
        $query = $this->db->prepare($sql);
        $parameters = array(':expProjectID' => $expProjectID, ':expOwner' => $expOwner, ':expType' => $expType, ':expNominal' => $expNominal, ':expProof' => $expProof);
        $query->execute($parameters);
    }

    public function updateExpense($expProjectID, $expOwner, $expType, $expNominal, $expProof, $expID)
    {
        $sql = "UPDATE expense SET expProjectID= :expProjectID,expOwner= :expOwner,expType= :expType,expNominal= :expNominal,expProof= :expProof,expStatus= :expStatus WHERE expID=:expID";
        $query = $this->db->prepare($sql);
        $parameters = array(':expID' => $expID, ':expOwner' => $expOwner, ':expType' => $expType, ':expProjectID' => $expProjectID, ':expNominal' => $expNominal, ':expProof' => $expProof);
        $query->execute($parameters);
    }
}