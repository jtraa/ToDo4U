<?php

class Show extends Dbh {

    public function ReadOnlyWithOOP(){

        $stmt = $this->connect()->prepare("SELECT * FROM tasks");
        $stmt->execute(['task']);

        if($stmt->rowCount()) {
            while ($row = $stmt->fetch()) {
                return $row['task'];

            }
        }
        
    }
}