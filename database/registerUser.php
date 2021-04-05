<?php

require  __DIR__ . '/../configuration.php';

$dbServername = DB_SERVER_NAME;
$dbUsername = DB_USER_NAME;
$dbPassword = DB_PASSWORD;
$dbName = DB_NAME;


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    $firstname = stripcslashes($firstname);  
    $lastname = stripcslashes($lastname);  
    $mail = stripcslashes($mail);  
    $password = stripcslashes($password);

    
    $lastname = mysqli_real_escape_string($conn, $lastname);  
    $firstname = mysqli_real_escape_string($conn, $firstname);  
    $mail = mysqli_real_escape_string($conn, $mail);  
    $password = mysqli_real_escape_string($conn, $password);  


    if (empty($firstname) || empty($lastname) || empty($password) || empty($mail)) {

        $status = false;
        $data = "Molim Vas, popunite sva polja.";
        $_SESSION['message'] = [
            'status' => $status,
            'data' => $data
        ];

        $_SESSION['form_data'] = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'mail' => $mail,
            'authetnicated' => false
        ];

        header('Location: ../register.php');

    }else if (strlen($password) < 8) {

        $status = false;
        $data = "Šifra mora imati minimum 8 karaktera.";
        $_SESSION['message'] = [
            'status' => $status,
            'data' => $data
        ];

        $_SESSION['form_data'] = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'mail' => $mail,
            'authetnicated' => false
        ];

        header('Location: ../register.php');
    } else {








    mysqli_query($conn, "INSERT INTO users (firstname, lastname,password,mail) VALUES ('$firstname', '$lastname','$password','$mail')");
    $status = true;

    $id = mysqli_insert_id($conn);
    $data = "Uspešno ste se registrovali !";

    $_SESSION['message'] = [
        'status' => $status,
        'data' => $data
    ];

    $_SESSION['user_data'] = [
        'firstname' => $firstname,
        'id'=>$id,
        'lastname' => $lastname,
        'authetnicated' => true
    ];

    if (isset($_SESSION['loginRemind'])) {
        unset($_SESSION['loginRemind']);
    }

    header('Location: ' . '../index.php');
}
}