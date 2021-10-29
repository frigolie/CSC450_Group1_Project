<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- contact.php - The contact form page
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/16/21
      Revisions:
      -->

      <!-- Page title -->
    <title>Contact Us</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent fireTower pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
          <h1 class="mb-4 text-center">Contact Us!</h1>

        <!-- Bootstrap Sample Form - to be replaced once forms are created -->
          <form>
            <div class="mb-3">
              <label for="emailInput" class="form-label">Email address</label>
              <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email" required>
      
            </div>
     
            <div class="mb-3">
              <label for="textAreaInput" class="form-label">What seems to be the problem?</label>
              <textarea rows="4" cols="50" class="form-control" id="textAreaInput" placeholder="Type your problem here..." required></textarea>
            </div>
            <div class="pt-3 text-center">
            <button type="submit" class="globalButton orangeButton"style="height:50px;width:200px;font-size:1.4em;">Submit</button>
            </dib>
          </form>
        <!-- End Bootstrap Sample Form -->

        </div>
      </div>
    </section>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
    