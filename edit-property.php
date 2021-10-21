<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- edit-property.php - The form through which a property owner can update or delete an existing property listing
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/20/21
      Revisions:
      -->

      <!-- Page title -->
    <title>Edit Property</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

  <section class="container-fluid initialPageContent yellowMountains pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Update your <span class="dk-orange-text">property information</span> below. </h2>

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
              <button type="submit" class="globalButton blueButton">Update Property</button>
              <button type="delete" class="globalButton orangeButton">Delete Property</button>
            </div>
          </div>
        </div>
      </form>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
