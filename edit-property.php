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
      Revisions:   10/29/21 - edited form
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


      <form method="POST" action="index.php">
      <div class="mb-3">
              <label for="propertyName" class="form-label">Property Name</label>
              <input type="text" class="form-control" id="propInput" aria-describedby="propHelp" placeholder="Enter here" required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Update description</label>
              <textarea rows="4" cols="50" class="form-control" id="textAreaInput" placeholder="Amenities, fun things to do in the area..."></textarea>
           </div>
        
           <div class="mb-3">
            <label for="bath" class="form-label">Does your property allow...</label><br>
            <input type="checkbox" id="kid" name="kid">
            <label for="kidFriendly">Kids</label><br>
            <input type="checkbox" id="pet" name="pet">
            <label for="petFriendly">Pets</label>
           </div>
           
           <div class="mb-3">
           <!-- not sure how to make this feature fully functional. ideally, user can select
                how many files to upload, can select more after already selecting 1, and
                all file names display on top of each other -->
            <label for="pics" class="form-label">Add a few pictures of your property</label>
              <input type="file" id="propPicture" name="propPicture" accept="image/png, image/jpeg" multiple>
           </div>

           <!-- allow user to select multiple dates/date range. Is this possible? -->
           <div class="mb-3">
            <label for="availability" class="form-label">When can your property be reserved? (Optional)</label><br>
              <input type="date">
           </div>

          <!-- Looking to have this slider a bit more functional; for example, max range slider should not be able to below min range slider -->
        <div class="mb-3">
           <label for="cost" class="form-label">How much will you charge per night? (Optional)</label><br>
           <input type="range"  min="1" max="1000" oninput="this.nextElementSibling.value = this.value">
              <output>0</output>
           <input type="range"  min="1" max="1000" oninput="this.nextElementSibling.value = this.value">
            <output>0</output>
        </div>

        <div class="mb-3">
          <h4 class="mb-3">To confirm your changes, enter your password below. </h4>
        </div>
          <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Password" style="width:200px";>
          </div>
           
          <div class="pt-3 text-center">
            <button type="submit" class="globalButton blueButton" style="height:50px;width:350px;font-size:1.4em;">Update Property</button>
          </div>

          <div class="pt-3 text-center mt-3">
            <h3 class="mb-1 text-left">Want to delete your property? </h3>
            <h3><span class="dk-orange-text">Warning! </span> This action cannot be undone!</h3>
      
              <!-- Add a modal that pops up when user clicks delete? -->
              <div class="mb-3">
                <button type="delete" class="globalButton redButton" style="height:50px;width:200px;font-size:1.4em;" onclick="">Delete</button>
              </div>
          </div>
        </div>
      </form>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
