<?php
session_start();
if (isset($_SESSION['user_id'])) {
  if(isset($_GET['user_id'])) {
    $user_id = htmlspecialchars($_GET['user_id']);
    if($_SESSION['user_id'] == $user_id) {

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- profile.php - User profile/dashboard
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     11/29/21
      Revisions:   12/04/21 - Connecting to the user table of the DB
      -->

      <!-- Page title -->
    <title>My Profile</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-3 redMountains">
      <div class="container mb-3">

        <?php
          include 'includes/queries/user_table.php';
          include 'includes/functions/avatar/getAvatar.php';
          include 'includes/functions/property/countProperties.php';
            if (mysqli_num_rows($user_query) > 0) {
            $i = 1;
              while ($user = mysqli_fetch_assoc($user_query)) {
                if($user['user_id'] == $user_id) {
                 $image = getAvatar($user_id);
                 if ($image != '') { $profile_image = '/graphic/uploads/avatars/' . $image; } else { $profile_image = '/graphic/user.png'; }
                ?>
      <div class="row py-1 justify-content-center">
          <h1 class="mb-5 text-capitalize"><?php echo $user['username']; ?>'s Profile</h1>
          <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
            <div class="row">
              <div class="col-12 col-md-4">
                  <div class="mx-auto profileImg rounded-circle" style="background-image:url('<?php echo $profile_image; ?>')">
                  </div>
              </div>
                <div class="col-12 col-md-8 reservationDetails text-start p-4 pt-3">
                <p class="w-100 userName">
                  <h4 class="display-inline">Name: <span class="fw-light"><?php echo $user['fname'] . " " . $user['lname']; ?></span></h4>
                </p>
                <p class="w-100 userEmail">
                  <h4 class="display-inline">Email: <span class="fw-light"><?php echo $user['email']; ?></span></h4>
                </p>
                <p class="w-100 userAge">
                  <h4 class="display-inline">Member Since: <span class="fw-light"><?php $year = date("F j, Y", strtotime($user['creation_date'])); echo $year; ?></span></h4>
                </p>
                <p class="w-100 userTrips">
                  <h4 class="display-inline">Trips: <span class="fw-light"><?php //echo $numPastTrips; ?># Completed, <?php //echo $numUpcomingTrips; ?># Upcoming (awaiting res system)</span></h4>
                </p>
                <p class="w-100 userStays">
                  <h4 class="display-inline">Stays: <span class="fw-light"><?php //echo $numPastStays; ?># Hosted, <?php //echo $numUpcomingStays; ?># Reserved (awaiting res system)</span></h4>
                </p>
                <p class="w-100 userProperties">
                  <h4 class="display-inline">Properties Listed: <span class="fw-light"><a href="/my-properties.php?user_id=<?php echo $user_id; ?>"><?php $numProps = countProperties($user_id);
                  if($numProps < 1) {
                    echo "No Properties";
                  } else if($numProps = 1) {
                    echo "1 Property";
                  } else {
                    echo $numProps . " Properties";
                  } ?></a></span></h4>
                </p>
                <a href="/edit-account.php?user_id=<?php echo $user_id; ?>">
                    <button class="globalButton orangeButton my-2 me-2">Edit Account Info</button>
                </a>
              </div>
            </div>
          </div>
        </div>

      <?php }
        }
      } ?>
      </div>
    </section>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
<?php } // if get user id matches session user
    else { // if user id doesn't match, redirect user to their own profile page
      header("Location: /profile.php?user_id=".$_SESSION['user_id']);
    }
  } // if get user id exists
  else {
    header("Location: /profile.php?user_id=".$_SESSION['user_id']);
  }
} else if (isset($_SESSION['admin_id'])) { // redirect admin to admin profile page
    header("Location: /adminProfile.php");
} else { // redirect logged out users
    header("Location: /login.php");
} ?>
