<?php echo include("layout/header.php");
require  __DIR__ . '/database/authcheck.php';
require  __DIR__ . '/database/fetchAllUsers.php';

?>
<div class="container main-wrapper">
  <div class="row">
    <div class="col col-lg-2">
    </div>
    <div class="col col-lg-6">
      <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5">
        <form method="POST" action="database/submitPost.php">
          <h1 class="text-center ">Dodaj vic</h1>

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
            <label for="story_name">Naslov</label>
            <input type="text" name="story_name" value="<?php echo (isset($_SESSION['form_data']['story_name']) ? htmlspecialchars($_SESSION['form_data']['story_name']) : ''); ?>" class="form-control" id="story_name">
          </div>
          <input type="hidden" name="user_id" value="<?= (isset($_SESSION['user_data']['id']) ? htmlspecialchars($_SESSION['user_data']['id']) : '');?>">
          <div class="form-group">
            <label for="textarea">Tekst vica</label>
            <textarea name="story_text" class="form-control" id="story_text" ></textarea>
          </div>
            
          <?php
          if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
          } ?>
          <div class="col text-center">
            <button type="submit" value="Submit" class="btn myBtn btn-primary">Sačuvaj</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?= include("layout/footer.php"); ?>