<?php include(getcwd() . "/header.php");?>
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
                   11/26/21 - Adding link to adminlogin.php
      -->

    <!-- Page title -->
    <title>Login</title>
</head>

<body>


    <section class="container-fluid initialPageContent greenMountains pb-5">
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
                <h2 class="mb-4 text-center">Log in to <span class="dk-orange-text">access your account</span>.</h2>



                <form method="POST" action="includes/inc.login.php">
                      <div class="mb-3">
                        <h4><label for="userName" class="form-label">Username</label></h4>
                        <?php
                        if (isset($_GET['username'])) {
                            $username = $_GET['username'];
                            echo '<input type="text" id="username" class="form-control" placeholder="Email or Username" name="username" value="' . $username . '" required>';
                        } else {
                            echo '<input type="text" id="username" class="form-control" placeholder="Email or Username" name="username" required>';
                        } ?>
                    </div>
                    <div class="mb-3">
                        <h4><label for="passwordInput" class="form-label">Password</label></h4>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password" required>
                    </div><br>
                    <!-- my html was spacing out after working for more than 6 hours straight, but we should use a line break other than <br> -->

                    
                    <div class="form-text mt-3">
                        <h5> Trying to access your admin dashboard? Click <a href="/adminlogin.php">here</a>
                        </h5>
                    </div>
                    <div class="pt-3 text-center">
                        <button type="submit" id="submit" value="Sign In" name="submit" class="globalButton orangeButton" style="height:50px;width:200px;font-size:1.4em;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
<?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all the fields!</p>";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login information!</p>";
            }
        }
?>
    </section>
<?php include(getcwd() . "/footer.php");?>
</body>

</html>

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
        }
    })
</script>
