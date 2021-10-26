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
                        <div class="row">
                            <div class="col">
                                <label for="fName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="col">
                                <label for="lName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="example@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="(xxx)xxx-xxxx" required>
                    </div>
                    <div class="mb-3">
                        <label for="address1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address1" name="address1" placeholder="Address Line 1" required>
                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2">
                    </div>
                    <div class="mb-3">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Enter zip code" style="width:250px;" pattern="[0-9]{5}" required>
                    </div>

                    <div class="from-group mb-3">
                        <label for="">Properties</label>
                        <select name="Properties" id="Properties" class="form-control" required>
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


                    <div class="pt-3 text-center">
                        <button type="submit" name="submit" value="Reservation" id="submit" class="globalButton blueButton">Book Reservation</button>
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
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address1 = $("#address1").val();
        var zipCode = $("#zipCode").val();
        var Properties = $("#Properties").val();

        if (fname == '' || lname == '' || email == '' || phone == '' || address1 == '' || zipCode == '' || Properties == '') {
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