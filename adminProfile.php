<?php
session_start();
if (isset($_SESSION['admin_id'])) {
  if(isset($_GET['admin_id'])) {
    $admin_id = htmlspecialchars($_GET['admin_id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- adminProfile.php - Admin profile page
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     11/29/21
      Revisions:   12/04/21 - Connecting to the admin table of the DB
      -->

      <!-- Page title -->
    <title>My Profile</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent pb-5 pinkMountains">
      <div class="container mb-3">

        <?php
          include 'includes/queries/admin_user.php';
            if (mysqli_num_rows($admin_query) > 0) {
            $i = 1;
              while ($admin = mysqli_fetch_assoc($admin_query)) {
                if($admin['admin_id'] == $admin_id) {
                  if($admin['admin_avatar'] != '') {
                    $profile_image = '/graphic/uploads/avatars/admin/' . $admin['admin_avatar'];
                  } else {
                    $profile_image = '/graphic/admin.png';
                  }
                ?>

      <div class="row py-1 justify-content-center">
          <h1 class="mb-5">Admin <?php echo $admin['admin_id']; ?> - <?php echo $admin['name']; ?></h1>
          <div class="col-12 col-md-10 mb-5 p-4 text-center bg-white rounded-custom box-shadow">
            <div class="row">
              <div class="col-12 col-md-4">
                  <div class="mx-auto profileImg rounded-circle" style="background-image:url('<?php echo $profile_image; ?>')">
                  </div>
              </div>
              <div class="col-12 col-md-6 reservationDetails text-start p-4 pt-3">
                <p class="w-100 adminName">
                  <h4 class="display-inline">Name: <span class="fw-light"><?php echo $admin['name']; ?></span></h4>
                </p>
                <p class="w-100 adminName">
                  <h4 class="display-inline">Username: <span class="fw-light"><?php echo $admin['username']; ?></span></h4>
                </p>
                <p class="w-100 adminEmail">
                  <h4 class="display-inline">Email: <span class="fw-light"><?php echo $admin['email']; ?></span></h4>
                </p>
                <?php if($_SESSION['admin_id'] == $admin_id) { ?>
                  <a href="/editAdmin.php?admin_id=<?php echo $admin_id; ?>">
                      <button class="globalButton orangeButton my-2 me-2">Edit Account Info</button>
                  </a>
                <?php } ?>
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
<?php
  } // if get admin id exists
  else {
    header("Location: /adminProfile.php?admin_id=".$_SESSION['admin_id']);
  }
 } else if (isset($_SESSION['user_id'])) {
    header("Location: /view-profile.php?user_id=".$_SESSION['user_id']);
} else {
    header("Location: /login.php");
} ?>
