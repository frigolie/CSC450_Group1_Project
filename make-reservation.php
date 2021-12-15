<?php
session_start();
if (isset($_SESSION['username'])) {
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
      Revisions:
      -->

    <!-- Page title -->
    <title>Make A Reservation</title>
</head>

<body>
  <?php include(getcwd() . "/header.php"); ?>
    <section class="container-fluid initialPageContent pinkMountains pb-5">
        <div class="row pb-5 justify-content-center">

            <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
                <h2 class="mb-1 text-center">Your <span class="dk-orange-text">adventure begins</span> here! </h2>
                <h3 class="mb-4 text-center">Enter your reservation details below</h3>


                <!-- Bootstrap Sample Form - to be replaced once forms are created -->
                <!-- <form> -->
                <form method="POST" action="includes/inc.reservation.php">
                    <div class="mb-3">

                        <!-- I'm not great with bootstrap. The formatting here for the name works, but the code itself is sloppy. I'll look into editing it to look better!-->
                        <br>
                        <h3>Reservation Details</h3>
                        <br>
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
                    <br>
                    <h3>Guests</h3>
                    <br>
                    <div class="from-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="adults" class="form-label">Adults (18 yrs+)</label>
                                <select name="adults" id="adults" class="form-control" style="width: 150px" required>
                                    <option value="">--Select Guests--</option>
                                    <option value="1">1 adult</option>
                                    <option value="2">2 adults</option>
                                    <option value="3">3 adults</option>
                                    <option value="4">4 adults</option>
                                    <option value="5">5 adults</option>
                                    <option value="6">6 adults</option>
                                    <option value="7">7 adults</option>
                                    <option value="8">8 adults</option>
                                    <option value="9">9 adults</option>
                                    <option value="10">10 adults</option>
                                    <option value="11">11 adults</option>
                                    <option value="12">12 adults</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="kids" class="form-label">Children</label>
                                <select name="kids" id="kids" class="form-control" required>
                                    <option value="0">Children Not Allowed</option>
                                    <option value="" selected="selected" disabled>--Select Guests--</option>
                                    <option value="1">1 child</option>
                                    <option value="2">2 children</option>
                                    <option value="3">3 children</option>
                                    <option value="4">4 children</option>
                                    <option value="5">5 children</option>
                                    <option value="6">6 children</option>
                                    <option value="7">7 children</option>
                                    <option value="8">8 children</option>
                                    <option value="9">9 children</option>
                                    <option value="10">10 children</option>
                                    <option value="11">11 children</option>
                                    <option value="12">12 children</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="pets" class="form-label">Pets</label>
                                <select name="pets" id="pets" class="form-control" style="width: 150px" required>
                                    <option value="0">Pets Not Allowed</option>
                                    <option value="" selected="selected" disabled>--Select--</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Easy html fix, align dropdown boxes in select -->
                    <br>
                    <h3>Contact</h3>
                    <h6>This is how the host will contact you</h6>
                    <br>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="phone" class="form-label">phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="(xxx)xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" style="width:250px" required>
                            </div>
                            <div class="col">
                                <label for="Properties" class="form-label">Properties</label>
                                <select name="Properties" id="Properties" class="form-control" style="width: 250px" required>
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
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="textAreaInput" class="form-label">Comments</label>
                        <textarea rows="4" cols="50" class="form-control" name="Comments" id="Comments" placeholder="Add any additional requests here..."></textarea>
                    </div>

                    <div class="pt-3 text-center">
                        <button type="submit" name="submit" value="Reservation" id="submit" class="globalButton blueButton" style="height:50px;width:300px;font-size:1.4em;">Book Reservation</button>
                    </div>
            </div>
        </div>
        </form>
    </section>
    <?php include(getcwd() . "/footer.php"); ?>
</body>

</html>

<!-- JavaScript Form Validation using Sweet Alert -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- JavaScript Form Validation using Sweet Alert for  Reservation-->
<script>
    $("#submit").click(function() {

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
        } else {
            swal({
                title: "Successfully Reservation",
                icon: "success",
                button: "OK",
            });
        }

    })
</script>
<?php } else {
    header("Location: /login.php");
} ?>
