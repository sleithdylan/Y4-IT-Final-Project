<?php
// Include Google Client Library for PHP autoload file
require_once '../../../vendor/autoload.php';
require_once("../../../config/dbconnection.php");

class Quiz {
    
public function get_mcq_ids()
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT `english_quiz_id` FROM `EnglishQuiz`;";
        
        $mcq_ids_array = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $mcq_id_array)
        {
            $mcq_ids_array[] = $mcq_id_array;
        }
        
        $mcq_ids = NULL;
        foreach($mcq_ids_array as $mcq_id_array)
        {
            $mcq_ids[] = $mcq_id_array["english_quiz_id"];            
        }
        return $mcq_ids;
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
    
public function get_mcqs($mcqids)
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT * FROM `EnglishQuiz` WHERE `english_quiz_id` IN ({$mcqids});";
        
        $mcqs = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $mcq)
        {
            $mcqs[] = $mcq;
        }
        return $mcqs;
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