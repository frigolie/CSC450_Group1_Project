<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- upcoming-reservations.php - The page for viewing upcoming reservations as a host
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
    <title>Upcoming Reservations</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 pinkMountains">
      <div class="container mb-3">
        <div class="row py-1 justify-content-center">
          <h1 class="mb-5">Upcoming Reservations</h1>

          <!-- This single listing can be created on a foreach loop over data so that it can grow dynamically -->
          <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
            <div class="row">
              <div class="col-12 text-start mb-2">
                <h3>Reservation #0293843</h3>
              </div>
              <div class="col-12 col-md-6">
                <a href="#">
                  <div class="w-100 rentalListing rounded-custom">
                    <img class="w-100" src="graphic/penthouse.jpg" alt="Penthouse Rental" title="Photo by Mostafa Safadel">
                  </div>
                </a>
                <a href="#">
                  <h4 class="mt-3 mb-1">Downtown Penthouse</h4>
                </a>
                <h5>111 Main Street Apt #117<br/>
                  Minneapolis, MN 55111
                </h5>
              </div>
              <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                <p class="w-100 reservationNames">
                  <span class="reservationTitle">Name of Guest: </span>Jane Green
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
                  <button class="globalButton orangeButton my-2 me-2">Edit Reservation</button>
                  <button class="globalButton blueButton my-2 ms-2">Contact Guest</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End single listing, lines 38-118 are repeating for demo purposes until we get dynamic functionality set up -->

          <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
            <div class="row">
              <div class="col-12 text-start mb-2">
                <h3>Reservation #0484392</h3>
              </div>
              <div class="col-12 col-md-6">
                <a href="#">
                  <div class="w-100 rentalListing rounded-custom">
                    <img class="w-100" src="graphic/cabana.jpg" alt="Cabana Rental" title="Photo by Mike Swigunski">
                  </div>
                </a>
                <a href="#">
                  <h4 class="mt-3 mb-1">Oceanside Cabana</h4>
                </a>
                <h5>987 Breezy Bay Way<br/>
                  Tropicana, FL 32004
                </h5>
              </div>
              <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                <p class="w-100 reservationNames">
                  <span class="reservationTitle">Name of Guest: </span>Joseph Jones
                </p>
                <p class="w-100 reservationDates">
                  <span class="reservationTitle">Dates of Stay: </span>08/02/22 - 08/11/22
                </p>
                <p class="w-100 reservationGuests">
                  <span class="reservationTitle">Number of Guests: </span>2 adult(s), 0 kid(s), 0 pet(s)
                </p>
                <p class="w-100 reservationPaid">
                  <span class="reservationTitle">Total Paid: </span>$962.44
                </p>
                <div class="w-100">
                  <button class="globalButton orangeButton my-2 me-2">Edit Reservation</button>
                  <button class="globalButton blueButton my-2 ms-2">Contact Guest</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container-fluid py-5 lt-gray-bg">
      <div class="row w-75 mx-auto py-4 max-880">
        <div class="col-12 mb-3">
          <h2 class="text-center">Experiencing Technical Issues?</h2>
        </div>
        <div class="col-12 d-flex justify-content-center">
          <a href="/contact.php">
            <button class="globalButton blueButton mb-2">
              Contact Us
            </button>
          </a>
        </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
