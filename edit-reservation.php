<?php
session_start();
if (isset($_SESSION['user_id'])) {
  if(isset($_GET['reservation_id'])) {

    $res_id = htmlspecialchars($_GET['reservation_id']);
    include 'includes/functions/reservation/getReservationByID.php';
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

        <!-- make-reservation.php - The form through which a guest can reserve a property
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
        <title>Update Reservation</title>
    </head>

    <body>
        <?php include(getcwd() . "/header.php"); ?>
        <section class="container-fluid initialPageContent pinkMountains pb-5">
            <div class="row pb-5 justify-content-center">

                <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
                    <?php
                    session_start();

                    if (isset($_SESSION['status'])) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong></strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['status']);
                    }

                    $res_query = getReservationByID($res_id);

                    if (mysqli_num_rows($res_query) > 0) {
                      while ($res = mysqli_fetch_assoc($res_query)) {
                        $price = $res['price'];
                    ?>
                    <h3 class="mb-4 text-center">Update your reservation details below</h3>

                    <form method="POST" action="includes/inc.reservation.php">
                        <div class="mb-3">
                          <h3>Reservation Details</h3>
                          <div class="row">
                              <div class="col">
                                  <label for="fName" class="form-label">First Name</label>
                                  <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $res['fname']; ?>" required>
                              </div>
                              <div class="col">
                                  <label for="lName" class="form-label">Last Name</label>
                                  <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $res['lname']; ?>" required>
                              </div>
                          </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="checkIn" class="form-label">Check-in date</label>
                                    <input type="date" class="form-control dateField" id="checkIn" name="checkIn" aria-describedby="checkIn" value="<?php echo $res['checkIn']; ?>" required>
                                </div>
                                <div class="col">
                                    <label for="checkOut" class="form-label">Check-out date</label>
                                    <input type="date" class="form-control dateField" id="checkOut" name="checkOut" aria-describedby="checkOut" value="<?php echo $res['checkOut']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3>Guests</h3>
                        <br>
                        <div class="from-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="adults" class="form-label">Adults (18 yrs+)</label><br>
                                    <input class="mb-3" type="number" id="adults" name="adults" min="1" max="10" step="1" value="<?php echo $res['adults']; ?>" required>
                                </div>
                                <?php if ($res['kids_allowed'] == 1) { ?>
                                <div class="col">
                                    <label for="kids" class="form-label">Children</label><br>
                                    <input class="mb-3" type="number" id="kids" name="kids" min="0" max="10" step="1" value="<?php echo $res['kids_reserved']; ?>" required>
                                </div>
                              <?php  } else { ?>
                                <input type="hidden" name="kids" value="0" />
                              <?php  } ?>
                              <div class="col">
                                  <label for="pets" class="form-label">Pets</label>
                                  <select name="pets" id="pets" class="form-control" style="width: 150px" required>
                                    <option value="" selected="selected" disabled>--Select--</option>
                                    <?php   if ($res['pets_allowed'] == 1) { ?>
                                      <option value="Yes" <?php if ($res['pets_reserved'] == "Yes") { echo "selected='selected'"; }?>>Yes</option>
                                      <option value="No" <?php if ($res['pets_reserved'] == "No") { echo "selected='selected'"; }?>>No</option>
                                      <?php  } else { ?>
                                      <option value="No">Pets Not Allowed</option>
                                      <?php  } ?>
                                  </select>
                              </div>
                            </div>
                        </div>

                        <br>
                        <h3>Contact</h3>
                        <h6>This is how the host will contact you</h6>
                        <br>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="phone" class="form-label">phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="(xxx)xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $res['phone']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="textAreaInput" class="form-label">Comments</label>
                            <textarea rows="4" cols="50" class="form-control" name="comments" id="comments" placeholder="Add any additional requests here..."><?php echo $res['comments']; ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $res['id']; ?>" readonly />
                        <input type="hidden" name="total_price" value="<?php echo $res['total_price']; ?>" readonly />
                        <h3 class="my-3">Total Cost for this reservation at <?php echo $res['name']; ?> is <span class="dk-orange-text" id="cost-estimate">$<?php echo $res['price']; ?></span></h3>


                        <div class="pt-3 text-center">
                            <button type="updateReservation" id="updateReservation" name="updateReservation" class="globalButton blueButton">Update Reservation</button>
                            <div class="pt-3 text-center mt-3">
                                <h3 class="mb-1 text-left">Want to delete your reservation? </h3>
                                <h3><span class="dk-orange-text">Warning! </span> This action cannot be undone!</h3>
                                <div class="mb-3">
                                    <button type="delete" class="globalButton redButton">Delete Reservation</button>
                                </div>
                            </div>
                        </div>
                    </form>
                  <?php  } // End while res query
                }  // End if res query ?>
        </section>
        <?php include(getcwd() . "/footer.php"); ?>
    </body>

    </html>

    <script>
      $( document ).ready(function() {
        calculatePrice();
        $('.dateField').change(function() {
          calculatePrice();
        });
      });

      function calculatePrice() {
        var startDate = new Date($('#checkIn').val());
        var endDate = new Date($('#checkOut').val());
        if(startDate != '' && endDate != '') {
          if (startDate > endDate){
            alert('Check-out date must be later than check-in!');
            $('#checkOut').val('');
          } else if (startDate < endDate) {
            var time_difference = endDate.getTime() - startDate.getTime();
            var numDays = time_difference / (1000 * 60 * 60 * 24);

            var price = (<?php echo $price; ?> * numDays);
            $('#total_price').val(price);
            $('#cost-estimate').text('$' + price);
          }
        }
      }
    </script>

    <!-- JavaScript Form Validation using Sweet Alert -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- JavaScript Form Validation using Sweet Alert for  Reservation-->
    <script>
        $("#update").click(function() {

            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var checkIn = $("#checkIn").val();
            var checkOut = $("#checkOut").val();
            var adults = $("#adults").val();
            var kids = $("#kids").val();
            var pets = $("#pets").val();
            var phone = $("#phone").val();
            var Properties = $("#Properties").val();


            if (fname == '' || lname == '' || checkIn == '' || checkOut == '' || adults == '' || kids == '' || pets == '' || phone == '' || Properties == '') {
                swal({
                    title: "Fields Empty!!",
                    text: "Please check the missing field!!",
                    icon: "warning",
                    button: "OK",
                });

            }

        })
    </script>
<?php } else {
    header("Location: /upcoming-reservations.php");
  }
 } else if (isset($_SESSION['admin_id'])) { // redirect admin
    header("Location: /admin.php");
} else { // redirect logged out users
    header("Location: /login.php");
} ?>
