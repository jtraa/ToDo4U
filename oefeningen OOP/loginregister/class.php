<?php  

include 'dbh.php';
  
class User extends Dbh 
  
{  
    public function __construct() {  
        $db = new Dbh;  
    }  
  
    public function register($trn_date, $name, $username, $email, $pass) {  
        
            $register = "INSERT INTO users (trn_date, name, username, email, password) VALUES ('$trn_date','$name','$username','$email','$pass')" or die(mysql_error());  
            return $register;  
    }  
  
    public function login($email, $pass) {  
        $pass = md5($pass);  
        $check = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$pass'");  
        $data = mysql_fetch_array($check);  
        $result = mysql_num_rows($check);  
        if ($result == 1) {  
            $_SESSION['login'] = true;  
            $_SESSION['id'] = $data['id'];  
            return true;  
        } else {  
            return false;  
        }  
    }  
  
    public function fullname($id) {  
        $result = mysql_query("SELECT * FROM users WHERE id='$id'");  
        $row = mysql_fetch_array($result);  
        echo $row['name'];  
    }  
  
    public function session() {  
        if (isset($_SESSION['login'])) {  
            return $_SESSION['login'];  
        }  
    }  
  
    public function logout() {  
        $_SESSION['login'] = false;  
        session_destroy();  
    }  
}  
  
?>  