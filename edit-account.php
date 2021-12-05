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

      <!-- edit-account.php - The edit account form page
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/16/21
      Revisions:   10/19/21 - replacing bootstrap sample form
                   12/05/21 - Connecting form to back-end
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
        include 'includes/queries/user_table.php';
        include 'includes/queries/avatar_table.php';
        include 'includes/functions/avatar/getAvatar.php';

          if (mysqli_num_rows($user_query) > 0) {
          $i = 1;
            while ($user = mysqli_fetch_assoc($user_query)) {
              if($user['user_id'] == $_SESSION['user_id']) {
                $avatarID = '';
                $image = '';

                $avatar_query = getAvatar($user['user_id']);
                if (mysqli_num_rows($avatar_query) > 0) {
                  while ($avatar = mysqli_fetch_assoc($avatar_query)) {
                    $image = $avatar['filename'];
                    $avatar_ID = $avatar['avatar_id'];
                  }
                }

                if ($image != '') {
                  $profile_image = '/graphic/uploads/avatars/' . $image;
                  $buttonName = 'updateAvatar';
                  $avatarID = $avatar_ID;
                } else {
                  $profile_image = '/graphic/user.png';
                  $buttonName = 'uploadAvatar';
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
                  <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                  <input type="hidden" name="avatarUserID" value="<?php if (isset($_SESSION['user_id'])) { echo $_SESSION['user_id']; } ?>" readonly>
                  <input type="hidden" name="avatarID" value="<?php echo $avatarID; ?>" readonly>
                  <button class="globalButton me-3 my-3 orangeButton" type="submit" name="<?php echo $buttonName; ?>">Update</button>
                  <button class="globalButton my-3 redButton" type="delete" name="deleteAvatar">Remove</button>
                </form>
              </div>
            </div>
          </div>


        <div class="col-12 col-xl-7 offset-xl-1 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Edit your <span class="dk-orange-text">account</span> information below. </h2>
          <h3 class="mb-4 text-center">Get started below!</h3>

          <form method="POST" action="includes/inc.profile.php" enctype="multipart/form-data">
              <!-- I'm not great with bootstrap. The formatting here for the name works, but the code itself is sloppy. I'll look into editing it to look better!-->
                <div class="row">
                  <div class="col-12 col-lg-6 mb-3">
                    <label for="fName" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fName" placeholder="First Name" required>
                  </div>
                  <div class="col-12 col-lg-6 mb-3">
                    <label for="lName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lName" placeholder="Last Name" required>
                  </div>
                  <div class="col-12 col-lg-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@email.com">
                  </div>
                  <div class="col-12 col-lg-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="">
                  </div>
                  <div class="col-12 col-lg-6 mb-3">
                     <label for="passwordInput" class="form-label">Change Password</label>
                     <input type="password" class="form-control" name="password" placeholder="New Password">
                   </div>
                   <div class="col-12 col-lg-6 mb-3">
                     <label for="passwordInput" class="form-label">Re-enter New Password</label>
                     <input type="password" class="form-control" name="confirmPassword" placeholder="Re-enter New Password">
                   </div>
                   <input type="hidden" name="userID" value="<?php if (isset($_SESSION['user_id'])) { echo $_SESSION['user_id']; } ?>" readonly />
                </div>

                <div class="pt-3 text-center">
                  <button type="submit" name="updateUser" class="globalButton orangeButton">Update Account</button>
                </div>
                <div class="pt-3 text-center mt-3">
                  <h3 class="mb-1 text-left">Want to delete your account? </h3>
                  <h3><span class="dk-orange-text">Warning! </span> This action cannot be undone!</h3>
                  <div class="mb-3">
                    <button type="delete" name="deleteUser" class="globalButton redButton">Delete Account</button>
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
<?php } // if get user id matches session user
    else { // if user id doesn't match, redirect user to their own profile edit page
      header("Location: /edit-account.php?user_id=".$_SESSION['user_id']);
    }
  } // if get user id exists
  else {
    header("Location: /edit-account.php?user_id=".$_SESSION['user_id']);
  }
} else if (isset($_SESSION['admin_id'])) { // redirect admin to admin profile edit page
    header("Location: /editAdmin.php");
} else { // redirect logged out users
    header("Location: /login.php");
}?>
