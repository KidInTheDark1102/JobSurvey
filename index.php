<?php
    session_start();
?>
<html>
<head>
    <style>
    table,
    td {
        border: 1px solid gray;
    }

    </style>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="flex-center full-height">
    <div class="top-right links">
    <?php 
    
    ?>
            <?php if (!isset($_SESSION['username'])) {?>
                <a href="./login.php">Login</a>
                <a href="./register.php">Register</a>
            <?php } ?>
            <?php if (isset($_SESSION['username'])) {?>
                <a href="#">Hi <?php echo $_SESSION['username'] ?></a>
                <a href="./logout.php">Logout</a>
            <?php } ?>
    </div>
    <div class="content ">
        <div class="title m-b-md">
            Job Finder
        </div>
        <?php if (isset($_SESSION['username'])){ ?>
            <div class="links">
                <a href="./survey.php">Start Survey</a>
            </div>
            
        <?php } ?>
    </div>
</div>

<?php

?>
    



</body>
</html>