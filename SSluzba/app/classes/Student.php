<?php
class Student{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn; 
    }

    public function create($name,$program,$email ,$password){

        if($this -> emailExists($email)){
            return -1;
        }
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO students (name,program,email,password,accademic_year) VALUES (?,?,?,?,1)";
        $stmt = $this -> conn ->prepare($sql);

        $stmt -> bind_param("ssss",$name,$program,$email,$hashed_password);

        $result = $stmt -> execute();

        if($result){
            return $stmt -> insert_id;
        }else{
            return 0;
        }
    }

    public function emailExists($email) {
        $query = "SELECT student_id FROM students WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
    

    public function login($program,$email,$password){
        $sql = "SELECT student_id,password FROM students 
        WHERE email = ? AND program = ?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param("ss",$email,$program);
        $stmt -> execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $student = $result -> fetch_assoc();

            if(password_verify($password,$student['password'])){
                $_SESSION['student_id'] = $student['student_id'];
                return true;
             }
        }
        return false;
    }

    public function is_logged(){
        if(isset($_SESSION['student_id'])){
            return true;
        }
        return false;
    }

    public function logout(){
        unset($_SESSION['student_id']);
    }

    public function is_admin(){
        $query = "SELECT * FROM students WHERE student_id = ? AND is_admin = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i",$_SESSION['student_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            return true;
        }
        return false;
    }

    public function get_all_info($student_id){
        $query = "SELECT students.*,
                        programs.name AS tag
                    FROM students
                    INNER JOIN programs ON students.program = programs.tag
                 WHERE student_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i",$student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();

    }

    public function update($id,$email,$birth_place,$number,$image){

        $query = "UPDATE  students SET email = ? ,birth_place = ? ,phone_number = ? ,photo_path = ?  WHERE student_id = ?";
        $stmt = $this -> conn ->prepare($query);
        $stmt->bind_param('ssssi',$email,$birth_place,$number,$image,$id);
        $stmt -> execute();
    }

    public function next_year($student_id,$year){
        if($year != 4){
            $year1 = $year + 1;
            $sql = "UPDATE students SET accademic_year = ? WHERE student_id = ?";
            $stmt = $this -> conn ->prepare($sql);
            $stmt->bind_param('ii',$year1,$student_id);
            $stmt -> execute();
            return true;
        }
        return false;
    }


}