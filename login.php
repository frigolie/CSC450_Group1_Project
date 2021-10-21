<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

    <!-- contact.php - The login form page
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
    <title>Login</title>
</head>

<body>
    <?php include(getcwd() . "/header.php"); ?>

    <section class="container-fluid initialPageContent greenMountains pb-5">
        <div class="row pb-5 justify-content-center">
            <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
                <h2 class="mb-4 text-center">Log in to <span class="dk-orange-text">access your account</span>.</h2>
                <form method="POST" action="index.php">
                    <div class="mb-3">
                        <h4><label for="userName" class="form-label">Username</label></h4>
                        <input type="text" id="username" class="form-control" placeholder="Email or Username" name="username" required />
                    </div>
                    <div class="mb-3">
                        <h4><label for="passwordInput" class="form-label">Password</label></h4>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password" required />
                    </div><br>
                    <!-- my html was spacing out after working for more than 6 hours straight, but we should use a line break other than <br> -->

                    <div class="mb-3">
                        <!-- could use a better name -->
                        <h5><input type="checkbox" id="remember" name="remember" value=" ">
                            <label for="remember">Remember me on this device</label>
                        </h5>
                    </div>
                    <div id="passHelp" class="form-text">
                        <h5> Forgot your password? Click <a href="#">here</a>
                        </h5>
                    </div>
                    <div class="pt-3 text-center">
                        <button type="submit" id="submit" value="Sign In" name="submit" class="globalButton orangeButton" style="height:50px;width:200px;font-size:1.4em;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include(getcwd() . "/footer.php"); ?>
</body>

</html>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all the fields!</p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information!</p>";
    }
}
?>

<!-- JavaScript Form Validation using Sweet Alert -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- JavaScript Form Validation using Sweet Alert for login-->
<script>
    $("#submit").click(function() {

        var username = $("#username").val();
        var password = $("#password").val();

        if (username == '' || password == '') {
            swal({
                title: "Fields Empty!!",
                text: "Please check the missing field!!",
                icon: "warning",
                button: "OK",
            });
        } else {
            swal({
                title: "Successfully Login",
                icon: "success",
                button: "OK",
            });
        }

    })
</script>