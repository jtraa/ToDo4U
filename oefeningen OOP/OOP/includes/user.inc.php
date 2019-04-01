<?php

class User extends Dbh {

    public function getAllUsers(){
        $stmt = $this->connect()->query("SELECT * FROM user");
        while($row = $stmt->fetch()){
            echo $row['uid'];
        }
    }

    public function getUsersWithCountCheck(){
        $id = 1;
        $uid = "admin";

        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE id=? AND uid=?");
        $stmt->execute([$id, $uid]);
        
        if($stmt->rowCount()){
            while ($row = $stmt->fetch()) {
                return $row['uid'];
            }
        }
        
    }
}