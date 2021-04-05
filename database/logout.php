<?php
session_start();

$data= "Uspešno ste se odjavili"; 

$_SESSION['message']=[
    'status'=>$status,
    'data'=>$data
];
unset($_SESSION['user_data']);



header('Location:../index.php');
