<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/myStyle.css">

  <title>PANB</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light pl-5 pr-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="posts.php">Vicevi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addPost.php">Dodaj Vic</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users.php">Korisnici</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown  float-right"></li>
        <?php
        session_start();
        if (isset($_SESSION['user_data'])) {

        ?>
          <li class="nav-item">
          <a class="nav-link">Logged User:&nbsp; <b><?= $_SESSION['user_data']['firstname'] ?></b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="database/logout.php">Logout</a>
          </li>

        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>

        <?php } ?>
      </ul>
    </div>

  </nav>