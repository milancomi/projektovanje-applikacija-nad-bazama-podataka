<?php echo include("layout/header.php");
require  __DIR__ . '/database/authcheck.php';
require  __DIR__ . '/database/fetchAllUsers.php';

?>
<div class="container">
  <?php

  if (isset($_SESSION['message'])) {
  ?>

    <div class="alert alert-danger msg text-center" role="alert">
      <?= $_SESSION['message']['data'] ?>
    </div>

  <?php }
  unset($_SESSION['message']);
  ?>
  <h1 class="text-center">Tabela registrovanih korisnika</h1>
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if (mysqli_num_rows($users) > 0) {
      ?>


        <?php
        $i = 0;
        while ($user = mysqli_fetch_array($users)) {
          $i++;
        ?>
          <tr>
            <th scope="row"><?= $i ?></th>

            <td> <?= $user['firstname'] ?></td>
            <td> <?= $user['lastname'] ?></td>
            <td> <?= $user['mail'] ?></td>
          </tr>


      <?php

        }
      } else {
        echo "<h3 class='text-center'>There are no users in database!";
      }
      ?>
    </tbody>
  </table>
</div>
<?= include("layout/footer.php"); ?>