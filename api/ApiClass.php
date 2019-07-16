<?php

class Api {

    private $connection;

    function __construct()
    {
        $this->connect_db();
    }

    public function connect_db(){
        $this->connection = mysqli_connect('localhost', 'root', '', 'phpcrud');
        if (mysqli_connect_error()){
            die ("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
        }
    }

    public function fetchAllPersons() {
        $sql = "SELECT * FROM `person` ORDER BY id";
        // if ($id) { $sql .= " WHERE id=$id"; }

        $query = mysqli_query($this->connection, $sql);
        $result = array();

        while ($row = mysqli_fetch_array($query)) {
            ARRAY_PUSH($result, array(
                'id' => $row['id'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'email' => $row['email'],
                'gender' => $row['gender'],
                'age' => $row['age']
            ));
        }

        return $result;
        mysqli_close($conn);
    }

    public function fetch($id) {
        $sql = "SELECT * FROM `person` WHERE id=$id";

        $query = mysqli_query($this->connection, $sql);
        $result = array();

        $row = mysqli_fetch_array($query);

		return $row;
        mysqli_close($conn);
	}

    public function insert() {
        if (isset($_POST["firstname"])) {
            $fname = $_POST["firstname"];
            $lname = $_POST["lastname"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $age = $_POST["age"];

            $sql = "INSERT INTO `person` (firstname, lastname, email, gender, age) VALUES ('$fname', '$lname', '$email', '$gender', '$age')";
            $res = mysqli_query($this->connection, $sql);
            
            if ($res) {
                $data[] = array(
                    'success' => '1'
                );
            } else {
                $data[] = array(
                    'success' => '0'
                );
            }
        } else {
            $data[] = array(
                'success' => '0'
            );
        }
        
        return $data;
        mysqli_close($conn);
    }
    
    public function update() {
		if (isset($_POST["firstname"])) {
			$fname = $_POST["firstname"];
            $lname = $_POST["lastname"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $age = $_POST["age"];
            $id = $_POST["id"];

            $sql = "UPDATE `person` SET firstname='$fname', lastname='$lname', email='$email', gender='$gender', age='$age'  WHERE id=$id";
            $res = mysqli_query($this->connection, $sql);

            if ($res) {
                $data[] = array(
                    'success' => '1'
                );
            } else {
                $data[] = array(
                    'success' => '0'
                );
            }
		} else {
			$data[] = array(
                'success' => '0'
            );
        }
        
        return $data;

        mysqli_close($conn);
	}
    
    public function delete($id){
		$sql = "DELETE FROM `person` WHERE id=$id";
        $res = mysqli_query($this->connection, $sql);
         
 		if($res){
            $data[] = array(
				'success'	=>	'1'
			);
 		} else {
            $data[] = array(
				'success'	=>	'0'
			);
        }

        return $data;
        mysqli_close($conn);
	}

}
