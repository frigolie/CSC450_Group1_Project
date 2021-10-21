<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- view-properties.php - The page hosting all of the property listings
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
    <title>View Properties</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 blueMountains">
      <div class="container mb-3">
        <div class="row py-1 justify-content-between">
          <h1 class="mb-5">All Properties In Your Area</h1>

          <!-- This single listing can be created on a foreach loop over data so that it can grow dynamically -->
          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="#">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/penthouse.jpg" alt="Penthouse Rental" title="Photo by Mostafa Safadel">
              </div>
            </a>
            <a href="#">
              <h3 class="mt-3 mb-1">Downtown Penthouse</h3>
            </a>
            <h4>2 beds, 1.5 bath</h4>
            <button class="globalButton blueButton my-2">Book Now</button>
          </div>
          <!-- End single listing, lines 38-118 are repeating for demo purposes until we get dynamic functionality set up -->

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="#">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/cabana.jpg" alt="Cabana Rental" title="Photo by Mike Swigunski">
              </div>
            </a>
            <a href="#">
              <h3 class="mt-3 mb-1">Oceanside Cabana</h3>
            </a>
            <h4>1 bed, 1 bath</h4>
            <button class="globalButton blueButton my-2">Book Now</button>
          </div>

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="#">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/cabin.jpg" alt="Cabin Rental" title="Photo by Cameron Stewart">
              </div>
            </a>
            <a href="#">
              <h3 class="mt-3 mb-1">Mountain Cabin</h3>
            </a>
            <h4>Studio, .5 bath</h4>
            <button class="globalButton blueButton my-2">Book Now</button>
          </div>

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="#">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/townhouse.jpg" alt="Townhouse Rental" title="Photo by Travel-Cents">
              </div>
            </a>
            <a href="#">
              <h3 class="mt-3 mb-1">Classical Townhouse</h3>
            </a>
            <h4>2 bed, 2 bath</h4>
            <button class="globalButton blueButton my-2">Book Now</button>
          </div>

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="#">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/manor.jpg" alt="Manor Rental" title="Photo by Nathan Walker">
              </div>
            </a>
            <a href="#">
              <h3 class="mt-3 mb-1">Victorian Manor</h3>
            </a>
            <h4>4 bed, 3.5 bath</h4>
            <button class="globalButton blueButton my-2">Book Now</button>
          </div>

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="#">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/cottage.jpg" alt="Cottage Rental" title="Photo by Bertrand Bouchez">
              </div>
            </a>
            <a href="#">
              <h3 class="mt-3 mb-1">Country Cottage</h3>
            </a>
            <h4>2 bed, 1.5 bath</h4>
            <button class="globalButton blueButton my-2">Book Now</button>
          </div>

          <div class="col-12 col-lg-5 col-xl-4 mb-5 p-4 text-center bg-white rounded-custom box-shadow listingCard">
            <a href="#">
              <div class="w-100 rentalListing">
                <img class="w-100 rounded-custom" src="graphic/ranch.jpg" alt="Ranch House Rental" title="Photo by Janelle Hiroshigi">
              </div>
            </a>
            <a href="#">
              <h3 class="mt-3 mb-1">Mid-Century Ranch House</h3>
            </a>
            <h4>3 bed, 2 bath</h4>
            <button class="globalButton blueButton my-2">Book Now</button>
          </div>

        </div>
      </div>
    </section>

    <section class="container-fluid py-5 lt-gray-bg">
      <div class="row w-75 mx-auto py-4 max-880">
        <div class="col-12 mb-3">
          <h2 class="text-center">Do you have a property that would make a great vacation destination?</h2>
        </div>
        <div class="col-12 d-flex justify-content-center">
          <button class="globalButton blueButton mb-2">
            List Your Property Now
          </button>
        </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
