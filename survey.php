<?php
    session_start();
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
            <div id="surveyContainer"></div>
            <div id="resultcontainer"></div>
        </main>
    </div>

</div>
<?php
    include_once 'include/connection_config.php';
    mysqli_close($conn);
?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://surveyjs.azureedge.net/0.97.0/survey.jquery.min.js"></script>
    <script>
     Survey.Survey.cssType = "bootstrap";
     
    var surveyJSON = { surveyId: 'f3bea9cc-81e9-40a5-b17c-1038dc968979'}
    var http = new XMLHttpRequest();

     function sendDataToServer(survey) {
         var jsonObject = JSON.stringify(survey.data);
        $.ajax({type:'POST',
            dataType:'json',
            url: "include/survey_server.php",
            data: {surveyResult: jsonObject}
        });

        $('#resultcontainer').replaceWith("<a href='./result.php' class='button'>See result</a>");

     }
     
     var survey = new Survey.Model(surveyJSON);
     $("#surveyContainer").Survey({
         model: survey,
         onComplete: sendDataToServer
     });
    </script>

</body>
</html>