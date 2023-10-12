
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

    public function user_insert($id, $name,$email,$password) {
        $this->connect();
        $id = mysqli_real_escape_string($this->connect_res, $id); 
        $name = mysqli_real_escape_string($this->connect_res, $name); 
        $email = mysqli_real_escape_string($this->connect_res, $email); 
        $password = mysqli_real_escape_string($this->connect_res, $password); 
        $query = "INSERT INTO users VALUES('$id', '$name','$email','$password');"; 
        $res = mysqli_query($this->connect_res, $query); 
        return $res;
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
