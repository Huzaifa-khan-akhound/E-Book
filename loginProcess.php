<?php
    require_once "db_config.php";
    
    if(isset($_POST["loginBTN"])){
        extract($_POST);
        $query = "SELECT * FROM users WHERE Email='".$email."' AND Password='".$password."'";
        $result = mysqli_query($db, $query);
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION["admin"] = $row;
            header('location:index.php');
        }else{
            header('location:login.php?error=Invalid User please try again');
        }
    }
?>