<?php

require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];

if(empty($fname)){
    echo ("Please enter your First Name !!!");
}else if(strlen($fname) > 45){
    echo("First Name must have less than 50 characters");
}else if(empty($lname)){
    echo ("Please enter your Last Name !!!");
}else if(strlen($lname) > 45){
    echo("Last Name must have less than 50 characters");
}else if(empty($email)){
    echo("Please enter your Email !!");
}else if(strlen($email) >= 100){
    echo("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email!!!");
}else{

    $rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n > 0){
        echo ("User with the same Email already exists.");
    }else{

        Database::iud("INSERT INTO `admin` (`fname`,`lname`,`email`) 
        VALUES ('".$fname."','".$lname."','".$email."')");

        echo ("success");


    }
    
}
