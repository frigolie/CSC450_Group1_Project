<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- accountCreation.php - The final registration form page after users enter their info
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/19/21
      Revisions:
      -->

      <!-- Page title -->
    <title>Register</title>
  </head>
<body>
  <?php include(getcwd( ) . "/header.php"); ?>

  <section class="container-fluid initialPageContent purpleMountains pb-5">
    <div class="row pb-5 justify-content-center">
      <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
        <h2 class="mb-1 text-center dk-orange-text">Success!</h2>
        <h3 class="mb-4 text-center">You're almost there. Create a username and password to finish registration.</h3>

        <form method="POST" action="index.php">
        <div class="mb-3">
          <div class="mb-3">
            <h4><label for="userName" class="form-label dk-orange-text" >Username</label>
            </h4>
            <div id="userHelp" class="form-text">Must include 6-20 characters</div>
            <input type="text" class="form-control" id="userName" minlength="6" maxlength="20" required>
          </div>

          <div class="mb-3">
            <h4><label for="password" class="form-label dk-orange-text" >Password</label>
            </h4>
            <div id="passHelp" class="form-text">Must contain 8-20 characters</div>
            <input type="password" class="form-control" id="password" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          </div>
          <div class="mb-3">
            <div id="userHelp" class="form-text">Re-enter password</div>
            <input type="password" class="form-control" id="passwordInput" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          </div>

          <div class="pt-3 text-center">
            <a href="index.php">
            <button type="submit" class="globalButton orangeButton"style="height:50px;width:200px;font-size:1.4em;" onsubmit="">Let's go!</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </section>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
