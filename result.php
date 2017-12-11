<?php
session_start();
include 'include/ChromePhp.php';
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<!-- HTML container -->
<div class="container">
<div class="grid-x grid-margin-x grid-margin-y">
    <header class="cell">
        <p class="title flex-center">Job Finder</p>
        <div class="links flex-center">
            <a href="./index.php">Discover your passion in life!</a>
        </div>
        
    </header>
    <hr>
</div>
<div class="grid-x grid-margin-x grid-margin-y">
    <main class="cell">
    
<?php

include_once 'include/connection_config.php';
$username = $_SESSION['username'];

$result = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM users WHERE username = $username"));

$userid = $result['id'];

$sql = "SELECT * FROM surveys WHERE userid = $userid LIMIT 1";
$result = mysqli_query($conn,$sql);


if($result !== false || mysqli_num_rows($result > 0)){
    $result = mysqli_fetch_assoc($result);
    
    $score['UXdesigner']= 0;
    $score['Backend']=0;
    $score['Frontend']=0;
    $score['Database']=0;

    foreach($result as $key=>$value){
        if ($key!=='id'&& $key!='userid'){
            if($value==1)
                $score['UXdesigner']++;
            else if($value ==2)
                $score['Frontend']++;
            else if($value ==3)
                $score['Backend']++;
            else if($value ==4)
                $score['Database']++;
        }
    }

    $appJob = 'UXdesigner';
    $max = 0;
    foreach($score as $key=>$value){
        if($value > $max) {
            $max = $value;
            $appJob = $key;
        }
    }
?>
<p><?php echo 'Appropriate Job: '.$appJob;?></p>
<?php if ($appJob == 'UXdesigner') {?> 
<div>
Put in info for UXdesigner
</div>


<?php } ?>

<?php if ($appJob == 'Backend') {?> 
    <div>
    Put in info for Backend
    </div>
    
    
    <?php } ?>

<?php if ($appJob == 'Database') {?> 
    <div>
    Put in info for Database
    </div>
    
    
    <?php } ?>

<?php if ($appJob == 'Frontend') {?> 
    <div>
    Put in info for Frontend
    </div>
    
    
    <?php } ?>


    
    <?php
    
    ChromePhp::log($score);
    

} else {
    echo "Error: ". $sql. "<br>". mysqli_error($conn);
}



mysqli_close($conn);
?>
<a href="./survey.php" class="button hollow">Start Survey Again!</a>
</main>
</div>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://surveyjs.azureedge.net/0.97.0/survey.jquery.min.js"></script>

</body>
</html>

