<?php
class PassedExam{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn; 
    }

    public function getExams($programs_id,$year){
        $sql = "SELECT *
                FROM exams
                WHERE programs_id = ? AND year = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bind_param("ii",$programs_id,$year);
        $stmt -> execute();

        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function create_rem_exam($student_id,$exam_id,$ECTS,$year){
        $sql = "INSERT INTO passed_exams (student_id,exam_id,ECTS,year,try_attempts,pass) 
                VALUES (?,?,?,?,0,0)";
        $stmt = $this -> conn ->prepare($sql);
        $stmt->bind_param('iiii',$student_id,$exam_id,$ECTS,$year);
        $result = $stmt ->execute();

        if($result){
            return true;
        }else{
            return false;
        }


    }

    public function get_rem_exam($student_id,$year){
        $sql = "SELECT exams.name,
                        exams.exam_id,
                        passed_exams.year,
                        passed_exams.ECTS,
                        passed_exams.try_attempts
                        FROM passed_exams
                        INNER JOIN exams ON exams.exam_id = passed_exams.exam_id
                        WHERE student_id = ? AND pass = 0 AND passed_exams.year = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bind_param("ii",$student_id,$year);
        $stmt -> execute();

        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function get_pass_exam($student_id){
        $sql = "SELECT exams.name,
                        passed_exams.year,
                        passed_exams.ECTS,
                        passed_exams.grade
                        FROM passed_exams
                        INNER JOIN exams ON exams.exam_id = passed_exams.exam_id
                        WHERE student_id = ? AND pass = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bind_param("i",$student_id);
        $stmt -> execute();

        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function get_exam_info($exam_id){
        $sql = "SELECT *
                FROM exams
                WHERE exam_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bind_param("i",$exam_id);
        $stmt -> execute();

        $results = $stmt->get_result();
        return $results->fetch_assoc();

    }

    public function simulate_exam($exam_id,$student_id,$try_attempts){
        $randomScore = rand(1,100);
        $isPassed = ($randomScore >= 51);
        $grade = null;
        if($isPassed){
            switch (true) {
                case ($randomScore >= 51 && $randomScore < 61):
                    $grade = 6;
                    break;
                case ($randomScore >= 61 && $randomScore < 71):
                    $grade = 7;
                    break;
                case ($randomScore >= 71 && $randomScore < 81):
                    $grade = 8;
                    break;
                case ($randomScore >= 81 && $randomScore < 91):
                    $grade = 9;
                    break;
                default:
                    $grade = 10;
                    break;
            }
            $pass = 1;
            $_SESSION['message']['type'] = "success";
            $_SESSION['message']['text'] = "Congratulations! You passed the exam with " . $randomScore . " points.";
            $sql = "UPDATE passed_exams SET grade = ?,try_attempts = ? ,pass = ?
                    WHERE exam_id = ? AND student_id = ?";
            $stmt = $this -> conn ->prepare($sql);
            $stmt->bind_param('iiiii',$grade,$try_attempts,$pass,$exam_id,$student_id);
            $stmt -> execute();
            header("Location: passed_exams.php");

        }else{
            $att = 0;
            $att = intval($try_attempts) + 1;
            $_SESSION['message']['type'] = "danger";
            $_SESSION['message']['text'] = "Sorry, you didn't pass the exam. You had " . $randomScore . " points.";
            $sql = "UPDATE passed_exams SET try_attempts = ? 
                    WHERE exam_id = ? AND student_id = ?";
            $stmt = $this -> conn ->prepare($sql);
            $stmt->bind_param('iii',$att,$exam_id,$student_id);
            $stmt -> execute();
            header("Location: remaining_exams.php");
        }
    }


}