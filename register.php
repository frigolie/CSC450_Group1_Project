<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- register.php - The registration form page
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
    <title>Register</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent purpleMountains pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Creating an account is <span class="dk-orange-text">quick and easy</span>.</h2>
          <h3 class="mb-4 text-center">Get started below!</h3>

        <!-- Bootstrap Sample Form - to be replaced once forms are created -->
          <!-- <form> -->
      <form method="POST" action="accountCreation.php">
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
              <div id="emailHelp" class="form-text">
                Don't worry, we'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" placeholder="(xxx)xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
           </div>
           <div class="mb-3">
              <label for="bDay" class="form-label">Birthday</label>
              <input type="date" class="form-control" id="date" placeholder="mm/dd/yyyy"required>
           </div>
          
            <div class="pt-3 text-center">
              <button type="submit" class="globalButton orangeButton"style="height:50px;width:200px;font-size:1.4em;">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>