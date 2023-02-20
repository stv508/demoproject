<?php
    include("config.php");
    session_start();
    $userID = $_SESSION['userid'];
    $passd = $_SESSION['password'];
   
    $sessioninfo = mysqli_query($connect,"SELECT * FROM  Users  WHERE `user_id` = '$userID' AND `password` = '$passd' ");
    $sessionRows = mysqli_num_rows($sessioninfo);
    if($sessionRows != 1){
        session_unset();
        session_destroy();
        header("location: index.php");
    }
    
?>