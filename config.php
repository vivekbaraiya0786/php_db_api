
<?php

class Config {
    public $HOSTNAME = "localhost";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DB_NAME = "employee_info";
    public $connect_res;

    public function connect() {
        $this->connect_res = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        return $this->connect_res;
    }

    public function insert($name,$post,$salary) {
        $this->connect();
        // $id = mysqli_real_escape_string($this->connect_res, $id); 
        // $name = mysqli_real_escape_string($this->connect_res, $name); 
        // $post = mysqli_real_escape_string($this->connect_res, $post); 
        // $salary = mysqli_real_escape_string($this->connect_res, $salary); 
        $query = "INSERT INTO employee(name,post,salary) VALUES('$name','$post','$salary');"; 
        $res = mysqli_query($this->connect_res, $query); 
        return $res;
    }

    public function fetch_data() {
        $this->connect();
        $query = "SELECT * FROM employee"; 
        $res = mysqli_query($this->connect_res, $query); //return object
        return $res;
    }

    public function delete($id) {
        $this->connect();
        
        $query = "DELETE FROM employee WHERE id=$id"; 
        $res = mysqli_query($this->connect_res, $query); 
        return $res;            // return bool
    }

    // public function delete($id) {
    //     $this->connect();
    //     if (!is_numeric($id)) {
    //         return false; 
    //     }
    
    //     $id = mysqli_real_escape_string($this->connect_res, $id);
    //     $query = "DELETE FROM employee WHERE id='$id'";
    //     $res = mysqli_query($this->connect_res, $query);
    
    //     return $res;
    // }
    



    public function fetch_single_data($id) {
        $this->connect();
        $query = "SELECT * FROM employee WHERE id=$id"; 
        $res = mysqli_query($this->connect_res, $query); //return object
        return $res;            
    }


    public function Update($id, $name, $post, $salary) {
        $this->connect();
        
        $id = mysqli_real_escape_string($this->connect_res, $id);
        $name = mysqli_real_escape_string($this->connect_res, $name);
        $post = mysqli_real_escape_string($this->connect_res, $post);
        $salary = mysqli_real_escape_string($this->connect_res, $salary);
    
        $query = "UPDATE employee SET name='$name', post='$post', salary='$salary' WHERE id='$id'"; 
        $res = mysqli_query($this->connect_res, $query); //return bool
        return $res;            
    }
    

    
}
?>
