<?php
session_start();
include  "includes/Inc.DBC.php";
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {   ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>


    <body>
        <?php include(getcwd() . "/header.php"); ?>
        <section class="container-fluid initialPageContent greenMountains p-0">

            <div class="container" style="min-height: 100vh">
                <?php if ($_SESSION['role'] == 'admin') { ?>
                  <div class="row w-100 d-flex flex-wrap justify-content-center align-items-start">
                    <!--Admin Users-->
                    <div class="col-3 adminCard py-4 position-sticky white-bg rounded-custom box-shadow">
                        <img src="graphic/admin.png" class="card-img-top" alt="admin image">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-4">
                                <?= $_SESSION['name'] ?>
                            </h5>
                            <a href="/edit-account.php?id=<?= $_SESSION['admin_id'] ?>" class="globalButton blueButton w-100 mt-5">Edit Account</a>
                            <a href="/logout.php" class="globalButton redButton w-100 mt-5">Logout</a>
                        </div>
                    </div>

                    <!-- Admin info table -->
                    <?php include 'includes/admin_user.php';
                      if (mysqli_num_rows($admin_query) > 0) { ?>
                        <div class="col-8 offset-1 p-4 mb-0 rounded-custom white-bg box-shadow adminDashTable" id="adminTable">
                            <h1 class="fs-1 mb-3 text-center text-shadow">Admins</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($admin_query)) { ?>
                                        <tr>
                                            <th scope="row"><?= $rows['admin_id'] ?></th>
                                            <td><?= $rows['name'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                            <td><?= $rows['role'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                          </div>
                        <?php } ?>
                    <!-- User info table -->
                    <?php include 'includes/user_table.php';
                      if (mysqli_num_rows($user_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 rounded-custom white-bg box-shadow adminDashTable" id="userTable">
                            <h1 class="fs-1 mb-3 text-center text-shadow">Users</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($user_query)) { ?>
                                        <tr user-id="<?= $rows['user_id'] ?>" first-name="<?= $rows['fname'] ?>" last-name="<?= $rows['lname'] ?>" email="<?= $rows['email'] ?>" username="<?= $rows['username'] ?>" class="popup-row user-row">
                                            <th scope="row"><?= $rows['user_id'] ?></th>
                                            <td><?= $rows['fname'] ?></td>
                                            <td><?= $rows['lname'] ?></td>
                                            <td><?= $rows['email'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                            <div class="w-100 py-3 text-center">
                              <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-user">Add New User</a>
                            </div>
                          </div>
                        <?php } ?>
                    <!-- Property info table -->
                    <?php include 'includes/property_table.php';
                      if (mysqli_num_rows($prop_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="propertyTable">
                            <h1 class="fs-1 mb-3 text-center text-shadow">Properties</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Owner</th>
                                        <th scope="col">Beds</th>
                                        <th scope="col">Baths</th>
                                        <th scope="col">Pets</th>
                                        <th scope="col">Kids</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($prop_query)) { ?>
                                        <tr>
                                            <th scope="row"><?= $rows['property_id'] ?></th>
                                            <td><?= $rows['name'] ?></td>
                                            <td><?= $rows['address'] ?><br><?= $rows['city'] ?>, <?= $rows['state'] ?> <?= $rows['zip'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                            <td><?= $rows['bedrooms'] ?></td>
                                            <td><?= $rows['bathrooms'] ?></td>
                                            <td><?php if ($rows['pets'] == 1) { ?>Yes<?php } else { ?>No<?php } ?></td>
                                            <td><?php if ($rows['kids'] == 1) { ?>Yes<?php } else { ?>No<?php } ?></td>
                                            <td>$<?= $rows['price'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                            <div class="w-100 py-3 text-center">
                              <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-property">Add New Property</a>
                            </div>
                          </div>
                        <?php } ?>
                    <!-- Reservation info table -->
                    <?php include 'includes/res_table.php';
                      if (mysqli_num_rows($res_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="reservationTable">

                            <h1 class="fs-1 mb-3 text-center text-shadow">Reservations</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Property</th>
                                        <th scope="col">Dates</th>
                                        <th scope="col">Adults</th>
                                        <th scope="col">Kids</th>
                                        <th scope="col">Pets</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($res_query)) { ?>
                                        <tr>
                                            <th scope="row"><?= $i // $rows['reservation_id'] ?></th>
                                            <td><?= $rows['fname'] ?></td>
                                            <td><?= $rows['lname'] ?></td>
                                            <td><?= $rows['email'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                            <div class="w-100 py-3 text-center">
                              <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-reservation">Add New Reservation</a>
                            </div>
                          </div>
                        <?php } ?>

                  </div>
                <?php } else { // Display nothing
                } ?>
            </div>

            <div id="black-overlay" class= "hide w-100 p-5 align-items-center justify-content-center position-fixed top-0">
              <div class="p-4 rounded-custom white-bg box-shadow popup-container d-flex flex-wrap justify-content-end">
                <span class="close-btn"><i class="bi bi-x-circle"></i></span>

                <div id="add-user" class="hide popup-form w-100">
                  <h3 class="mb-3">Add New User</h3>
                  <form method="POST" action="includes/inc.adminCreateUser.php" enctype="multipart/form-data">
                    <div class="form-field-container d-flex">
                      <input type="hidden" name="userID" readonly>
                      <input type="text" class="form-control me-3" name="fname" placeholder="First Name" required>
                      <input type="text" class="form-control me-3" name="lname" placeholder="Last Name" required>
                      <input type="text" class="form-control me-3" name="username" placeholder="Username" required>
                      <input type="email" class="form-control me-3" name="email" placeholder="email@address.com" required>
                      <input type="password" class="form-control me-3" placeholder="Password" name="password" autocomplete="new-password" required>
                      <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required>
                    </div>
                    <div class="pt-3 text-center">
                      <button type="submit" name="submit" class="globalButton orangeButton">Create User</button>
                    </div>
                  </form>
                </div>

                <div id="edit-user" class="hide popup-form w-100">
                  <h3 class="mb-3">Update User</h3>
                  <form method="POST" action="includes/inc.adminUpdateUser.php" enctype="multipart/form-data">
                    <div class="form-field-container d-flex">
                      <input type="hidden" name="userID" readonly>
                      <input type="text" class="form-control me-3" name="fName" placeholder="First Name" required>
                      <input type="text" class="form-control me-3" name="lName" placeholder="Last Name" required>
                      <input type="text" class="form-control me-3" name="username" placeholder="Username" required>
                      <input type="email" class="form-control" name="email" placeholder="email@address.com" required>
                    </div>
                    <div class="pt-3">
                      <button type="submit" name="submit" class="globalButton orangeButton me-3">Edit User</button>
                      <button type="delete" name="delete" class="globalButton redButton">Delete User</button>
                    </div>
                  </form>
                </div>

                <div id="add-property" class="hide popup-form w-100">
                  add property form here
                </div>

                <div id="edit-property" class="hide popup-form w-100">
                  edit property form here
                </div>

                <div id="add-reservation" class="hide popup-form w-100">
                  add reservation form here
                </div>

                <div id="edit-reservation" class="hide popup-form w-100">
                  edit reservation form here
                </div>

              </div>
            </div>
        </section>
        <?php include(getcwd() . "/footer.php"); ?>
    </body>


    </html>
    <script>
      $( document ).ready(function() {
        $('.close-btn i').click(function(e){
          e.preventDefault();
          $('#black-overlay').fadeTo( 200, 0,function(){
              $('#black-overlay').addClass('hide');
              $('#black-overlay').find('.popup-form').addClass('hide');
            });
        });

        $('.popup-button').click(function(e){
          var displayForm = "#" + $(this).attr('popup-form') + "";
          e.preventDefault();
          $('#black-overlay').removeClass('hide');
          $(displayForm).removeClass('hide');
          $('#black-overlay').fadeTo( 200, 1.0 );
        });

        $('.user-row').click(function(e){
          e.preventDefault();
          $('#black-overlay').removeClass('hide');
          $('#edit-user').removeClass('hide');
          var user_id = $(this).attr('user-id');
          var fname = $(this).attr('first-name');
          var lname = $(this).attr('last-name');
          var email = $(this).attr('email');
          var username = $(this).attr('username');

          $('#edit-user').find('input[name="userID"]').val(user_id);
          $('#edit-user').find('input[name="fName"]').val(fname);
          $('#edit-user').find('input[name="lName"]').val(lname);
          $('#edit-user').find('input[name="email"]').val(email);
          $('#edit-user').find('input[name="username"]').val(username);

          $('#black-overlay').fadeTo( 200, 1.0 );
        });

      });
    </script>
<?php } else {
    header("Location: index.php");
} ?>
