<?php

class ViewUser extends User {

    public function showAllUsers() {
       $datas = $this->getAllUsers();
       foreach ($datas as $data) {
           echo "Username is " .$data['uid']. '<br>';
           echo "Password is " .$data['pwd']. '<br>';
       }
    }
}

?>