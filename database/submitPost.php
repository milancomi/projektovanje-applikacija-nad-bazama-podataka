<?php

require  __DIR__ . '/../configuration.php';

$dbServername = DB_SERVER_NAME;
$dbUsername = DB_USER_NAME;
$dbPassword = DB_PASSWORD;
$dbName = DB_NAME;


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $story_name = $_POST['story_name'];
    $story_text = $_POST['story_text'];
    $user_id = $_POST['user_id'];





    if (empty($story_name) || empty($story_text)) {

        $data = "Molim Vas, popunite sva polja.";
        $_SESSION['message'] = [
            'data' => $data
        ];

        $_SESSION['form_data'] = [
            'story_name' => $story_name,
        ];

        header('Location: ../addPost.php');

    }else {

    $story_name = stripcslashes($story_name);  
    $story_text = stripcslashes($story_text);  
    $user_id = stripcslashes($user_id);  


    
    $story_name = mysqli_real_escape_string($conn, $story_name);  
    $story_text = mysqli_real_escape_string($conn, $story_text);  
    $user_id = mysqli_real_escape_string($conn, $user_id);  

    $sql =  "INSERT INTO stories (story_name, story_text,user_id) VALUES ('$story_name', '$story_text','$user_id')";
   
    try{
        mysqli_query($conn,$sql);
    }catch(\Exception $e){
        
        $msg = $e->getMessage();
        return $msg;
        exit();
    }

    $status = true;
    

    $data = "Uspešno ste dodali vic !";

    $_SESSION['message'] = [
        'status' => $status,
        'data' => $data
    ];

    header('Location: ' . '../posts.php');
}
}