<?php
session_start();
if (isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- edit-reservation.php - The form through which a guest can update or delete an existing reservation
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
    <title>Edit Reservation</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

  <section class="container-fluid initialPageContent pinkMountains pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Update your <span class="dk-orange-text">reservation details</span> below. </h2>

          <form method="POST" action="includes/inc.reservation.php">
                    <div class="mb-3">
                        <h3>Reservation Info</h3>
                        <div class="row">
                            <div class="col">
                                <label for="fName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="col">
                                <label for="lName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="checkIn" class="form-label">Check-in date</label>
                                <input type="date" class="form-control" id="checkIn" name="checkIn" aria-describedby="checkIn" required>
                            </div>
                            <div class="col">
                                <label for="checkOut" class="form-label">Check-out date</label>
                                <input type="date" class="form-control" id="checkOut" name="checkOut" aria-describedby="checkOut" required>
                            </div>
                        </div>
                    </div>

                        <!-- Easy html fix, align dropdown boxes in select -->
                    <h3>Guests</h3>
                        <label for="adults" class="form-label"><h5>Adults</h5></label>
                        <select id="adults" name="adults" required>
                            <option>Select an option</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>

                  <div class="mb-3">
                        <label for="kids" class="form-label"><h5>Children</h5></label>
                        <select id="kids" name="kids">
                            <option>Select an option</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pets" class="form-label"><h5>Pets?</h5></label>
                        <select id="pets" name="pets" required>
                            <option>Select an option</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                    <div class="from-group mb-3">
                        <label for="">Properties</label>
                        <select name="Properties" id="Properties" class="form-control" style="width: 300px"required>
                            <option value="">--Select Properties--</option>
                            <option value="Downtown Penthouse">Downtown Penthouse</option>
                            <option value="Oceanside Cabana">Oceanside Cabana</option>
                            <option value="Mountain Cabin">Mountain Cabin</option>
                            <option value="Classical Townhouse">Classical Townhouse</option>
                            <option value="Victorian Manor">Victorian Manor</option>
                            <option value="Country Cottage">Country Cottage</option>
                            <option value="Mid-Century Ranch House">Mid-Century Ranch House</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="textAreaInput" class="form-label">Comments</label>
                        <textarea rows="4" cols="50" class="form-control" id="textAreaInput" placeholder="Add any additional requests here..."></textarea>
                    </div>

            <div class="pt-3 text-center">
              <button type="submit" class="globalButton blueButton">Update Reservation</button>
              <button type="delete" class="globalButton redButton">Delete Reservation</button>
            </div>
          </div>
        </div>
      </form>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
<?php } else {
    header("Location: /login.php");
} ?>
