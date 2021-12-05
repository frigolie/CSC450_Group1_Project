<?php
session_start();
if(isset($_GET['user_id'])) {
  $user_id = htmlspecialchars($_GET['user_id']);

    include 'includes/queries/user_table.php';
    include 'includes/functions/avatar/getAvatar.php';
    include 'includes/functions/property/countProperties.php';
    include 'includes/functions/property/getProperties.php';
    include 'includes/functions/image/getPropertyImages.php';

      if (mysqli_num_rows($user_query) > 0) {
      $i = 1;
        while ($user = mysqli_fetch_assoc($user_query)) {
          if($user['user_id'] == $user_id) {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- view-profile.php - Viewing user profile
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     12/05/21
      Revisions:
      -->

      <!-- Page title -->
    <title><?php echo ucfirst($user['username']); ?>'s Profile</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-3 redMountains">
      <div class="container mb-3">

        <?php
           $image = getAvatar($user_id);
           if ($image != '') { $profile_image = '/graphic/uploads/avatars/' . $image; } else { $profile_image = '/graphic/user.png'; }
        ?>
        <div class="row py-1 justify-content-center align-items-start">
          <h1 class="mb-5 text-capitalize text-shadow"><?php echo $user['username']; ?>'s Profile</h1>
          <div class="col-9 col-md-6 col-lg-4 py-4 mb-5 mb-xl-0 sticky-xl-top text-center bg-white rounded-custom box-shadow profileCard">
            <div class="row">
              <div class="col-12">
                  <div class="mx-auto profileImg rounded-circle" style="background-image:url('<?php echo $profile_image; ?>')">
                  </div>
              </div>
                <div class="col-12 reservationDetails text-start p-4 pt-3">
                  <p class="w-100 userName">
                    <h4 class="display-inline">Name: <span class="fw-light"><?php echo $user['fname'] . " " . $user['lname']; ?></span></h4>
                  </p>
                  <p class="w-100 userAge">
                    <h4 class="display-inline">Member Since: <span class="fw-light"><?php $year = date("F j, Y", strtotime($user['creation_date'])); echo $year; ?></span></h4>
                  </p>
                  <p class="w-100 userStays">
                    <h4 class="display-inline">Hosted Stays: <span class="fw-light"><?php //echo $numPastStays; ?># (awaiting res system)</span></h4>
                  </p>
                <?php if (isset($_SESSION['username'])) { ?>
                  <a class="w-100 d-inline-block text-center" href="/messages.php?recipient_id=<?php echo $user_id; ?>">
                      <button class="globalButton orangeButton my-2 me-2">Send Message</button>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="col-12 col-xl-7 offset-xl-1 mb-5 profile-properties">
            <div class="row property-container">
              <?php
                $user_props = getProperties($user_id);

                if (mysqli_num_rows($user_props) > 0) {
                  if (mysqli_num_rows($user_props) == 1) {
                    echo '<h2 class="text-shadow">' . mysqli_num_rows($user_props) . ' Listed Property</h2>';
                  } else {
                    echo '<h2 class="text-shadow">' . mysqli_num_rows($user_props) . ' Listed Properties</h2>';
                  }
                  $i = 1;
                  while ($prop = mysqli_fetch_assoc($user_props)) {
                    $images = getPropertyImages($prop['property_id']);
                    if ($images[0]['filename'] != '') { $featImg = '/graphic/uploads/property_images/' . $images[0]['filename']; } else { $featImg = '/graphic/ha_square.png'; }
                    ?>

                    <div class="row col-12 my-3 p-4 white-bg rounded-custom box-shadow">
                      <div class="col-12 col-lg-6">
                        <a href="/property-details.php?property_id=<?php echo $prop['property_id'] ?>">
                          <img class="w-100 rounded-custom mb-4 mb-lg-0" src="<?php echo $featImg; ?>" alt="<?php echo $prop['name'] ?>" title="Photo of <?php echo $prop['name'] ?>">
                        </a>
                      </div>
                      <div class="col-12 col-lg-6">
                        <a href="/property-details.php?property_id=<?php echo $prop['property_id'] ?>">
                          <h3><?php echo $prop['name']; ?></h3>
                        </a>
                        <h4>
                          <?php echo $prop['bedrooms']; if($prop['bedrooms'] != 'Studio') { echo ' Bed'; if($prop['bedrooms'] != '1') { echo 's'; } } ?>,
                          <?php echo $prop['bathrooms']; echo ' Bath'; if($prop['bathrooms'] != '1') { echo 's'; }?>
                        </h4>
                        <p><?php echo $prop['description']; ?></p>
                        <a href="/property-details.php?property_id=<?php echo $prop['property_id'] ?>">
                          <button class="globalButton orangeButton my-2 me-2">View More</button>
                        </a>
                        <?php if (isset($_SESSION['username'])) { ?>
                          <a href="/make-reservation.php?property_id=<?php echo $prop['property_id'] ?>">
                            <button class="globalButton blueButton my-2">Book Now</button>
                          </a>
                        <?php } ?>
                      </div>
                    </div>

                <?php  }
                } else {
                  echo '<h2 class="text-shadow">No Properties Listed</h2>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>

<?php
       } // If on the profile page of the url parameter
     } // While user query has results
   } // If there are results to the user query
  } // if get user id exists
  else {
    header("Location: /index.php");
  }
 ?>
