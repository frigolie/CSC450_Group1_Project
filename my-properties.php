<?php
session_start();
include  "includes/Inc.DBC.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- my-properties.php - The page hosting all of the property owner's listings
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/20/21
      Revisions:   11/26/21 - Connecting to the back end
      -->

      <!-- Page title -->
    <title>My Properties</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 blueMountains">
      <div class="container mb-3">
        <div class="row py-1 justify-content-between">
          <div class="col-12 d-lg-flex align-items-center mb-5">
            <h1 class="mb-2">My Properties</h1>
            <a href="/add-property.php">
              <button class="globalButton blueButton ms-lg-4">Add New Listing!</button>
            </a>
          </div>

          <?php include 'includes/property_table.php';
            if (mysqli_num_rows($prop_query) >= 0) {
            $i = 1;
              while ($rows = mysqli_fetch_assoc($prop_query)) {
                if($rows['user_id'] == $_SESSION['user_id']) {

                $featImg = ''; ?>
                <?php if ($rows['img1'] != '') { $featImg = $rows['img1']; } else { $featImg = 'graphic/homeaway.png'; } ?>
                <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
                  <a href="/property-details.php?property_id=<?php echo $rows['property_id'] ?>">
                    <div class="w-100 rentalListing">
                      <img class="w-100 rounded-custom" src="<?php echo $featImg; ?>" alt="<?php echo $rows['name'] ?>" title="Photo of <?php echo $rows['name'] ?>">
                    </div>
                  </a>
                  <a href="/property-details.php?property_id=<?php echo $rows['property_id'] ?>">
                    <h3 class="mt-3 mb-1"><?php echo $rows['name'] ?></h3>
                  </a>
                  <h4><?php echo $rows['bedrooms'] ?> beds, <?php echo $rows['bathrooms'] ?> baths</h4>
                  <a href="/edit-property.php?property_id=<?php echo $rows['property_id'] ?>">
                    <button class="globalButton orangeButton my-2">Edit Listing</button>
                  </a>
                </div>
                <?php $i++;
                }
              }
            } ?>

        </div>
      </div>
    </section>

    <section class="container-fluid py-5 lt-gray-bg">
      <div class="row w-75 mx-auto py-4 max-880">
        <div class="col-12 mb-3">
          <h2 class="text-center">Have a new property to list?</h2>
        </div>
        <div class="col-12 d-flex justify-content-center">
          <a href="/add-property.php">
            <button class="globalButton blueButton mb-2">
              Add it Now!
            </button>
          </a>
        </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
