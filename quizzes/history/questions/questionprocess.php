<?php
// Include Google Client Library for PHP autoload file
require_once '../../../vendor/autoload.php';
require_once("../../../config/dbconnection.php");

class MCQ {
    
public function add_mcq()
{
    $mcq["question"] = $_POST["question"];        
    $mcq["answer_one"] = $_POST["answer_one"];        
    $mcq["answer_two"] = $_POST["answer_two"];        
    $mcq["answer_three"] = $_POST["answer_three"];        
    $mcq["answer_four"] = $_POST["answer_four"];        
    $mcq["correct_answer"] = $_POST["correct_answer"];

    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $insertQuery = "INSERT INTO `HistoryQuiz` ";
        $insertQuery .= "(`question`,`answer_one`,`answer_two`,`answer_three`,`answer_four`,`correct_answer`) ";
        $insertQuery .= " VALUES ";
        $insertQuery .= "(:question,:answer_one,:answer_two,:answer_three,:answer_four,:correct_answer);";
        
        $preparedQuery = $dbconn->prepare($insertQuery);
        $result = $preparedQuery->execute($mcq);
        
        if ($result == 1)
        {
            header("location: viewquestion.php");
            exit;
        }
        
        $dbconn = NULL;
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
    
public function update_mcq()
{
    $mcq["question"] = $_POST["question"];        
    $mcq["answer_one"] = $_POST["answer_one"];        
    $mcq["answer_two"] = $_POST["answer_two"];        
    $mcq["answer_three"] = $_POST["answer_three"];        
    $mcq["answer_four"] = $_POST["answer_four"];        
    $mcq["correct_answer"] = $_POST["correct_answer"];
    $mcq["history_quiz_id"] = $_POST["history_quiz_id"];
    

    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $updateQuery = "UPDATE `HistoryQuiz` SET ";
        $updateQuery .= " `question` = :question , `answer_one`= :answer_one,`answer_two` = :answer_two, `answer_three` = :answer_three ,`answer_four` = :answer_four,`correct_answer` = :correct_answer ";
        $updateQuery .= " WHERE `history_quiz_id` = :history_quiz_id ; ";
        
        $preparedQuery = $dbconn->prepare($updateQuery);
        $result = $preparedQuery->execute($mcq);
        
        if ($result == 1)
        {
            header("location: viewquestion.php");
            exit;
        }
        
        $dbconn = NULL;
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
    
public function get_mcqs()
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT * FROM `HistoryQuiz` ORDER BY history_quiz_id DESC ;";
        
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
    
public function get_mcq($mcqid)
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT * FROM `HistoryQuiz` WHERE `history_quiz_id`= '{$mcqid}' LIMIT 1;";
        
        $mcq = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $mcqq)
        {
            $mcq = $mcqq;
        }
        return $mcq;
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
    
public function delete_mcq()
{
    $mcq["history_quiz_id"] = $_GET["history_quiz_id"];
    
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $deleteQuery = "DELETE FROM `HistoryQuiz` WHERE `history_quiz_id` = :history_quiz_id ; ";
        
        $preparedQuery = $dbconn->prepare($deleteQuery);
        $result = $preparedQuery->execute($mcq);
        
        if ($result == 1)
        {
            header('refresh:0; url=./viewquestion.php');
        }
        
        $dbconn = NULL;
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