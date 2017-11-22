<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/19/2017
 * Time: 8:12 PM
 */

namespace Kode\Model;


use Kode\Core\Model;

class Penalty extends Model
{
    public function getAllTaskWorker(){
        $sql = "SELECT * FROM penaltyview";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getAllProject(){
        $sql = "SELECT * FROM penaltyview";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }



}