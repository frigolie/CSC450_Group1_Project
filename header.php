<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!-- header.php - Global header for use on each page of the web app
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/03/21
      Revisions:   10/16/21 - Adding secondary nav bar
                            - Adding Page Links
                            - Updating the listing images to be equalized in height
                   10/19/21 - Adding logo
                   11/26/21 - Changing the welcome messaging in the top nav based on user login status
                   12/14/21 - Updating welcome messaging to use names instead of usernames
      -->
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="fixed-top py-2" id="topSiteNav">
        <div class="container-xxl px-xxl-0">
            <div class="row w-100 mx-auto">
                <div class="col-5 col-lg-4 logoContainer mb-3 mb-lg-0 d-flex justify-content-center justify-content-lg-start">
                    <a class="orange-text" href="/">
                        <img src="graphic/homeaway.png" alt="HomeAway Rentals LLC" class="d-inline-block align-text-middle navLogo">
                    </a>
                </div>
                <div class="col-7 col-lg-8 loginContainer d-flex align-items-center justify-content-center justify-content-lg-end">
                    <div class="row w-100">
                        <div class="d-none d-lg-flex col-lg-6 align-items-center justify-content-center justify-content-lg-end">
                            <?php if (isset($_SESSION['user_id'])) {
                              echo '<p class="text-center mb-3 mb-lg-0">Welcome back, ' . $_SESSION['fname'] . '!</p>';
                            } else if (isset($_SESSION['admin_id'])) {
                              echo '<p class="text-center mb-3 mb-lg-0">Welcome back, ' . $_SESSION['name'] . '!</p>';
                            } else {
                              echo '<p class="text-center mb-3 mb-lg-0">Login or create an account to begin!</p>';
                            } ?>
                        </div>
                        <div class="col-6 col-lg-3">
                            <button class="globalButton orangeButton w-100">
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    echo "<a class='white-text' href='view-profile.php?user_id=" . $_SESSION['user_id'] . "'>View Profile</a>";
                                } else if (isset($_SESSION['admin_id'])) {
                                    echo "<a class='white-text' href='adminProfile.php?admin_id=" . $_SESSION['admin_id'] . "'>View Profile</a>";
                                } else {
                                    echo "<a class='white-text' href='login.php'>Log In</a>";
                                }
                                ?>
                            </button>
                        </div>
                        <div class="col-6 col-lg-3">
                            <button class="globalButton blueButton w-100">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo "<a class='white-text' href='logout.php'>Log Out</a>";
                                } else {
                                    echo "<a class='white-text' href='register.php'>Register</a>";
                                }
                                ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-xxl px-lg-3">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span><span>&nbsp;&nbsp;Menu</span>
                </button>
                <div class="collapse navbar-collapse px-4 py-4 pt-2 px-lg-0 py-lg-1" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/view-properties.php">View Properties</a>
                        </li>
                        <?php if (isset($_SESSION['user_id'])) {  ?>
                          <li class="nav-item">
                              <a class="nav-link" href="/my-properties.php">My Properties</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="/upcoming-reservations.php">My Reservations</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="/upcoming-stays.php">My Stays</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="/messages.php">Message Center</a>
                          </li>
                        <?php } else if (isset($_SESSION['admin_id'])) { ?>
                          <li class="nav-item">
                              <a class="nav-link" href="/admin.php">Admin Dashboard</a>
                          </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Adding sticky nav class on page scroll -->
    <script>
        jQuery(function($) {
            $(window).scroll(function() {
                var margin = $('#topSiteNav').height();
                if ($(this).scrollTop() >= margin) {
                    $("#topSiteNav").addClass("stickiedNav");
                    $(".navbar").removeClass("navbar-light");
                    $(".navbar").addClass("navbar-dark");
                } else {
                    $("#topSiteNav").removeClass("stickiedNav");
                    $(".navbar").removeClass("navbar-dark");
                    $(".navbar").addClass("navbar-light");
                }
            });
        });
    </script>
</body>

</html>
