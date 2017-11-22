<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/22/2017
 * Time: 5:58 PM
 */

namespace Kode\Model;


use Kode\Core\Model;

class Category extends Model
{
    public function getAll(){
        $sql = "SELECT * FROM category";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}