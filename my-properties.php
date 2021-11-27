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
      Revisions:
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

          <!-- This single listing can be created on a foreach loop over data so that it can grow dynamically -->
          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="/property-details.php">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/townhouse.jpg" alt="Townhouse Rental" title="Photo by Travel-Cents">
              </div>
            </a>
            <a href="/property-details.php">
              <h3 class="mt-3 mb-1">Classical Townhouse</h3>
            </a>
            <h4>2 bed, 2 bath</h4>
            <a href="/edit-property.php">
              <button class="globalButton orangeButton my-2">Edit Listing</button>
            </a>
          </div>
          <!-- End single listing, following lines are repeating for demo purposes until we get dynamic functionality set up -->

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="/property-details.php">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/cottage.jpg" alt="Cottage Rental" title="Photo by Bertrand Bouchez">
              </div>
            </a>
            <a href="/property-details.php">
              <h3 class="mt-3 mb-1">Country Cottage</h3>
            </a>
            <h4>2 bed, 1.5 bath</h4>
            <a href="/edit-property.php">
              <button class="globalButton orangeButton my-2">Edit Listing</button>
            </a>
          </div>

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="/property-details.php">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/ranch.jpg" alt="Ranch House Rental" title="Photo by Janelle Hiroshigi">
              </div>
            </a>
            <a href="/property-details.php">
              <h3 class="mt-3 mb-1">Mid-Century Ranch House</h3>
            </a>
            <h4>3 bed, 2 bath</h4>
            <a href="/edit-property.php">
              <button class="globalButton orangeButton my-2">Edit Listing</button>
            </a>
          </div>

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
