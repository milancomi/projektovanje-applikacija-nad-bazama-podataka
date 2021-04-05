<?php echo include("layout/header.php"); ?>



<div class="container main-wrapper">
  <div class="row">
    <div class="col col-lg-2">
    </div>
    <div class="col col-lg-6">
      <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5">
        <form method="POST" action="database/registerUser.php">
          <h1 class="text-center ">Register</h1>

          <?php

          if (isset($_SESSION['message'])) : ?>


<div class="alert alert-danger msg text-center" role="alert">
                <?php

                echo $_SESSION['message']['data'];
                unset($_SESSION['message']);
                ?>
            </div>
          <?php endif ?>
          <div class="form-group ">
            <label for="firstname">First name</label>
            <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo (isset($_SESSION['form_data']['firstname']) ? htmlspecialchars($_SESSION['form_data']['firstname']) : ''); ?>">
          </div>
          <div class="form-group ">
            <label for="lastname">Last name</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo (isset($_SESSION['form_data']['lastname']) ? htmlspecialchars($_SESSION['form_data']['lastname']) : ''); ?>">
          </div>
          <div class="form-group ">
            <label for="mail">Email address</label>

            <input type="mail" name="mail" value="<?php echo (isset($_SESSION['form_data']['mail']) ? htmlspecialchars($_SESSION['form_data']['mail']) : ''); ?>" class="form-control" id="mail" placeholder="Enter email">

          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>

          <?php
          if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
          } ?>
          <div class="col text-center">
            <button type="submit" value="Submit" class="btn myBtn btn-primary">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php echo include("layout/footer.php"); ?>