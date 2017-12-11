<?php
    session_start();
    include 'ChromePhp.php';

    

    $result = json_decode($_POST['surveyResult']);

    
    include_once 'connection_config.php';
    if(isset($result->question1)){
        $question1 = $result->question1;
    } else {
        $question1 = 0;
    }

    
    if(isset($result->question2)){
        $question2 = $result->question2;
    } else {
        $question2 = 0;
    }
    if(isset($result->question3)){
        $question3 = $result->question3;
    } else {
        $question3 = 0;
    }
    if(isset($result->question4)){
        $question4 = $result->question4;
    } else {
        $question4 = 0;
    }
    if(isset($result->question5)){
        $question5 = $result->question5;
    } else {
        $question5 = 0;
    }
    if(isset($result->question6)){
        $question6 = $result->question6;
    } else {
        $question6 = 0;
    }
    if(isset($result->question7)){
        $question7 = $result->question7;
    } else {
        $question7 = 0;
    }
    if(isset($result->question8)){
        $question8 = $result->question8;
    } else {
        $question8 = 0;
    }
    if(isset($result->question9)){
        $question9 = $result->question9;
    } else {
        $question9 = 0;
    }
    if(isset($result->question10)){
        $question10 = $result->question10;
    } else {
        $question10 = 0;
    }
    if(isset($result->question11)){
        $question11 = $result->question11;
    } else {
        $question11 = 0;
    }

    
    if(isset($result->question12)){
        $question12 = $result->question12;
    } else {
        $question12 = 0;
    }
    if(isset($result->question13)){
        $question13 = $result->question13;
    } else {
        $question13 = 0;
    }
    if(isset($result->question14)){
        $question14 = $result->question14;
    } else {
        $question14 = 0;
    }
    if(isset($result->question15)){
        $question15 = $result->question15;
    } else {
        $question15 = 0;
    }
    if(isset($result->question16)){
        $question16 = $result->question16;
    } else {
        $question16 = 0;
    }
    if(isset($result->question17)){
        $question17 = $result->question17;
    } else {
        $question17 = 0;
    }
    if(isset($result->question18)){
        $question18 = $result->question18;
    } else {
        $question18 = 0;
    }
    if(isset($result->question19)){
        $question19 = $result->question19;
    } else {
        $question19 = 0;
    }
    if(isset($result->question20)){
        $question20 = $result->question20;
    } else {
        $question20 = 0;
    }
    if(isset($result->question21)){
        $question21 = $result->question21;
    } else {
        $question21 = 0;
    }
    if(isset($result->question22)){
        $question22 = $result->question22;
    } else {
        $question22 = 0;
    }
    if(isset($result->question23)){
        $question23 = $result->question23;
    } else {
        $question23 = 0;
    }
    if(isset($result->question24)){
        $question24 = $result->question24;
    } else {
        $question24 = 0;
    }
    if(isset($result->question25)){
        $question25 = $result->question25;
    } else {
        $question25 = 0;
    }
    if(isset($result->question26)){
        $question26 = $result->question26;
    } else {
        $question26 = 0;
    }
    if(isset($result->question27)){
        $question27 = $result->question27;
    } else {
        $question27 = 0;
    }

    $username = $_SESSION['username'];
    
    $sql = "SELECT id
    FROM users 
    WHERE username = $username LIMIT 1";
    
    
    $result = mysqli_query($conn, $sql);
    if($result===false|| mysqli_num_rows($result)===0){
        die();
    } else {
        $result = mysqli_fetch_assoc($result);
        $userid = $result['id'];

        $sql = "SELECT id FROM surveys WHERE userid = $userid";
        $result = mysqli_query($conn,$sql);
        if($result===false || mysqli_num_rows($result)===0){
             $sql = "INSERT INTO surveys (userid,question1,question2,question3,question4,question5,question6,question7,question8,question9,question10,question11,question12,question13,question14,question15,question16,question17,question18,question19,question20,question21,question22,question23,question24,question25,question26,question27) VALUES 
            ($userid,$question1,$question2,$question3,$question4,$question5,$question6,$question7,$question8,$question9,$question10,$question11,$question12,$question13,$question14,$question15,$question16,$question17,$question18,$question19,$question20,$question21,$question22,$question23,$question24,$question25,$question26,$question27)";

            $result = mysqli_query($conn, $sql);
        } else {
            $sql = "DELETE FROM surveys WHERE userid = $userid";
            mysqli_query($conn,$sql);
            $sql = "INSERT INTO surveys (userid,question1,question2,question3,question4,question5,question6,question7,question8,question9,question10,question11,question12,question13,question14,question15,question16,question17,question18,question19,question20,question21,question22,question23,question24,question25,question26,question27) VALUES 
            ($userid,$question1,$question2,$question3,$question4,$question5,$question6,$question7,$question8,$question9,$question10,$question11,$question12,$question13,$question14,$question15,$question16,$question17,$question18,$question19,$question20,$question21,$question22,$question23,$question24,$question25,$question26,$question27)";

            mysqli_query($conn, $sql);
        }
        
       

        mysqli_close($conn);
    }
?>