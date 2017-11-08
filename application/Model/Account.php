<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 11/10/2017
 * Time: 13:43
 */

namespace Kode\Model;

use Kode\Core\Model;
use Kode\Libs\Helper;

class Account extends Model
{
    public function getAll(){
        $sql = "SELECT UserID, Username, Password, UserLevel FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getLoginData($Username, $Password ){
        $sql = "SELECT UserID, Username, UserLevel FROM user where Username= :Username and Password = :Password";
        $query = $this->db->prepare($sql);
        $parameters = array(':Username' => $Username, ':Password' => $Password);

        $query->execute($parameters);
        return $query->fetch();
    }

    public function getKaryawanList(){
        $sql = "SELECT Username as name, UserID as value FROM user where UserLevel='Karyawan'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}