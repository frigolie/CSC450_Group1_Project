<?php
session_start();
if (isset($_SESSION['user_id'])) {
  if(isset($_GET['property_id'])) {

    $prop_id = htmlspecialchars($_GET['property_id']);
    include 'includes/functions/property/getPropertyByID.php';

    $adults = '';
    $kids = '';
    $pets = '';
    $checkIn = '';
    $checkOut = '';
    $price = '';

  if(isset($_GET['adults'])) {
    $adults = htmlspecialchars($_GET['adults']);
  }
  if(isset($_GET['kids'])) {
    $kids = htmlspecialchars($_GET['kids']);
  }
  if(isset($_GET['pets'])) {
    $pets = htmlspecialchars($_GET['pets']);
  }
  if(isset($_GET['checkIn'])) {
    $checkIn = htmlspecialchars($_GET['checkIn']);
  }
  if(isset($_GET['checkOut'])) {
    $checkOut = htmlspecialchars($_GET['checkOut']);
  }

  $property_query = getPropertyByID($prop_id);

  if (mysqli_num_rows($property_query) > 0) {
    while ($property = mysqli_fetch_assoc($property_query)) {
      $property_name = $property['name'];
      $pets_allowed = $property['pets'];
      $kids_allowed = $property['kids'];
      $price = $property['price'];
    }
  }
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
      Revisions:   12/14/21 - Connecting to DB
      -->

        <!-- Page title -->
        <title>Make Reservation</title>
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

                    ?>

                    <h2 class="mb-1 text-center">Your <span class="dk-orange-text">adventure begins</span> here! </h2>
                    <h3 class="mb-4 text-center">Enter your reservation details below</h3>

                    <form method="POST" action="includes/inc.reservation.php">
                        <div class="mb-3">
                            <h3>Reservation Details</h3>
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
                                    <input type="date" class="form-control dateField" id="checkIn" name="checkIn" aria-describedby="checkIn" required <?php if ($checkIn != '') { echo "value='" . $checkIn . "'"; }?>>
                                </div>
                                <div class="col">
                                    <label for="checkOut" class="form-label">Check-out date</label>
                                    <input type="date" class="form-control dateField" id="checkOut" name="checkOut" aria-describedby="checkOut" required <?php if ($checkOut != '') { echo "value='" . $checkOut . "'"; }?>>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4>Guests</h4>
                        <br>
                        <div class="from-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="adults" class="form-label">Adults (18 yrs+)</label><br>
                                    <input class="mb-3" type="number" id="adults" name="adults" min="1" max="10" step="1" <?php if ($adults != '') { echo "value='" . $adults . "'"; }?> required>
                                </div>
                                <?php if ($kids_allowed == 1) { ?>
                                <div class="col">
                                    <label for="kids" class="form-label">Children</label><br>
                                    <input class="mb-3" type="number" id="kids" name="kids" min="0" max="10" step="1" <?php if ($kids != '') { echo "value='" . $kids . "'"; }?> required>
                                </div>
                              <?php  } else { ?>
                                <input type="hidden" name="kids" value="0" />
                              <?php  } ?>

                                <div class="col">
                                    <label for="pets" class="form-label">Pets</label>
                                    <select name="pets" id="pets" class="form-control" style="width: 150px" required>
                                      <option value="" selected="selected" disabled>--Select--</option>
                                      <?php   if ($pets_allowed == 1) { ?>
                                        <option value="Yes" <?php if ($pets == "Yes") { echo "selected='selected'"; }?>>Yes</option>
                                        <option value="No" <?php if ($pets == "No") { echo "selected='selected'"; }?>>No</option>
                                        <?php  } else { ?>
                                        <option value="No">Pets Not Allowed</option>
                                        <?php  } ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <br>
                        <h4>Contact</h4>
                        <h6>This is how the host will contact you</h6>
                        <br>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="(xxx)xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" style="width:250px" required>
                                </div>
                                <div class="col">
                                  <input type="hidden" name="property_id" id="property_id" value="<?php echo $prop_id; ?>" readonly>
                                  <input type="hidden" name="guest_id" id="guest_id" value="<?php echo $_SESSION['user_id']; ?>" readonly>
                                  <input type="hidden" name="total_price" id="total_price" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea rows="4" cols="50" class="form-control" name="comments" id="comments" placeholder="Add any additional requests here..."></textarea>
                        </div>
                        <h3 class="my-3">Total Cost for your vacation to <?php echo $property_name; ?> is <span class="dk-orange-text" id="cost-estimate">$<?php echo $price; ?></span></h3>
                        <div class="row">
                          <h4 class="col-12 mb-3">Payment Information</h4>
                          <div class="col-12 col-lg-6 mb-3">
                            <label for="card_type">Card Type</label><br>
                            <input type="radio" id="masterCard" name="card_type" value="MasterCard" checked="checked">
                            <label for="masterCard">MasterCard</label><br>
                            <input type="radio" id="visa" name="card_type" value="Visa">
                            <label for="visa">Visa</label><br>
                            <input type="radio" id="americanExpress" name="card_type" value="American Express">
                            <label for="americanExpress">American Express</label>
                          </div>
                          <div class="col-12 col-lg-6 mb-3">
                            <label for="card_number">Card Number</label><br>
                            <input type="text" pattern="[0-9]+" maxlength="16" name="card_number" required><br>
                            <label for="card_code">Card Security Code</label><br>
                            <input type="text" pattern="[0-9]+" maxlength="3" name="card_code" required>
                          </div>
                        </div>

                        <div class="pt-3 text-center">
                            <button type="submit" name="createReservation" value="createReservation" id="createReservation" class="globalButton blueButton">Book Reservation</button>
                        </div>
                </div>
            </div>
            </form>
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
        $("#createReservation").click(function() {

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
  header("Location: /view-properties.php");
}
} else if (isset($_SESSION['admin_id'])) { // redirect admin
    header("Location: /admin.php");
} else { // redirect logged out users
    header("Location: /login.php");
} ?>
