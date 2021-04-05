<?php include("layout/header.php"); ?>

<?php
if (isset($_SESSION['loginRemind'])) {
?>

  <div class="alert alert-danger msg text-center" role="alert">
    Molim vas ulogujte se.
  </div>
<?php } ?>


<?php

unset($_SESSION['loginRemind']);
?>
<?php

if (isset($_SESSION['message'])) {
?>

  <div class="alert alert-primary msg text-center" role="alert">
    <?= $_SESSION['message']['data'] ?>
  </div>

<?php } ?>

<?php
unset($_SESSION['message']);
?>



<div class="container">
  <h2 class="text-center">Zdravo</h2>
  <h4 class="text-center">Milan Dimitrijevic student indeks 004/2015</h4>
  <p class="text-center">U ovom projektu imate login sisitem, u kom svaki user može da objavi vic.</p>
</div>

<?php echo include("layout/footer.php"); ?>