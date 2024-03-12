<?php

$servername="localhost";
$username="root";
$password="";
$database="website";


    $conn=new mysqli($servername,$username,$password,$database);

    // if($conn->connect_error){
    //     echo"connection failed";
    // }
    // else{
    //     echo " connected succesfully";
    // }
    // if($_SERVER["REQUEST_METHOD"]=="post"){
    //     $user_ip=$_SERVER['REMOTE_ADDR'];
    // }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $ip_address=$_SERVER['REMOTE_ADDR'];
    //$ip_address=$_POST['ip_address'];
    if(empty($name)|| empty($email)||empty($number)||empty($address)){
        echo "please provide fill";
    }

    $sql="insert into contact_form(name,email,number,address,ip_address) values(?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ssiss",$name,$email,$number,$address,$ip_address);
    $stmt->execute();
    //if($stmt->query($sql)==true){
        echo " new record succesfull";
    //}

    
    
    $stmt->close();
    $conn->close();
    }


?>