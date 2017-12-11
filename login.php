<?php
    session_start();
?>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php

//TODO: modify database;

    include_once 'include/connection_config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(isset($username)&&isset($password)) {
            $sql = "SELECT id, username, password
                FROM users
                WHERE username = $username
                LIMIT 1";
            $result = mysqli_query($conn,$sql);
            if($result != false){
                $_SESSION['username'] = $username;
                mysqli_close($conn);
                redirectTo('./index.php');
            } else {
                echo "Invalid Credentials!";
            }
        }
    }
?>
<div class="flex-center full-height">
    <form action="./login.php" method="POST">
        <input type="text" name="username" placeholder="User Name">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" class="button hollow">
    </form>
</div>

</body>
</html>