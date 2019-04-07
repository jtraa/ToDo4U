<?php
// 'user' object
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties -> public, privated, protected: waarom welke?
    public $id;
    public $name;
    public $email;
    public $password;
 
    public function __construct($db){
        $this->conn = $db;
    }
       // Register new user record
    public function create(){
    
        $query = "INSERT INTO
                    " . $this->table_name . "
                   (`id`,`name`,`email`, `password`)
                   VALUES (null, :name, :email, :password)";

                          // prepare the query
           $stmt = $this->conn->prepare($query);

            // sanitize
           $this->name=htmlspecialchars(strip_tags($this->name));
           $this->email=htmlspecialchars(strip_tags($this->email));

           // bind the values
           $stmt->bindParam(':name', $this->name);
           $stmt->bindParam(':email', $this->email);
           $stmt->bindParam(':password', $this->password);

           // execute the query, also check if query was successful
           if($stmt->execute()){
               return true;
           }else{
               $this->showError($stmt);
               return false;
           }
       }  

    public function login($email, $password){

        $query = "SELECT email, name, password, ID
        FROM users
        WHERE (email = '$email' OR name = '$email')
        AND password = '$password'";

        $db_result = $this->conn->query($query);

        if ($db_result->rowCount()==1){
            foreach($db_result as $row){
                $firstname = $row['email'];
                $_SESSION['email']=$row['email'];
                $_SESSION['name']=$row['name'];
                $_SESSION['ID']=$row['ID'];
            }

            return true;
        
        } else{
           return false;

        }

    }
    public function logout(){
        // core configuration // destroy session, it will remove ALL session settings //redirect to login page
    include_once "config/core.php";
    session_destroy();
    header("Location: {$home_url}login.php");
    }

}
