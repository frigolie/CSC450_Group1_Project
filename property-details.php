<?php
session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- property-details.php - The detail page for each property listing
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/20/21
      Revisions:   11/27/21 - Hooking up the front end to the back end
                   12/14/21 - Displaying whether Kids or Pets are welcome
                            - Conditionally showing the pre-reservation form only to logged in users
                            - Updating the fields of the pre-reservation form based on property options for kids/pets
      -->

      <!-- Page title -->
    <title>Property Details</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 blueMountains">
      <div class="container mb-3">
        <?php
          include 'includes/queries/property_table.php';
          include 'includes/functions/image/getPropertyImages.php';
            if (mysqli_num_rows($prop_query) > 0) {
            $i = 1;
            if(isset($_GET['property_id'])) {
              $prop_id = htmlspecialchars($_GET['property_id']);
              while ($property = mysqli_fetch_assoc($prop_query)) {
                if($property['property_id'] == $prop_id) {
                  $propertyPrice = $property['price'];
                  $images = getPropertyImages($property['property_id']);
                  if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/property_images/' . $images[0]['filename']; } else { $featImg = '/graphic/ha_square.png'; } ?>

                  <div class="row py-1 justify-content-between">

                    <div class="col-12 col-lg-7 text-center px-3">
                      <h1 class="my-5 text-start text-shadow"><?php echo $property['name']; ?></h1>
                      <div class="w-100 rounded-custom box-shadow featured-img" style="background-image:url('<?php echo $featImg; ?>')"></div>
                      <h4 class="text-start lt-gray-text mt-3">
                        <?php echo $property['bedrooms']; if($property['bedrooms'] != 'Studio') { echo ' Bed'; if($property['bedrooms'] != '1') { echo 's'; } } ?>,
                        <?php echo $property['bathrooms']; echo ' Bath'; if($property['bathrooms'] != '1') { echo 's'; }?>
                        <?php if($property['kids'] == '1') { echo ' - Child Friendly'; } else { echo ' - Children Not Allowed'; } ?>
                        <?php if($property['pets'] == '1') { echo ' - Pet Friendly'; } else { echo ' - Pets Not Allowed'; } ?>
                      </h4>
                      <p class="lt-gray-text text-start"><?php echo $property['description']; ?></p>

                      <div class="row">
                      <?php
                        $i = 1;
                        foreach($images as $img) { ?>
                          <div class="col-6 col-md-3 mb-3 d-flex align-items-center">
                            <img class="w-100 rounded-custom gallery-tab" src="/graphic/uploads/property_images/<?php echo $img['filename']; ?>">
                          </div>
                        <?php $i++;
                      } //endforeach
                      ?>
                      </div>

                      <div class="w-100 d-flex mt-4 align-items-center justify-content-center flex-wrap">
                        <?php
                        include 'includes/functions/avatar/getAvatar.php';
                        include 'includes/functions/property/getOwnerInfo.php';

                        $owner_query = getOwnerInfo($property['owner_id']);

                        if (mysqli_num_rows($owner_query) > 0) {
                          $i = 1;
                          while ($owner = mysqli_fetch_assoc($owner_query)) {
                          $image = '';
                          $avatar_query = getAvatar($property['owner_id']);
                          if (mysqli_num_rows($avatar_query) > 0) {
                            while ($avatar = mysqli_fetch_assoc($avatar_query)) {
                              $image = $avatar['filename'];
                            }
                          }
                          if ($image != '') { $profile_image = '/graphic/uploads/avatars/' . $image; } else { $profile_image = '/graphic/user.png'; }

                          ?>
                          <a href="/view-profile.php?user_id=<?php echo $owner['user_id']; ?>">
                            <div class="rounded-circle owner-icon me-3 lt-gray-bg box-shadow" style="background-image:url('<?php echo $profile_image; ?>');">
                            </div>
                          </a>
                          <h5 class="lt-gray-text text-shadow fw-bold me-3">Property Listed by <a href="/view-profile.php?user_id=<?php echo $owner['user_id']; ?>"><span class="blue-text"><?php echo $owner['username']; ?></span></a></h5>
                          <?php if (isset($_SESSION['username'])) { ?>
                            <a href="/messages.php?recipient_id=<?php echo $property['owner_id'] ?>&property_id=<?php echo $property['property_id'] ?>">
                              <button class="globalButton orangeButton my-2">Contact Host</button>
                            </a>
                        <?php }
                          }
                        } ?>
                      </div>
                    </div>

                    <div class="col-12 col-lg-5 px-3 py-5 mt-2">
                      <h3 class="mt-2 mt-lg-5 mb-3 lt-gray-text text-center text-shadow">Reserve this Property</h3>
                      <div class="white-bg rounded-custom box-shadow p-4">
                        <?php if (isset($_SESSION['user_id'])) { ?>
                          <form method="GET" action="/make-reservation.php">
                          <div class="form-group d-flex flex-wrap justify-content-between">
                            <label for="adults" class="w-75">How many Adults? (18yrs and over)</label>
                            <input class="mb-3 w-15" type="number" id="adults" name="adults" min="1" max="10" step="1" value="1" required>
                            <?php if($property['kids'] == '1') { ?>
                              <label for="kids" class="w-75">How many Children? (18yrs and under)</label>
                              <input class="mb-3 w-15" type="number" id="kids" name="kids" min="0" max="10" step="1" value="0" required>
                            <?php } ?>
                            <?php if($property['pets'] == '1') { ?>
                              <label for="pets" class="mb-3">Will you bring Pets?</label>
                              <div>
                                <input type="radio" id="noPets" name="pets" value="No" checked="checked">
                                <label for="noPets" class="me-3">No</label>
                                <input type="radio" id="yesPets" name="pets" value="Yes">
                                <label for="yesPets">Yes</label>
                              </div>
                            <?php } ?>
                          </div>
                          <div class="mb-3">
                             <label for="checkIn" class="form-label">Check-in:</label>
                             <input name="checkIn" type="date" class="form-control dateField" id="checkIn" placeholder="mm/dd/yyyy" required>
                          </div>
                          <div class="mb-5">
                             <label for="checkOut" class="form-label">Check-out:</label>
                             <input name="checkOut" type="date" class="form-control dateField" id="checkOut" placeholder="mm/dd/yyyy" required>
                          </div>
                          <input type="hidden" name="property_id" id="property_id" value="<?php echo $property['property_id']; ?>" readonly />
                          <h4 class="mb-2" id="cost-estimate">Price Per Day: $<?php echo $property['price']; ?></h4>
                          <div class="pt-4 pb-4 text-center">
                            <button type="submit" class="globalButton blueButton">Book Now!</button>
                          </div>
                        </form>
                      <?php } else if (isset($_SESSION['admin_id'])) { ?>
                          <h4 class="text-center m-4">View all reservations in the <a class="orange-text" href="/admin.php">admin dashboard</a>.</h4>
                      <?php } else { ?>
                          <h4 class="text-center m-4">You must be logged in to create a reservation. <a class="blue-text" href="/login.php">Log&nbsp;in</a> to your account now to book your next&nbsp;adventure!</h4>
                      <?php } ?>
                      </div>
                    </div>

                  </div>

                <?php
                }
              }
            }
          } ?>


      </div>
    </section>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>

<script>
  $( document ).ready(function() {
    $('.gallery-tab').click(function(e) {
      var clickedImg = $(this).attr('src');
      $('.featured-img').css('background-image', "url('" + clickedImg + "')");
    });

    $('.dateField').change(function() {
      var startDate = new Date($('#checkIn').val());
      var endDate = new Date($('#checkOut').val());
      if(startDate != '' && endDate != '') {
        if (startDate > endDate){
          alert('Check-out date must be later than check-in!');
          $('#checkOut').val('');
        } else if (startDate < endDate) {
          var time_difference = endDate.getTime() - startDate.getTime();
          var numDays = time_difference / (1000 * 60 * 60 * 24);

          var price = (<?php echo $propertyPrice; ?> * numDays);
          $('#resPrice').val(price);
          $('#cost-estimate').text('Cost Estimate: $' + price);
        }
      }
    });

  });
</script>
