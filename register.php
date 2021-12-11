<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

    <!-- register.php - The registration form page
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/16/21
      Revisions:   10/19/21 - replacing bootstrap sample form
      -->

    <!-- Page title -->
    <title>Register</title>

</head>

<body>
  <?php include(getcwd() . "/header.php");?>
    <section class="container-fluid initialPageContent purpleMountains pb-5">
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
                
                <h2 class="mb-1 text-center">Creating an account is <span class="dk-orange-text">quick and easy</span>.</h2>
                <h3 class="mb-4 text-center">Get started below!</h3>


                <!-- Bootstrap Sample Form - to be replaced once forms are created -->
                <!-- <form> -->
                <form method="POST" action="includes/inc.signup.php">
                    <div class="mb-3">

                        <!-- I'm not great with bootstrap. The formatting here for the name works, but the code itself is sloppy. I'll look into editing it to look better!-->
                        <div class="row">
                           <div class="col">
                                <label for="fName" class="form-label">First Name</label>
                                <?php
                                if (isset($_GET['fname'])) {
                                    $fname = $_GET['fname'];
                                    echo '<input type="text" id="fname" class="form-control" placeholder="First Name" name="fname" value="' . $fname . '" required>';
                                } else {
                                    echo '<input type="text" id="fname" class="form-control" placeholder="First Name" name="fname" required>';
                                } ?>

                            </div>

                             <div class="col">
                                <label for="lName" class="form-label">Last Name</label>
                                <?php
                                if (isset($_GET['lname'])) {
                                    $lname = $_GET['lname'];
                                    echo '<input type="text" id="lname" class="form-control" placeholder="Last Name" name="lname" value="' . $lname . '" required>';
                                } else {
                                    echo '<input type="text" id="lname" class="form-control" placeholder="Last Name" name="lname" required>';
                                } ?>
                            </div>
                        </div>
                    </div>

                  <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <?php
                        if (isset($_GET['email'])) {
                            $email = $_GET['email'];
                            echo '<input type="email" id="email" class="form-control" placeholder="example@email.com" name="email" value="' . $email . '" required>';
                        } else {
                            echo '<input type="email" id="email" class="form-control" placeholder="example@email.com" name="email" required>';
                        } ?>
                        <div id="emailHelp" class="form-text">
                            Don't worry, we'll never share your email with anyone else.</div>
                    </div>

                   <div class="mb-3">
                        <label for="usernameInput" class="form-label">Username</label>
                        <?php
                        if (isset($_GET['username'])) {
                            $username = $_GET['username'];
                            echo '<input type="text" id="username" class="form-control" placeholder="Username" name="username" value="' . $username . '" required>';
                        } else {
                            echo '<input type="text" id="username" class="form-control" placeholder="Username" name="username" required>';
                        } ?>
                    </div>

                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password" required>

                    </div>

                    <div class="mb-3">
                        <label for="confirmpasswordInput" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmpassword" class="form-control" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required>
                    </div>

                    <div class="pt-3 text-center">
                        <button type="submit" id="submit" value=" Register" name="submit" class="globalButton orangeButton" style="height:50px;width:200px;font-size:1.4em;" class="btn btn-block btn-primary">Submit</button>
                    </div>
            </div>
        </div>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all the fields!</p>";
            } else if ($_GET["error"] == "invalidUsername") {
                echo "<p>Choose a proper username!</p>";
            } else if ($_GET["error"] == "invalidEmail") {
                echo "<p>Choose a proper email!</p>";
            } else if ($_GET["error"] == "invalidpasswordsdontmatch") {
                echo "<p>Password doesn't match!</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong, try again!</p>";
            } else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username already taken!</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p>You have signed up!</p>";
            }
        }
        ?>
    </section>
    <?php include(getcwd() . "/footer.php");?>
</body>

</html>



<!-- JavaScript Form Validation using Sweet Alert -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- JavaScript Form Validation using Sweet Alert for Register-->
<script>
    $("#submit").click(function() {

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var phone = $("#phone").val();
        var date = $("#date").val();

        if (fname == '' || lname == '' || username == '' || email == '' || password == '' || phone == '' || date == '') {
            swal({
                title: "Fields Empty!!",
                text: "Please check the missing field!!",
                icon: "warning",
                button: "OK",
            });
        }

    })
</script>