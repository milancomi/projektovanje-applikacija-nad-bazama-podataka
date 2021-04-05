<?php

require  __DIR__ . '/../configuration.php';

$dbServername = DB_SERVER_NAME;
$dbUsername = DB_USER_NAME;
$dbPassword = DB_PASSWORD;
$dbName = DB_NAME;


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    if(empty($password) || empty($mail)) 
    {
        session_start();

        $data= "Please fill all fields.";
        $_SESSION['message']=[
            'data'=>$data];

        $_SESSION['form_data'] = [
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'mail'=>$mail,
            'authetnicated'=>false
        ];
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
$mail = stripcslashes($mail);  
$password = stripcslashes($password);  
$mail = mysqli_real_escape_string($conn, $mail);  
$password = mysqli_real_escape_string($conn, $password);  

$sql = "select *from users where mail = '$mail' and password = '$password'";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  


if($count == 1){  
    $firstname = $row['firstname'];
    $id= $row['id'];

    session_start();

    $data="Uspešno ste se ulogovali";

    $_SESSION['message']=[
        'data'=>$data
    ];
    
    if (isset($_SESSION['loginRemind'])) {
        unset($_SESSION['loginRemind']);
    }

    $_SESSION['user_data'] = [
        'firstname' => $firstname,
        'id' =>$id,
        'authetnicated' => true
    ];

    header('Location: ../index.php');
}  
else{  
    session_start();

    $data= "Pogrešni podaci,pokušajte ponovo.";
    $_SESSION['message']=[
        'data'=>$data];

    $_SESSION['form_data'] = [
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'mail'=>$mail,
        'authetnicated'=>false
    ];
    header('Location: ' . $_SERVER['HTTP_REFERER']);}     

}