<?php
    session_start();
?>
<?php
    include_once 'include/connection_config.php';
    session_unset();
    session_destroy();
    mysqli_close($conn);
    redirectTo('./index.php');
?>
