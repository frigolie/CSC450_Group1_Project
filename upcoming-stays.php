<?php
session_start();
if (isset($_SESSION['user_id'])) {
  include 'includes/functions/reservation/getPastStays.php';
  include 'includes/functions/reservation/getUpcomingStays.php';
  include 'includes/functions/image/getPropertyImages.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- upcoming-stays.php - The page for viewing upcoming stays as a host
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
    <title>Upcoming Stays</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-3 pinkMountains">
      <div class="container mb-3">
        <div class="row py-1 justify-content-center">
          <h1 class="mb-5 text-shadow">Upcoming Hosted Stays</h1>

          <?php
          $future_stays = getUpcomingStays($_SESSION['user_id']);
          if (mysqli_num_rows($future_stays) > 0) {
            $i = 1;
            while ($f_stay = mysqli_fetch_assoc($future_stays)) {
              $checkIn = date_create($f_stay['checkIn']);
              $checkOut = date_create($f_stay['checkOut']);
              $images = getPropertyImages($f_stay['property_id']);
              if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/property_images/' . $images[0]['filename']; } else { $featImg = '/graphic/ha_square.png'; }
              ?>
              <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
                <div class="row">
                  <div class="col-12 text-start mb-2">
                    <h3>Reservation #<?php echo $f_stay['id']; ?></h3>
                  </div>
                  <div class="col-12 col-md-6">
                    <a href="/property-details.php?property_id=<?php echo $f_stay['property_id']; ?>">
                      <div class="w-100 rentalListing rounded-custom">
                        <img class="w-100" src="<?php echo $featImg; ?>" alt="<?php echo $f_stay['name'] ?>" title="Photo of <?php echo $f_stay['name'] ?>">
                      </div>
                    </a>
                    <a href="/property-details.php?property_id=<?php echo $f_stay['property_id']; ?>">
                      <h4 class="mt-3 mb-1"><?php echo $f_stay['name'] ?></h4>
                    </a>
                    <h5><?php echo $f_stay['address'] ?><br/>
                      <?php echo $f_stay['city'] . ", " . $f_stay['state'] . " " . $f_stay['zip']; ?>
                    </h5>
                  </div>
                  <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                    <p class="w-100 reservationNames">
                      <span class="reservationTitle">Name of Guest: </span><?php echo $f_stay['fname'] . " " . $f_stay['lname']; ?>
                    </p>
                    <p class="w-100 reservationDates">
                      <span class="reservationTitle">Dates of Stay: </span><?php echo date_format($checkIn,"m/d/Y") . " - " . date_format($checkOut,"m/d/Y"); ?>
                    </p>
                    <p class="w-100 reservationGuests">
                      <span class="reservationTitle">Number of Guests: </span><?php echo $f_stay['adults']; ?> adult(s), <?php echo $f_stay['kids']; ?> kid(s), <?php if ($f_stay['pets'] == 'No') { echo "No "; } ?> Pets
                    </p>
                    <p class="w-100 reservationPaid">
                      <span class="reservationTitle">Total Paid: </span>$<?php echo $f_stay['total_price']; ?>
                    </p>
                    <div class="w-100">
                      <a href="/edit-reservation.php?reservation_id=<?php echo $f_stay['id']; ?>">
                        <button class="globalButton orangeButton my-2 me-2">Edit Reservation</button>
                      </a>
                      <a href="/messages.php?recipient_id=<?php echo $f_stay['guest_id']; ?>">
                        <button class="globalButton blueButton my-2 ms-2">Contact Guest</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++;
            }
          } else {
            echo '<h2 class="white-text text-center text-shadow">You currently are hosting no upcoming stays.</h2>';
          }?>

        </div>
      </div>
    </section>

    <section class="container-fluid py-5 lt-gray-bg">
      <div class="container mb-3">
        <div class="row py-1 justify-content-center">
          <h2 class="mb-5 dk-orange-text text-shadow">Previous Hosted Stays</h2>

          <?php
          $past_stays = getPastStays($_SESSION['user_id']);
          if (mysqli_num_rows($past_stays) > 0) {
            $i = 1;
            while ($p_stay = mysqli_fetch_assoc($past_stays)) {
              $checkIn = date_create($p_stay['checkIn']);
              $checkOut = date_create($p_stay['checkOut']);
              $images = getPropertyImages($p_stay['property_id']);
              if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/property_images/' . $images[0]['filename']; } else { $featImg = '/graphic/ha_square.png'; }
              ?>

              <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
                <div class="row">
                  <div class="col-12 text-start mb-2">
                    <h3>Reservation #<?php echo $p_stay['id']; ?></h3>
                  </div>
                  <div class="col-12 col-md-6">
                    <a href="/property-details.php?property_id=<?php echo $p_stay['property_id']; ?>">
                      <div class="w-100 rentalListing rounded-custom">
                        <img class="w-100" src="<?php echo $featImg; ?>" alt="<?php echo $p_stay['name'] ?>" title="Photo of <?php echo $p_stay['name'] ?>">
                      </div>
                    </a>
                    <a href="/property-details.php?property_id=<?php echo $p_stay['property_id']; ?>">
                      <h4 class="mt-3 mb-1"><?php echo $p_stay['name'] ?></h4>
                    </a>
                    <h5><?php echo $p_stay['address'] ?><br/>
                      <?php echo $p_stay['city'] . ", " . $p_stay['state'] . " " . $p_stay['zip']; ?>
                    </h5>
                  </div>
                  <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                    <p class="w-100 reservationNames">
                      <span class="reservationTitle">Name of Guest: </span><?php echo $p_stay['fname'] . " " . $p_stay['lname']; ?>
                    </p>
                    <p class="w-100 reservationDates">
                      <span class="reservationTitle">Dates of Stay: </span><?php echo date_format($checkIn,"m/d/Y") . " - " . date_format($checkOut,"m/d/Y"); ?>
                    </p>
                    <p class="w-100 reservationGuests">
                      <span class="reservationTitle">Number of Guests: </span><?php echo $p_stay['adults']; ?> adult(s), <?php echo $p_stay['kids']; ?> kid(s), <?php if ($p_stay['pets'] == 'No') { echo "No "; } ?> Pets
                    </p>
                    <p class="w-100 reservationPaid">
                      <span class="reservationTitle">Total Paid: </span>$<?php echo $p_stay['total_price']; ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php $i++;
            }
          } else {
            echo '<h2 class="black-text text-center text-shadow">You have not hosted any past stays.</h2>';
          }?>

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
