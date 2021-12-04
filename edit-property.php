<?php
session_start();
if (isset($_SESSION['username'])){
?>

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
                   11/27/21 - setting up CRUD functionality with DB
      -->

      <!-- Page title -->
    <title>Edit Property</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

  <section class="container-fluid initialPageContent yellowMountains pb-5">
    <div class="container">
      <div class="row pb-5 justify-content-center">

        <?php

          include 'includes/queries/property_table.php';
          include 'includes/functions/property/getPropertyImages.php';
            if (mysqli_num_rows($prop_query) > 0) {
            $i = 1;
            if(isset($_GET['property_id'])) {
              $prop_id = htmlspecialchars($_GET['property_id']);
              while ($property = mysqli_fetch_assoc($prop_query)) {
                if($property['owner_id'] == $_SESSION['user_id'] && $property['property_id'] == $prop_id) {
                ?>


        <div class="col-10 col-md-8 col-lg-7 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Update your <span class="dk-orange-text">property information</span> below. </h2>

      <form method="POST" action="includes/inc.updateProperty.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="propertyName" class="form-label">Property Name</label>
              <input type="text" class="form-control" name="propName" id="propName" aria-describedby="propHelp" value="<?php echo $property['name']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="propDescription" class="form-label">Give your property a description!</label>
              <textarea rows="4" cols="50" class="form-control" name="propDescription" id="propDescription"><?php echo $property['description']; ?></textarea>
           </div>

           <div class="mb-3">
             <input type="hidden" name="hiddenBeds" value="<?php echo $property['bedrooms']; ?>" readonly>
             <label for="bedrooms" class="form-label">How many bedrooms?</label>
             <select id="bedrooms" name="bedrooms" required>
               <option value="Studio">Studio</option>
               <option value="1">1 Bed</option>
               <option value="2">2 Bed</option>
               <option value="3">3 Bed</option>
               <option value="4+">4+ Bed</option>
             </select>
           </div>

           <div class="mb-3">
             <input type="hidden" name="hiddenBaths" value="<?php echo $property['bathrooms']; ?>" readonly>
             <label for="bathrooms" class="form-label">How many bathrooms?</label>
             <select id="bathrooms" name="bathrooms" required>
               <option value=".5">.5</option>
               <option value="1">1</option>
               <option value="1.5">1.5</option>
               <option value="2">2</option>
               <option value="2.5">2.5</option>
               <option value="3">3</option>
               <option value="3.5">3.5</option>
               <option value="4+">4+</option>
             </select>
           </div>

           <div class="mb-3">
            <label for="allowedGuests" class="form-label">Does your property allow...</label><br>
            <input type="hidden" name="hiddenKids" value="<?php echo $property['kids']; ?>" readonly>
            <input type="checkbox" name="kidFriendly" value="1">
            <label for="kidFriendly">Kids</label><br>
            <input type="hidden" name="hiddenPets" value="<?php echo $property['pets']; ?>" readonly>
            <input type="checkbox" name="petFriendly" value="1">
            <label for="petFriendly">Pets</label>
           </div>

           <div class="mb-3">
            <label for="address1" class="form-label">Where is your property located?</label>
            <input type="text" class="form-control" name="address1" id="address1" value="<?php echo $property['address']; ?>" required>
           </div>

           <div class="mb-3">
            <label for="city" class="form-label">City</label>
             <input type="text" class="form-control" name="city" id="city" style="width:250px;" value="<?php echo $property['city']; ?>" required>
           </div>

           <div class="mb-3">
             <input type="hidden" name="hiddenState" value="<?php echo $property['state']; ?>" readonly>
             <label for="state" class="form-label">State</label><br>
              <select name="state" id="state">
                <option value="AL">AL</option>
                <option value="AK">AK</option>
                <option value="AZ">AZ</option>
                <option value="AR">AR</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DE">DE</option>
                <option value="DC">D.C.</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="HI">HI</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="IA">IA</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="ME">ME</option>
                <option value="MD">MD</option>
                <option value="MA">MA</option>
                <option value="MI">MI</option>
                <option value="MN">MN</option>
                <option value="MS">MS</option>
                <option value="MO">MO</option>
                <option value="MT">MT</option>
                <option value="NE">NE</option>
                <option value="NV">NV</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NY">NY</option>
                <option value="NC">NC</option>
                <option value="ND">ND</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="OR">OR</option>
                <option value="PA">PA</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VT">VT</option>
                <option value="VA">VA</option>
                <option value="WA">WA</option>
                <option value="WV">WV</option>
                <option value="WI">WI</option>
                <option value="WY">WY</option>
              </select>
            </div>

           <div class="mb-3">
             <label for="zipCode" class="form-label">Zip Code</label>
             <input type="text" class="form-control" name="zipCode" id="zipCode" value="<?php echo $property['zip']; ?>" style="width:250px;" pattern="[0-9]{5}" required>
           </div>

        <div class="mb-3">
           <label for="cost" class="form-label">How much will you charge per night?<br>$</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo $property['price']; ?>" />
        </div>

        <div class="mb-3">
          <h4 class="mb-3">To confirm your changes, enter your password below. </h4>
        </div>
          <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Password" style="width:200px";>
          </div>

          <input type="hidden" id="propertyID" name="propertyID" value="<?php echo $prop_id; ?>" readonly>

          <div class="pt-3 text-center">
            <button type="submit" id="submit" value="Update" name="submit"  class="globalButton blueButton" style="height:50px;width:200px;font-size:1.4em;">Update</button>
          </div>

          <div class="pt-3 text-center mt-3">
            <h3 class="mb-1 text-left">Want to delete your property? </h3>
            <h3><span class="dk-orange-text">Warning! </span> This action cannot be undone!</h3>

            <div class="mb-3">
              <button type="delete" name="delete" class="globalButton redButton" style="height:50px;width:200px;font-size:1.4em;" onclick="">Delete</button>
            </div>
          </div>
          </form>
        </div>

        <div class="col-10 col-md-8 col-lg-7 px-5 py-5 mt-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-3 text-center">Update your <span class="dk-orange-text">property images</span>! </h2>
          <div class="row">

          <?php $images = getPropertyImages($property['property_id']);
            $i = 1;
            foreach($images as $img) { ?>
              <div class="col-12 col-md-6">
                <form id="img<?php echo $i; ?>" method="POST" action="includes/inc.updateProperty.php" enctype="multipart/form-data" class="text-center">
                  <input type="hidden" name="deleteImgID" value="<?php echo $img['image_id']; ?>" readonly />
                  <input type="hidden" name="deletePropertyID" value="<?php echo $prop_id; ?>" readonly />
                  <img class="w-100 rounded-custom" src="/graphic/uploads/property_images/<?php echo $img['filename']; ?>">
                  <button type="delete" name="deleteImg" class="globalButton redButton mx-auto mb-5 mt-3">Delete</button>
                </form>
              </div>

            <?php $i++;
                } //endforeach
            ?>

            <div class="col-12">
              <form method="POST" action="includes/inc.updateProperty.php" enctype="multipart/form-data" class="d-flex w-100 align-items-center">
                <input type="file" id="img" name="img" accept="image/png, image/jpeg">
                <input type="hidden" name="imageUserID" value="<?php if (isset($_SESSION['user_id'])) { echo $_SESSION['user_id']; } ?>" readonly>
                <input type="hidden" name="imagePropertyID" value="<?php echo $prop_id; ?>" readonly>
                <button type="submit" value="Add Images" name="upload"  class="globalButton blueButton">Add Image</button>
              </form>
            </div>

          </div>

        </div>

        <?php
              }
            }
          }
        } ?>
      </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
<script>
  $( document ).ready(function() {
    $('select[name="bedrooms"]').val($('input[name="hiddenBeds"]').val());
    $('select[name="bathrooms"]').val($('input[name="hiddenBaths"]').val());
    $('select[name="state"]').val($('input[name="hiddenState"]').val());

    if($('input[name="hiddenKids"]').val() == 1) {
      $('input[name="kidFriendly"]').prop( "checked", true );
    } else {
      $('input[name="kidFriendly"]').prop( "checked", false );
    }

    if($('input[name="hiddenPets"]').val() == 1) {
      $('input[name="petFriendly"]').prop( "checked", true );
    } else {
      $('input[name="petFriendly"]').prop( "checked", false );
    }
  });
</script>
<?php } else {
    header("Location: /view-properties.php");
} ?>
