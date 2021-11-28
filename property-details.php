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
      -->

      <!-- Page title -->
    <title>Property Details</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 blueMountains">
      <div class="container mb-3">
        <?php
          include 'includes/property_table.php';
          include 'includes/getPropertyImages.php';
            if (mysqli_num_rows($prop_query) > 0) {
            $i = 1;
            if(isset($_GET['property_id'])) {
              $prop_id = htmlspecialchars($_GET['property_id']);
              while ($property = mysqli_fetch_assoc($prop_query)) {
                if($property['property_id'] == $prop_id) {
                  $images = getPropertyImages($property['property_id']);
                  if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/' . $images[0]['filename']; } else { $featImg = '/graphic/homeaway.png'; } ?>

                  <div class="row py-1 justify-content-between">

                    <div class="col-12 col-lg-7 text-center px-3">
                      <h1 class="my-5 text-start text-shadow"><?php echo $property['name']; ?></h1>
                      <div class="w-100 rounded-custom box-shadow featured-img" style="background-image:url('<?php echo $featImg; ?>')"></div>
                      <h4 class="text-start lt-gray-text mt-3">
                        <?php echo $property['bedrooms']; if($property['bedrooms'] != 'Studio') { echo ' Bed'; if($property['bedrooms'] != '1') { echo 's'; } } ?>,
                        <?php echo $property['bathrooms']; echo ' Bath'; if($property['bathrooms'] != '1') { echo 's'; }?>
                      </h4>
                      <p class="lt-gray-text text-start"><?php echo $property['description']; ?></p>

                      <div class="row">
                      <?php
                        $i = 1;
                        foreach($images as $img) { ?>
                          <div class="col-6 col-md-3 mb-3 d-flex align-items-center">
                            <img class="w-100 rounded-custom gallery-tab" src="/graphic/uploads/<?php echo $img['filename']; ?>">
                          </div>
                        <?php $i++;
                      } //endforeach
                      ?>
                      </div>

                      <a href="/messages.php?recipient_id=<?php echo $property['owner_id'] ?>&property_id=<?php echo $property['property_id'] ?>">
                        <button class="globalButton orangeButton my-2">Contact Host</button>
                      </a>
                    </div>

                    <div class="col-12 col-lg-5 px-3 py-5 mt-2">
                      <h3 class="mt-2 mt-lg-5 mb-3 lt-gray-text text-center text-shadow">Reserve this Property</h3>
                      <div class="white-bg rounded-custom box-shadow p-4">
                        <form>
                          <div class="form-group">
                            <label for="numberGuests">How many guests?</label>
                            <input type="number" id="numberGuests" name="quantity" min="1">
                          </div>
                          <div class="mb-3">
                             <label for="checkIn" class="form-label">Check-in:</label>
                             <input type="date" class="form-control" id="checkIn" placeholder="mm/dd/yyyy" required>
                          </div>
                          <div class="mb-5">
                             <label for="checkIn" class="form-label">Check-out:</label>
                             <input type="date" class="form-control" id="checkIn" placeholder="mm/dd/yyyy" required>
                          </div>
                          <h4 class="mb-2">Cost Estimate: $123.45</h4>
                          <h4>Due Now: $98.76</h4>
                          <div class="pt-4 pb-4 text-center">
                            <button type="submit" class="globalButton blueButton">Book Now!</button>
                          </div>
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
  });
</script>
