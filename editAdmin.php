<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    if(isset($_GET['admin_id'])) {
      $admin_id = htmlspecialchars($_GET['admin_id']);
      if($_SESSION['admin_id'] == $admin_id) {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- editAdmin.php - The edit account form page for admin accounts
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
    <title>Edit Your Account</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

  <section class="container-fluid initialPageContent redMountains pb-5">
    <div class="container">
      <div class="row pb-5 justify-content-center align-items-start">

      <?php
        include 'includes/queries/admin_user.php';

          if (mysqli_num_rows($admin_query) > 0) {
          $i = 1;
            while ($admin = mysqli_fetch_assoc($admin_query)) {
              if($admin['admin_id'] == $_SESSION['admin_id']) {
                $image = $admin['admin_avatar'];

                if ($image != '') {
                  $profile_image = '/graphic/uploads/avatars/admin/' . $image;
                  $buttonName = 'updateAdminAvatar';
                  $avatarID = $avatar_ID;
                } else {
                  $profile_image = '/graphic/admin.png';
                  $buttonName = 'uploadAdminAvatar';
                 }

              ?>

        <div class="col-9 col-md-6 col-lg-4 py-4 mb-5 mb-xl-0 sticky-xl-top text-center bg-white rounded-custom box-shadow profileCard">
            <div class="row">
              <div class="col-12">
                  <h3>Profile Avatar</h3>
                  <div class="mx-auto profileImg rounded-circle" style="background-image:url('<?php echo $profile_image; ?>')">
                  </div>
              </div>
              <div class="col-12 text-center p-4 pb-0 pt-3">
                <form method="POST" action="includes/inc.profile.php" enctype="multipart/form-data">
                  <input type="file" name="adminAvatar" accept="image/png, image/jpeg">
                  <input type="hidden" name="adminID" value="<?php if (isset($_SESSION['admin_id'])) { echo $_SESSION['admin_id']; } ?>" readonly>
                  <button class="globalButton me-3 my-3 orangeButton" type="submit" name="<?php echo $buttonName; ?>">Update</button>
                  <button class="globalButton my-3 redButton" type="delete" name="deleteAdminAvatar">Remove</button>
                </form>
              </div>
            </div>
          </div>

        <div class="col-12 col-xl-7 offset-xl-1 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Edit your <span class="dk-orange-text">account</span> information below. </h2>
          <h3 class="mb-4 text-center">Get started below!</h3>

          <form method="POST" action="includes/inc.profile.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $admin['name']; ?>">
              </div>
              <div class="col-12 col-lg-6 mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $admin['username']; ?>">
              </div>
              <div class="col-12 col-lg-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $admin['email']; ?>">
              </div>
              <div class="col-12 col-lg-6 mb-3">
                 <label for="passwordInput" class="form-label">Change Password</label>
                 <input type="password" class="form-control" name="password" placeholder="New Password">
               </div>
               <div class="col-12 col-lg-6 mb-3">
                 <label for="passwordInput" class="form-label">Re-enter New Password</label>
                 <input type="password" class="form-control" name="confirmPassword" placeholder="Re-enter New Password">
               </div>
               <input type="hidden" name="adminID" value="<?php if (isset($_SESSION['admin_id'])) { echo $_SESSION['admin_id']; } ?>" readonly />
            </div>
            <div class="pt-3 text-center">
              <button type="submit" name="updateAdmin" class="globalButton orangeButton">Update Account</button>
            </div>
            <div class="pt-3 text-center mt-3">
              <h3 class="mb-1 text-left">Want to delete your account? </h3>
              <h3><span class="dk-orange-text">Warning! </span> This action cannot be undone!</h3>
              <div class="mb-3">
                <button type="delete" name="deleteAdmin" class="globalButton redButton">Delete Account</button>
              </div>
            </div>
            </form>
          </div>
        <?php }
            }
          }?>
        </div>
      </div>
    </section>
    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
<?php } // if get admin id matches session admin
    else { // if admin id doesn't match, redirect admin to their own profile edit page
      header("Location: /editAdmin.php?admin_id=".$_SESSION['admin_id']);
    }
  } // if admin user id exists
  else {
    header("Location: /editAdmin.php?admin_id=".$_SESSION['admin_id']);
  }
} else if (isset($_SESSION['user_id'])) { // redirect user to user profile edit page
    header("Location: /edit-profile.php?user_id=".$_SESSION['user_id']);
} else { // redirect logged out users
    header("Location: /login.php");
}?>
