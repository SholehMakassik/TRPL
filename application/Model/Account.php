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

    public function getUserData($UserID)
    {
        $sql = "SELECT UserID, Username, Password, UserLevel FROM user WHERE UserID = :UserID";
        $query = $this->db->prepare($sql);
        $parameters = array(':UserID' => $UserID);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function getLoginData($Username, $Password ){
        $sql = "SELECT UserID, Username, UserLevel FROM user where Username= :Username and Password = MD5(:Password)";
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

    public function addUser($Username, $Password, $UserLevel){
        $sql="INSERT INTO user (Username, Password, UserLevel) VALUES (:Username, MD5(:Password), :UserLevel)";
        $query = $this->db->prepare($sql);
        $parameters = array(':Username' => $Username, ':Password' => $Password, ':UserLevel' => $UserLevel);
        $query->execute($parameters);
    }

    public function updateUsername($Username, $UserID){
        $sql="UPDATE user SET Username = :Username WHERE UserID = :UserID";
        $query = $this->db->prepare($sql);
        $parameters = array(':Username' => $Username, ':UserID' => $UserID);
        $query->execute($parameters);
    }

    public function updateUserLevel($UserLevel, $UserID){
        $sql="UPDATE user SET UserLevel = :UserLevel WHERE UserID = :UserID";
        $query = $this->db->prepare($sql);
        $parameters = array(':UserLevel' => $UserLevel, ':UserID' => $UserID);
        $query->execute($parameters);
    }

    public function updateUserPassword($Password, $UserID){
        $sql="UPDATE user SET Password = MD5(:Password) WHERE UserID = :UserID";
        $query = $this->db->prepare($sql);
        $parameters = array(':Password' => $Password, ':UserID' => $UserID);
        $query->execute($parameters);
    }

}