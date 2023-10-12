/*

<!-- <?php

class Config {
    public $HOSTNAME = "localhost";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DB_NAME = "student_info";
    public $connect_res;

    public function connect() {
        $this->connect_res = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        return $this->connect_res;
    }

    public function insert($id, $name) {
        $this->connect();
        $id = mysqli_real_escape_string($this->connect_res, $id); 
        $name = mysqli_real_escape_string($this->connect_res, $name); 
        $query = "INSERT INTO student VALUES('$id', '$name');"; 
        $res = mysqli_query($this->connect_res, $query); 
        return $res;
    }

    public function fetch_data() {
        $this->connect();
        $query = "SELECT * FROM student"; 
        $res = mysqli_query($this->connect_res, $query); //return object
        return $res;
    }

    public function delete($id) {
        $this->connect();
        $query = "DELETE FROM student WHERE id=$id"; 
        $res = mysqli_query($this->connect_res, $query); 
        return $res;            // return bool
    }



    public function fetch_single_data($id) {
        $this->connect();
        $query = "SELECT * FROM student WHERE id=$id"; 
        $res = mysqli_query($this->connect_res, $query); //return object
        return $res;            
    }


    public function Update($id) {
        $this->connect();
        $query = "UPDATE student SET name='$name' WHERE id=$id;"; 
        $res = mysqli_query($this->connect_res, $query); //return bool
        return $res;            
    }

    
}
?> -->

*/

