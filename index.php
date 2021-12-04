<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

  <!-- index.html - The first page of Group 1's final project for CSC450
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/03/21
      Revisions:   11/27/21 - Connecting listings to DB
      -->

  <!-- Page title -->
  <title>HomeAway Rentals LLC</title>
</head>

<body>
  <?php include(getcwd() . "/header.php"); ?>
  <section class="container-fluid initialPageContent greyMountains pb-5 mb-5">
    <section class="container pb-5">
      <div class="row mt-5 mb-0 my-lg-5">
        <div class="col-12 col-md-5">
          <h1 class="text-shadow">Vacation Rentals <span class="dk-orange-text">without the&nbsp;Stress</span></h1>
        </div>
        <div class="col-12 col-md-7 p-4 white-bg rounded-custom box-shadow">
          <p>Tired of needing a vacation from the vacation-planning process? So were we! That's why we created this app, your gateway to a world of adventure. Communicate directly with the rental owners to avoid vital information getting lost in the corporate noise of travel booking agencies. See photos of your actual property so you know what to expect at your destination before ever stepping out on your journey.</p>
          <p class="mb-0"><b>Real people, real places, real relaxation.</b></p>
        </div>
      </div>
    </section>
  </section>

  <section class="container">
    <div class="row py-5">

    <?php include 'includes/queries/front_page_table.php';
      include 'includes/functions/property/getPropertyImages.php';
      if (mysqli_num_rows($prop_query) > 0) {
      $i = 1;
        while ($property = mysqli_fetch_assoc($prop_query)) {
          $images = getPropertyImages($property['property_id']);
          ?>
          <?php if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/property_images/' . $images[0]['filename']; } else { $featImg = '/graphic/ha_square.png'; } ?>
            <div class="col-12 col-lg-4 mb-4">
              <a href="/property-details.php?property_id=<?php echo $property['property_id'] ?>">
                <div class="w-100 rentalListing">
                  <img class="w-100 rentalListing" src="<?php echo $featImg; ?>" alt="<?php echo $property['name'] ?>" title="Photo of <?php echo $property['name'] ?>">
                </div>
              </a>
              <a href="/property-details.php?property_id=<?php echo $property['property_id'] ?>">
                <h3 class="mt-2 mb-0"><?php echo $property['name'] ?></h3>
              </a>
              <h4>
                <?php echo $property['bedrooms']; if($property['bedrooms'] != 'Studio') { echo ' Bed'; if($property['bedrooms'] != '1') { echo 's'; } } ?>,
                <?php echo $property['bathrooms']; echo ' Bath'; if($property['bathrooms'] != '1') { echo 's'; }?>
              </h4>
              <p><?php echo $property['description']; ?></p>
            </div>
          <?php
           $i++;
          }
        } ?>

    </div>
  </section>

  <section class="container-fluid py-5 lt-gray-bg">
    <div class="row w-75 mx-auto py-4 max-880">
      <div class="col-12 mb-3">
        <h2 class="text-center">Explore these properties and&nbsp;more!</h2>
      </div>
      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-end">
        <a href="/view-properties.php">
          <button class="globalButton orangeButton mb-2 ">
            View Properties!
          </button>
        </a>
      </div>

      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-start">
        <?php if (isset($_SESSION['username'])) { ?>
            <a href="/add-property.php">
          <?php } else { ?>
            <a href="/register.php">
          <?php } ?>
          <button class="globalButton blueButton mb-2">
            List Your Property!
          </button>
        </a>
      </div>
    </div>
  </section>
  <?php include(getcwd() . "/footer.php"); ?>
</body>

</html>
