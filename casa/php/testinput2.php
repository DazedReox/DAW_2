<?php 

    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "Name is required";
        }else{
            $name = test_input($_POST["name"]);
        }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["email"])){
            $emailErr = "Email is required";
        }else{
            $email = test_input($_POST["email"]);
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["gender"])){
            $genderErr = "Gender is required";
        }else{
            $gender = test_input($_POST["gender"]);
        }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["website"])){
            $websiteErr = "Website is required";
        }else{
            $website = test_input($_POST["website"]);
        }
    }

    $age = test_input($_POST["age"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
        $nameErr = "Only letters and white space is allowed";
    }

    $email2 = test_input($_POST["email2"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email error";
    }

    $website = test_input($_POST["website"]);
    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website2)){
        $websiteErr = "URL not valid";
    }
?>