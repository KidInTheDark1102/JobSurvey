<?php
    session_start();
?>
<html>
<head>
    <style>

    </style>
    <link type="text/css" rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="flex-center full-height">
    <form action="register.php" method="POST">
        <div>
            <input type="text" name="username" placeholder="User Name">
            <input type="password" name="password" placeholder="Password">
            <input type="email" name="email" placeholder = "Email Address">
            <input class="button" type="submit">
            
<?php
    include_once 'include/connection_config.php';
    
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        if($_POST['username']!==''&&$_POST['password']!==''){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $sql = "SELECT id, username, password, email
                FROM users 
                WHERE username = $username 
                LIMIT 1";
            $result = mysqli_query($conn,$sql);
            if($result === false|| mysqli_num_rows($result)===0){
                $sql = "INSERT INTO users (username, password, email) VALUES ('$username','$password','$email')";
                query_to_db($conn, $sql);
            } else {
                echo "User name already exists!";
            }
        }
        mysqli_close($conn);
    }

    function query_to_db($conn, $sql){
        $result = mysqli_query($conn, $sql);

        if($result){
            $_SESSION["username"]=$_POST['username'];
            redirectTo('./index.php');
        } else {
            echo "Error: ". $sql. "<br>". mysqli_error($conn);
        }
    }
?>
        </div>
    </form>
</div>


</body>
</html>