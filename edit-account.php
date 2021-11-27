<?php
session_start();
if (isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- edit-account.php - The edit account form page
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/16/21
      Revisions:   10/19/21 - replacing bootstrap sample form
      -->

      <!-- Page title -->
    <title>Edit Account</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

  <section class="container-fluid initialPageContent redMountains pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Edit your <span class="dk-orange-text">account</span> information below. </h2>
          <h3 class="mb-4 text-center">Get started below!</h3>

        <!-- Bootstrap Sample Form - to be replaced once forms are created -->
          <!-- <form> -->
      <form method="POST" action="index.php">
          <div class="mb-3">

          <!-- I'm not great with bootstrap. The formatting here for the name works, but the code itself is sloppy. I'll look into editing it to look better!-->
            <div class="row">
              <div class="col">
              <label for="fName" class="form-label">First Name</label>
              <input type="text" class="form-control" name="fName" placeholder="First Name" required>
            </div>
              <div class="col">
              <label for="lName" class="form-label">First Name</label>
              <input type="text" class="form-control" name="lName" placeholder="Last Name" required>
            </div>
          </div>
        </div>
            <div class="mb-3">
              <label for="emailInput" class="form-label">Email</label>
              <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="example@email.com">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" placeholder="(xxx)xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
           </div>
           <div class="mb-3">
            <label for="address1" class="form-label">Address</label>
            <input type="text" class="form-control" id="address1" placeholder="Address Line 1">
           </div>
           <div class="mb-3">

            <input type="text" class="form-control" id="address" placeholder="Address Line 2">
           </div>
           <div class="mb-3">
             <label for="zipCode" class="form-label">Zip Code</label>
             <input type="text" class="form-control" id="zipCode" placeholder="Enter zipcode"style="width:250px;" pattern="[0-9]{5}">
           </div>
           <div class="mb-3">
           <h2 class="mb-1 text-center">To confirm your changes, enter your password below. </h2>
           </div>
           <div class="mb-3">
              <label for="passwordInput" class="form-label">Password</label>
              <input type="password" class="form-control" id="passwordInput" placeholder="Password">
            </div>
            <div class="mb-3">
              <label for="passwordInput" class="form-label">Re-enter Password</label>
              <input type="password" class="form-control" id="passwordInput" placeholder="Re-enter password">
            </div>

            <div class="pt-3 text-center">
              <button type="submit" class="globalButton orangeButton"style="height:50px;width:200px;font-size:1.4em;">Submit</button>
            </div>
            <div class="pt-3 text-center mt-3">
            <h3 class="mb-1 text-left">Want to delete your account? </h3>
            <h3><span class="dk-orange-text">Warning! </span> This action cannot be undone!</h3>

              <!-- Add a modal that pops up when user clicks delete? -->
              <div class="mb-3">
                <button type="delete" class="globalButton redButton" style="height:50px;width:200px;font-size:1.4em;" onclick="">Delete</button>
              </div>
          </div>
          </div>
        </div>
      </form>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
<?php } else {
    header("Location: /login.php");
} ?>
