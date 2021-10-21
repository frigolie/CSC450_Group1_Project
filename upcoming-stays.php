<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- upcoming-stays.php - The page for viewing upcoming stays as a guest
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
    <title>Upcoming Stays</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-3 pinkMountains">
      <div class="container mb-3">
        <div class="row py-1 justify-content-center">
          <h1 class="mb-5">Upcoming Stays</h1>

          <!-- This single listing can be created on a foreach loop over data so that it can grow dynamically -->
          <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
            <div class="row">
              <div class="col-12 text-start mb-2">
                <h3>Trip #0293843</h3>
              </div>
              <div class="col-12 col-md-6">
                <a href="/property-details.php">
                  <div class="w-100 rentalListing rounded-custom">
                    <img class="w-100" src="graphic/penthouse.jpg" alt="Penthouse Rental" title="Photo by Mostafa Safadel">
                  </div>
                </a>
                <a href="/property-details.php">
                  <h4 class="mt-3 mb-1">Downtown Penthouse</h4>
                </a>
                <h5>111 Main Street Apt #117<br/>
                  Minneapolis, MN 55111
                </h5>
              </div>
              <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                <p class="w-100 reservationNames">
                  <span class="reservationTitle">Name on Reservation: </span>Jane Green
                </p>
                <p class="w-100 reservationDates">
                  <span class="reservationTitle">Dates of Stay: </span>07/15/22 - 07/19/22
                </p>
                <p class="w-100 reservationGuests">
                  <span class="reservationTitle">Number of Guests: </span>2 adult(s), 1 kid(s), 1 pet(s)
                </p>
                <p class="w-100 reservationPaid">
                  <span class="reservationTitle">Total Paid: </span>$345.77
                </p>
                <div class="w-100">
                  <a href="/edit-reservation.php">
                    <button class="globalButton orangeButton my-2 me-2">Edit Reservation</button>
                  </a>
                  <a href="/messages.php">
                    <button class="globalButton blueButton my-2 ms-2">Contact Host</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- End single listing, following lines are repeating for demo purposes until we get dynamic functionality set up -->

          <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
            <div class="row">
              <div class="col-12 text-start mb-2">
                <h3>Trip #0383996</h3>
              </div>
              <div class="col-12 col-md-6">
                <a href="/property-details.php">
                  <div class="w-100 rentalListing rounded-custom">
                    <img class="w-100" src="graphic/cabin.jpg" alt="Cabin Rental" title="Photo by Cameron Stewart">
                  </div>
                </a>
                <a href="/property-details.php">
                  <h4 class="mt-3 mb-1">Mountain Cabin</h4>
                </a>
                <h5>N19W388 County Rd. H<br/>
                  Cat Harbor, MI 48044
                </h5>
              </div>
              <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                <p class="w-100 reservationNames">
                  <span class="reservationTitle">Name on Reservation: </span>Jack Green
                </p>
                <p class="w-100 reservationDates">
                  <span class="reservationTitle">Dates of Stay: </span>09/26/22 - 09/30/22
                </p>
                <p class="w-100 reservationGuests">
                  <span class="reservationTitle">Number of Guests: </span>1 adult(s), 0 kid(s), 1 pet(s)
                </p>
                <p class="w-100 reservationPaid">
                  <span class="reservationTitle">Total Paid: </span>$119.26
                </p>
                <div class="w-100">
                  <a href="/edit-reservation.php">
                    <button class="globalButton orangeButton my-2 me-2">Edit Reservation</button>
                  </a>
                  <a href="/messages.php">
                    <button class="globalButton blueButton my-2 ms-2">Contact Host</button>
                  </a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="container-fluid py-5 black-bg">
      <div class="container mb-3">
        <div class="row py-1 justify-content-center">
          <h2 class="mb-5 lt-gray-text">Previous Stays</h2>

          <!-- This single listing can be created on a foreach loop over data so that it can grow dynamically -->
          <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
            <div class="row">
              <div class="col-12 text-start mb-2">
                <h3>Trip #0847939</h3>
              </div>
              <div class="col-12 col-md-6">
                <a href="/property-details.php">
                  <div class="w-100 rentalListing rounded-custom">
                    <img class="w-100" src="graphic/manor.jpg" alt="Manor Rental" title="Photo by Nathan Walker">
                  </div>
                </a>
                <a href="/property-details.php">
                  <h4 class="mt-3 mb-1">Victorian Manor</h4>
                </a>
                <h5>2839 First Street<br/>
                  Kentworth, ME 04401
                </h5>
              </div>
              <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                <p class="w-100 reservationNames">
                  <span class="reservationTitle">Name on Reservation: </span>Jane Green
                </p>
                <p class="w-100 reservationDates">
                  <span class="reservationTitle">Dates of Stay: </span>12/13/20 - 12/22/20
                </p>
                <p class="w-100 reservationGuests">
                  <span class="reservationTitle">Number of Guests: </span>2 adult(s), 1 kid(s), 1 pet(s)
                </p>
                <p class="w-100 reservationPaid">
                  <span class="reservationTitle">Total Paid: </span>$944.36
                </p>
              </div>
            </div>
          </div>
          <!-- End single listing, following lines are repeating for demo purposes until we get dynamic functionality set up -->

        </div>
      </div>
    </section>

    <section class="container-fluid py-5 lt-gray-bg">
      <div class="row w-75 mx-auto py-4 max-880">
        <div class="col-12 mb-3">
          <h2 class="text-center">Book your next adventure today!</h2>
        </div>
        <div class="col-12 d-flex justify-content-center">
          <a href="/view-properties.php">
            <button class="globalButton blueButton mb-2">
              View Properties
            </button>
          </a>
        </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
