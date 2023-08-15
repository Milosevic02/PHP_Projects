<?php
class History{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn; 
    }

    public function add_to_history($student_id,$exam_id){
        $sql = "INSERT INTO history (student_id,exam_id) VALUES (?,?)";
        $stmt = $this -> conn ->prepare($sql);

        $stmt -> bind_param("ii",$student_id,$exam_id);

        $result = $stmt->execute();
    }

    public function get_history($student_id){
        $sql = "SELECT 
                exams.name,
                passed_exams.year,
                history.date,
                passed_exams.ECTS,
                passed_exams.grade
                FROM history
                INNER JOIN exams ON exams.exam_id = history.exam_id
                INNER JOIN passed_exams ON passed_exams.student_id = history.student_id
                AND passed_exams.exam_id = history.exam_id
                WHERE history.student_id = ?";
        $stmt = $this -> conn->prepare($sql);
        $stmt -> bind_param('i',$student_id);
        $stmt -> execute();

        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}