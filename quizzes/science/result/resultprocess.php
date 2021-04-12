<?php

require_once("../../../config/dbconnection.php");

$student_fullname = $studentData['student_fullname'];
class Result {

    
public function add_result($science_result_marks, $student_fullname)
{
    try
    {
        $reslt["science_result_marks"] = $science_result_marks;
        $reslt["student_fullname"] = $student_fullname;
        
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $insertQuery = "INSERT INTO ScienceResults(science_result_marks,student_fullname) 
        VALUES('$science_result_marks', '$student_fullname')";
        
        
        $preparedQuery = $dbconn->prepare($insertQuery);
        $result = $preparedQuery->execute($reslt);
        
        if ($result == 1)
            header('refresh:0; url=../../../student/dashboard.php');
    }
    catch (PDOException $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
    catch (Exception $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
}
    
public function get_results_by_user($student_fullname)
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT * FROM `ScienceResults`;";
        
        $reslts = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $rslt)
        {
            $reslts[] = $rslt;
        }
        return $reslts;
    }
    catch (PDOException $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
    catch (Exception $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
}  
    
}

?>