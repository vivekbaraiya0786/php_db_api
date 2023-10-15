
<?php

class User_Config {
    public $HOSTNAME = "localhost";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DB_NAME = "user_info";
    public $connect_res;

    public function connect() {
        $this->connect_res = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        return $this->connect_res;
    }

    public function user_insert($name,$email,$password) {
        $this->connect();

       $hash_password =  password_hash($password,PASSWORD_DEFAULT);//hash alogorithm in form string

        // $name = mysqli_real_escape_string($this->connect_res, $name); 
        // $email = mysqli_real_escape_string($this->connect_res, $email); 
        // $password = mysqli_real_escape_string($this->connect_res, $password); 
        $query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$hash_password');"; 
        $res = mysqli_query($this->connect_res, $query); 
        return $res;
    }

    public function sign_in($email,$password){
        $this->connect();

        $query = "SELECT * FROM users WHERE email='$email';";

        $obj =mysqli_query($this->connect_res,$query); //return object

        $record = mysqli_fetch_assoc($obj);

        $_hash_password = $record['password'];

        $is_password_verified = password_verify($password,$_hash_password); //return boolean

        if($is_password_verified){
            return true;
        }else{
            return false;
        }
    }
    public function fetch_data() {
        $this->connect();
        $query = "SELECT * FROM users"; 
        $res = mysqli_query($this->connect_res, $query); //return object
        return $res;
    }

    public function delete($id) {
        $this->connect();
        $query = "DELETE FROM users WHERE id=$id"; 
        $res = mysqli_query($this->connect_res, $query); 
        return $res;            // return bool
    }



    public function fetch_single_data($id) {
        $this->connect();
        $query = "SELECT * FROM users WHERE id=$id"; 
        $res = mysqli_query($this->connect_res, $query); //return object
        return $res;            
    }


    public function Update($id) {
        $this->connect();
        
        $query = "UPDATE users WHERE id=$id;"; 
        $res = mysqli_query($this->connect_res, $query); //return bool
        return $res;            
    }

    
}
?>
