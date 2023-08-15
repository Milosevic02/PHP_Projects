<?php
class Program{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn; 
    }

    public function getAll(){
        $sql = "SELECT * FROM programs";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_programs_id($program){
        $sql = "SELECT programs_id FROM programs WHERE tag = ?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param('s',$program);
        $stmt -> execute();
        $result = $stmt->get_result();
        $res = $result -> fetch_assoc();
        return $res['programs_id'];
    }
}