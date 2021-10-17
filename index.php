<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- index.html - The first page of Group 1's final project for CSC450
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/03/21
      Revisions:
      -->

      <!-- Page title -->
    <title>Home Page</title> <!-- 10/03/21 - Temporary title, company name still TBD -->
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>
    <section class="container-fluid initialPageContent greyMountains pb-5 mb-5">
      <section class="container pb-5">
        <div class="row mt-5 mb-0 my-lg-5">
          <div class="col-12 col-md-5">
            <h1 class="text-shadow">Vacation Rentals <span class="dk-orange-text">without the&nbsp;Stress</span></h1>
          </div>
          <div class="col-12 col-md-7 p-4 white-bg rounded-custom box-shadow">
            <p>Tired of needing a vacation from the vacation-planning process? So were we! That's why we created this app, your gateway to a world of adventure. Communicate directly with the rental owners to avoid vital information getting lost in the corporate noise of travel booking agencies. See photos of your actual property so you know what to expect at your destination before ever stepping out on your journey.</p>
            <p class="mb-0"><b>Real people, real places, real relaxation.</b></p>
          </div>
        </div>
      </section>
    </section>

    <section class="container">
      <div class="row py-5">
        <div class="col-12 col-lg-4 mb-4">
          <a href="#">
            <div class="w-100 rentalListing">
              <img class="w-100 rentalListing" src="graphic/penthouse.jpg" alt="Penthouse Rental" title="Photo by Mostafa Safadel">
            </div>
          </a>
          <a href="#">
            <h3 class="mt-2 mb-0">Downtown Penthouse</h3>
          </a>
          <h4>2 beds, 1.5 bath</h4>
          <p>Enjoy the nightlife of the city in a penthouse that comes complete with all the amenities you could wish for! Luxury pool and spa, valet parking, and 24-hour fitness center included in rental.</p>
        </div>

        <div class="col-12 col-lg-4 mb-4">
          <a href="#">
            <div class="w-100 rentalListing">
              <img class="w-100 rentalListing" src="graphic/cabana.jpg" alt="Cabana Rental" title="Photo by Mike Swigunski">
            </div>
          </a>
          <a href="#">
            <h3 class="mt-2 mb-0">Oceanside Cabana</h3>
          </a>
          <h4>1 bed, 1 bath</h4>
          <p>Relax and float away on the serenity of the sea in this oceanside cabana complete with a private pool and 360-degree ocean access.</p>
        </div>

        <div class="col-12 col-lg-4 mb-4">
          <a href="#">
            <div class="w-100 rentalListing">
              <img class="w-100 rentalListing" src="graphic/cabin.jpg" alt="Cabin Rental" title="Photo by Cameron Stewart">
            </div>
          </a>
          <a href="#">
            <h3 class="mt-2 mb-0">Mountain Cabin</h3>
          </a>
          <h4>Studio, .5 bath</h4>
          <p>Escape the busyness of life and surround yourself with nature in this cozy studio cabin. Wi-fi access, smart TV, and pet-friendly!</p>
        </div>
      </div>
    </section>

    <section class="container-fluid py-5 lt-gray-bg">
      <div class="row w-75 mx-auto py-4 max-880">
        <div class="col-12 mb-3">
          <h2 class="text-center">Explore these properties and&nbsp;more!</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-end">
          <button class="globalButton orangeButton mb-2 ">
            Log In as a Guest
          </button>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-start">
          <button class="globalButton blueButton mb-2">
            List Your Property
          </button>
        </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
