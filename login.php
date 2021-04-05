<?php echo include("layout/header.php"); ?>



<div class="container main-wrapper">
  <div class="row">
    <div class="col col-lg-2">
    </div>
    <div class="col col-lg-6">
      <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5">
        <form method="POST" action="database/loginUser.php">
          <h1 class="text-center ">Login</h1>

          <?php
          if (isset($_SESSION['message'])) : ?>

<div class="alert alert-danger msg text-center" role="alert">

                <?php

                echo $_SESSION['message']['data'];
                unset($_SESSION['message']);
                ?>
</div>
              </p>
            </div>
          <?php endif ?>
          <div class="form-group ">
            <label for="mail">Email address</label>

            <input type="mail" name="mail" value="<?php echo (isset($_SESSION['form_data']['mail']) ? htmlspecialchars($_SESSION['form_data']['mail']) : ''); ?>" class="form-control" id="mail" placeholder="Enter email">

          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>

          <?php if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
          } ?>
          <div class="col text-center">
            <button type="submit" value="Submit" class="btn myBtn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php echo include("layout/footer.php"); ?>