<?php
session_start();
if (isset($_SESSION['user_id'])) {
  include 'includes/functions/reservation/getPastReservations.php';
  include 'includes/functions/reservation/getUpcomingReservations.php';
  include 'includes/functions/image/getPropertyImages.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- upcoming-reservations.php - The page for viewing upcoming reservations as a guest
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/20/21
      Revisions:   12/14/21 - Connecting to the database
      -->

      <!-- Page title -->
    <title>Upcoming Reservations</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 pinkMountains">
      <div class="container mb-3">
        <div class="row py-1 justify-content-center">
          <h1 class="mb-5 text-shadow">Upcoming Reservations</h1>

        <?php
          $future_reservations = getUpcomingReservations($_SESSION['user_id']);
          if (mysqli_num_rows($future_reservations) > 0) {
            $i = 1;
            while ($f_res = mysqli_fetch_assoc($future_reservations)) {
              $checkIn = date_create($f_res['checkIn']);
              $checkOut = date_create($f_res['checkOut']);
              $images = getPropertyImages($f_res['property_id']);
              if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/property_images/' . $images[0]['filename']; } else { $featImg = '/graphic/ha_square.png'; }
              ?>
              <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
                <div class="row">
                  <div class="col-12 text-start mb-2">
                    <h3>Reservation #<?php echo $f_res['id']; ?></h3>
                  </div>
                  <div class="col-12 col-md-6">
                    <a href="/property-details.php?property_id=<?php echo $f_res['property_id']; ?>">
                      <div class="w-100 rentalListing rounded-custom">
                        <img class="w-100" src="<?php echo $featImg; ?>" alt="<?php echo $f_res['name'] ?>" title="Photo of <?php echo $f_res['name'] ?>">
                      </div>
                    </a>
                    <a href="/property-details.php?property_id=<?php echo $f_res['property_id']; ?>">
                      <h4 class="mt-3 mb-1"><?php echo $f_res['name'] ?></h4>
                    </a>
                    <h5><?php echo $f_res['address'] ?><br/>
                      <?php echo $f_res['city'] . ", " . $f_res['state'] . " " . $f_res['zip']; ?>
                    </h5>
                  </div>
                  <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                    <p class="w-100 reservationNames">
                      <span class="reservationTitle">Name on Reservation: </span><?php echo $f_res['fname'] . " " . $f_res['lname']; ?>
                    </p>
                    <p class="w-100 reservationDates">
                      <span class="reservationTitle">Dates of Stay: </span><?php echo date_format($checkIn,"m/d/Y") . " - " . date_format($checkOut,"m/d/Y"); ?>
                    </p>
                    <p class="w-100 reservationGuests">
                      <span class="reservationTitle">Number of Guests: </span><?php echo $f_res['adults']; ?> adult(s), <?php echo $f_res['kids']; ?> kid(s), <?php if ($f_res['pets'] == 'No') { echo "No "; } ?> Pets
                    </p>
                    <p class="w-100 reservationPaid">
                      <span class="reservationTitle">Total Paid: </span>$<?php echo $f_res['total_price']; ?>
                    </p>
                    <div class="w-100">
                      <a href="/edit-reservation.php?reservation_id=<?php echo $f_res['id']; ?>">
                        <button class="globalButton orangeButton my-2 me-2">Edit Reservation</button>
                      </a>
                      <a href="/messages.php?recipient_id=<?php echo $f_res['owner_id']; ?>">
                        <button class="globalButton blueButton my-2 ms-2">Contact Host</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++;
            }
          } else {
            echo '<h2 class="white-text text-center text-shadow">You have no upcoming reservations booked.<br><a class="blue-text" href="/view-properties.php">Book one now!</a></h2>';
          }?>

        </div>
      </div>
    </section>

    <section class="container-fluid py-5 black-bg">
      <div class="container mb-3">
        <div class="row py-1 justify-content-center">
          <h2 class="mb-5 lt-gray-text text-shadow">Previous Reservations</h2>

          <?php
          $past_reservations = getPastReservations($_SESSION['user_id']);
          if (mysqli_num_rows($past_reservations) > 0) {
            $i = 1;
            while ($p_res = mysqli_fetch_assoc($past_reservations)) {
              $checkIn = date_create($p_res['checkIn']);
              $checkOut = date_create($p_res['checkOut']);
              $images = getPropertyImages($p_res['property_id']);
              if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/property_images/' . $images[0]['filename']; } else { $featImg = '/graphic/ha_square.png'; }
              ?>

              <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
                <div class="row">
                  <div class="col-12 text-start mb-2">
                    <h3>Reservation #<?php echo $p_res['id']; ?></h3>
                  </div>
                  <div class="col-12 col-md-6">
                    <a href="/property-details.php?property_id=<?php echo $p_res['property_id']; ?>">
                      <div class="w-100 rentalListing rounded-custom">
                        <img class="w-100" src="<?php echo $featImg; ?>" alt="<?php echo $p_res['name'] ?>" title="Photo of <?php echo $p_res['name'] ?>">
                      </div>
                    </a>
                    <a href="/property-details.php?property_id=<?php echo $p_res['property_id']; ?>">
                      <h4 class="mt-3 mb-1"><?php echo $p_res['name'] ?></h4>
                    </a>
                    <h5><?php echo $p_res['address'] ?><br/>
                      <?php echo $p_res['city'] . ", " . $p_res['state'] . " " . $p_res['zip']; ?>
                    </h5>
                  </div>
                  <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                    <p class="w-100 reservationNames">
                      <span class="reservationTitle">Name on Reservation: </span><?php echo $p_res['fname'] . " " . $p_res['lname']; ?>
                    </p>
                    <p class="w-100 reservationDates">
                      <span class="reservationTitle">Dates of Stay: </span><?php echo date_format($checkIn,"m/d/Y") . " - " . date_format($checkOut,"m/d/Y"); ?>
                    </p>
                    <p class="w-100 reservationGuests">
                      <span class="reservationTitle">Number of Guests: </span><?php echo $p_res['adults']; ?> adult(s), <?php echo $p_res['kids']; ?> kid(s), <?php if ($p_res['pets'] == 'No') { echo "No "; } ?> Pets
                    </p>
                    <p class="w-100 reservationPaid">
                      <span class="reservationTitle">Total Paid: </span>$<?php echo $p_res['total_price']; ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php $i++;
            }
          } else {
            echo '<h2 class="white-text text-center text-shadow">You do not have any past reservations on record.</h2>';
          }?>

        </div>
      </div>
    </section>


    <section class="container-fluid py-5 lt-gray-bg">
      <div class="row w-75 mx-auto py-4 max-880">
        <div class="col-12 mb-3">
          <h2 class="text-center">Can't wait for another adventure?</h2>
        </div>
        <div class="col-12 d-flex justify-content-center">
          <a href="/view-properties.php">
            <button class="globalButton blueButton mb-2">
              Explore More Destinations!
            </button>
          </a>
        </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
<?php } else if(isset($_SESSION['admin_id'])) {
    header("Location: /admin.php");
} else {
    header("Location: /login.php");
} ?>
