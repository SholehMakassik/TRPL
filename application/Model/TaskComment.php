<?php
/**
 * Created by PhpStorm.
 * User: DWI WAHYU
 * Date: 19/10/2017
 * Time: 4:50
 */

namespace Kode\Model;


use Kode\Core\Model;

class TaskComment extends Model
{
    public function getComment($TaskID){
        $sql = "SELECT * FROM taskcommentview WHERE TaskID = :TaskID";
        $query = $this->db->prepare($sql);
        $parameters = array(':TaskID' => $TaskID);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function addComment($ComAuthor, $Comment, $TaskID, $TaskFiles){
        $sql = "INSERT INTO taskcomment (ComAuthor, Comment, ComTimestamp, TaskID, TaskFiles) VALUES ( :ComAuthor, :Comment, NOW(), :TaskID, :TaskFiles)";
        $query = $this->db->prepare($sql);
        $parameters = array (':ComAuthor'=> $ComAuthor , ':Comment'=>$Comment ,':TaskID'=> $TaskID, ':TaskFiles' => $TaskFiles);

        $query->execute($parameters);
    }
}