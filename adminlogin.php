<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])) {   ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

        <!-- contact.php - The Admins login form page
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/29/21

      -->

        <!-- Page title -->
        <title>adminlogin</title>

    </head>

    <body>
        <?php include(getcwd() . "/header.php"); ?>

        <section class="container-fluid initialPageContent greenMountains pb-5">
            <div class="row pb-5 justify-content-center">
                <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
                    <h2 class="mb-4 text-center">Log in to <span class="dk-orange-text">access your admin account</span>.</h2>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>

                    <form method="POST" action="includes/inc.admin.php">
                        <div class="mb-3">
                            <h4><label for="userName" class="form-label">Username</label></h4>
                            <input type="text" id="username" class="form-control" placeholder="Username" name="username" required />
                        </div>
                        <div class="mb-3">
                            <h4><label for="passwordInput" class="form-label">Password</label></h4>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password" required />
                        </div><br>
                        <div class="mb-3">
                            <h4><label for="usertype" class="form-label">Select User type</label></h4>
                            <select class="form-select mb-3" id="role" name="role" aria-label="Default select example" required />
                            <option selected value="admin">Admin</option>
                            </select>
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

<?php } else {
    header("Location: admin.php");
} ?>

<!-- JavaScript Form Validation using Sweet Alert -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- JavaScript Form Validation using Sweet Alert for login-->
<script>
    $("#submit").click(function() {

        var username = $("#username").val();
        var password = $("#password").val();
        var role = $("#role").val();
        if (username == '' || password == '' || role == '') {
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
