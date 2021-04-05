<?php


if (isset($_SESSION['user_data'])){
  return;
}else{
  
    $_SESSION['loginRemind'] = [
        'status'=>true
    ];
    header('Location:index.php');
}

