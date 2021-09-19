<?php

if(insert($_POST['fname']) && insert($_POST['lname'])&& insert($_POST['email'])&& insert($_POST['message'])){
    include 'db_conn.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    $fname=validate($_POST['fname']);
    $lname=validate($_POST['lname']);
    $email=validate($_POST['email']);
    $message=validate($_POST['message']);

    if(empty($fname)||empty($lname)||empty($email)||empty($message)){
        header("location: index.html");

    }else{
        $sql = "INSERT INTO test(fname,lname,email,message) VALUES('$fname','$lname','$email','$message')";
        $res = mysql_query($conn,$sql);

        if($res){
            echo "Thanks";
        }else{
            echo "sorry";
        }
    }
    
}else{
    header("location: index.html");
}