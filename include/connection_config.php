<?php 
    $server = "sql3.freesqldatabase.com";
    $username = "sql3208317";
    $password = "CeU3VqYt9e";
    $db = "sql3208317";

    $conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }
    
    function redirectTo($url,$statusCode = 303){
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    
?>
