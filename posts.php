<?php echo include("layout/header.php"); ?>

<?php
require  __DIR__ . '/database/authcheck.php';
require  __DIR__ . '/database/fetchAllPosts.php';
?>
<?php

if (isset($_SESSION['message'])) {
?>

<div class="alert alert-danger msg text-center" role="alert">
      <?= $_SESSION['message']['data'] ?>
  </div>
<?php
}
unset($_SESSION['message']);

?>

<div class="container">
  <div class="row justify-content-md-center">
  <?php
  if (mysqli_num_rows($posts) > 0) {
  ?>


    <?php
    while ($post = mysqli_fetch_array($posts)) {
    ?>
      <div class="col col-md-7 mt-5 ">

        <div class="card">
          <h3 class="card-header text-center"><?= $post['story_name'] ?></h3>
          <div class="card-body">
            <p class="card-text"><?= $post['story_text'] ?></p>
            <h5 class="card-title text-center">by:<?= $post['firstname'] ?></h5>

          </div>
        </div>
      </div>
  <?php

    }
  } else {
    echo "<h3 class='text-center'>Trenutno nema podataka!";
  }
  ?>
</div>
</div>
<?php echo include("layout/footer.php"); ?>