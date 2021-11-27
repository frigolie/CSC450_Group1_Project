<?php
session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- property-details.php - The detail page for each property listing
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
    <title>Property Details</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 blueMountains">
      <div class="container mb-3">
        <div class="row py-1 justify-content-between">

          <div class="col-12 col-lg-7 text-center px-3">
            <h1 class="my-5 text-start text-shadow">Mid-Century Ranch House</h1>
            <img class="w-100 rounded-custom box-shadow" src="graphic/ranch.jpg" alt="Ranch House Rental" title="Photo by Janelle Hiroshigi">
            <h4 class="text-start lt-gray-text mt-3">3 bed, 2 bath</h4>
            <p class="lt-gray-text text-start">Escape the busyness of city life to explore the natural wonder of the west in this fully-furnished desert oasis! Step back in time with historic mid-century architecture, cozy up next to the fully-functional gas fireplace, or beat the heat in the private outdoor pool! Pets welcome, no breed restrictions apply.</p>
            <a href="/messages.php">
              <button class="globalButton orangeButton my-2">Contact Host</button>
            </a>
          </div>

          <div class="col-12 col-lg-5 px-3 py-5 mt-2">
            <h3 class="mt-2 mt-lg-5 mb-3 lt-gray-text text-center text-shadow">Check Availability</h3>
            <div class="white-bg rounded-custom box-shadow p-4">
              <form>
                <div class="form-group">
                  <label for="numberGuests">How many guests?</label>
                  <input type="number" id="numberGuests" name="quantity" min="1">
                </div>
                <div class="mb-3">
                   <label for="checkIn" class="form-label">Check-in:</label>
                   <input type="date" class="form-control" id="checkIn" placeholder="mm/dd/yyyy" required>
                </div>
                <div class="mb-5">
                   <label for="checkIn" class="form-label">Check-out:</label>
                   <input type="date" class="form-control" id="checkIn" placeholder="mm/dd/yyyy" required>
                </div>
                <h4 class="mb-2">Cost Estimate: $123.45</h4>
                <h4>Due Now: $98.76</h4>
                <div class="pt-4 pb-4 text-center">
                  <button type="submit" class="globalButton blueButton">Book Now!</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
