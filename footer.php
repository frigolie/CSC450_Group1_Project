<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <!-- footer.php - Global footer for use on each page of the web app
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/03/21
      Revisions:   10/16/21 - Updating footer nav links
                   10/19/21 - Adding logo to footer
      -->

      <!-- Linking to external stylesheet -->
      <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>
    <footer>
      <div class="container-fluid black-bg">
        <div class="container-xxl py-5">

          <div class="row py-3">
            <div class="col-12 col-md-6 col-lg-4">
              <a href="/">
                <img class="logo w-50 mb-3" src="graphic/homeaway.png" alt="CSC 450 Final Project" title="CSC 450 Final Project" />
              </a>
              <p class="lt-gray-text">
                HomeAway Rentals, LLC<br>
                1234 Main St<br>
                Minneapolis, MN 55111
              </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <b class="lt-gray-text">Quick Links</b>
              <ul class="footerLinks lt-gray-text ps-0">
                <li class="py-1 px-0"><a href="/" class="blue-text">Home</a></li>
                <li class="py-1 px-0"><a href="/view-properties.php" class="blue-text">View Properties</a></li>
                <li class="py-1 px-0"><a href="/contact.php" class="blue-text">Contact</a></li>
                <li class="py-1 px-0"><a href="/register.php" class="blue-text">Register</a></li>
                <li class="py-1 px-0"><a href="/login.php" class="blue-text">Login</a></li>
              </ul>
            </div>

            <!-- Dev Links for linking between pages until all pages are built and site is fully functional -->
            <div class="col-12 col-md-6 col-lg-4">
              <b class="lt-gray-text">Dev Testing Links</b>
              <ul class="footerLinks lt-gray-text ps-0">
                <li class="py-1 px-0"><a href="/edit-account.php" class="blue-text">Edit Account</a></li>
                <li class="py-1 px-0"><a href="/upcoming-reservations.php" class="blue-text">Upcoming Reservations</a></li>
                <li class="py-1 px-0"><a href="/upcoming-stays.php" class="blue-text">Upcoming Stays</a></li>
                <li class="py-1 px-0"><a href="/add-property.php" class="blue-text">Add A Property</a></li>
                <li class="py-1 px-0"><a href="/edit-property.php" class="blue-text">Edit A Property</a></li>
                <li class="py-1 px-0"><a href="/make-reservation.php" class="blue-text">Make A Reservation</a></li>
                <li class="py-1 px-0"><a href="/edit-reservation.php" class="blue-text">Edit A Reservation</a></li>
              </ul>
            </div>
            <!-- End dev links -->

            <div class="col-12 attributionBox pt-5">
              <p class="text-center dk-gray-text mb-0">All photos used are from <a href="https://unsplash.com/" class="blue-text">Unsplash</a> and licensed for commercial use.
                Background Vectors by <a href="https://www.vecteezy.com/free-vector/nature" class="blue-text">Nature Vectors</a>, <a href="https://www.vecteezy.com/free-vector/abstract-mountain" class="blue-text">Abstract Mountain Vectors</a> by Vecteezy.</p>
              <p class="text-center dk-gray-text">&copy; CSC 450 - Group 1, <?php echo date("Y"); ?></p>
            </div>
          </div>

        </div>
      </div>
      <div class="footerModule">

      </div>
      <div class="footerModule">

      </div>
      <div class="footerModule">

      </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>
